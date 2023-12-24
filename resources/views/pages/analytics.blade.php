@extends('layouts.vertical', ['page_title' => 'Analytics Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'])
@endsection

@php
    use Carbon\Carbon;

        $lastThreeMonths = collect();
        for ($i = 0; $i < 3; $i++) {
            $lastThreeMonths->push(Carbon::now()->subMonths($i));
        }
        $lastThreeMonths = $lastThreeMonths->reverse();
      $dateParam = request()->query('date');
      $dates = $dateParam ? explode('-', $dateParam) : null;
@endphp

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form href="/pages/analytics" class="d-flex" id="date-form">
                            <div class="input-group">
                                <input type="text" class="form-control shadow border-0" id="dash-daterange"
                                       placeholder="{{\Request::query('date') ?? 'MM/DD/YYYY - MM/DD/YYYY'}}" style="width: 14rem;">
                                <span class="input-group-text bg-success border-success text-white">
                                    <i class="ri-calendar-todo-fill fs-13"></i>
                                </span>
                            </div>
                            <a href="" id="refreshButton" class="btn btn-success ms-2 flex-shrink-0">
                                <i class="ri-refresh-line"></i> Refresh
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard ({{$analyticsData['listing']['street']}})</h4>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-xl-3">
            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-line text-bg-info widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Accepted Reservations</h5>
                        <h3 class="my-3">{{$analyticsData['reservations']->count()}}</h3>
                        <p class="mb-0 text-muted">
                            @if($dates && count($dates) === 2)
                                <span class="text-success me-2">From this property (Between {{ $dates[0] }} and {{ $dates[1] }})</span>
                            @else
                                <span class="text-success me-2">From this property (All time)</span>
                                <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$analyticsData['listing']['id']}}">See details</a>
                            </span>
                            @endif
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-exchange-dollar-line text-bg-primary widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                        <h3 class="my-3">{{$analyticsData['currency'].$analyticsData['total_revenue']}}</h3>
                        <p class="mb-0 text-muted">
                            @if($dates && count($dates) === 2)
                                <span class="text-success me-2">From this property (Between {{ $dates[0] }} and {{ $dates[1] }})</span>
                            @else
                                <span class="text-success me-2">From this property (All time)</span>
                                <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$analyticsData['listing']['id']}}">See details</a>
                            </span>
                            @endif
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-exchange-dollar-line text-bg-primary widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Upcoming Revenue</h5>
                        <h3 class="my-3">{{$analyticsData['currency'].$analyticsData['open_revenue']}}</h3>
                        <p class="mb-0 text-muted">
                            @if($dates && count($dates) === 2)
                                <span class="text-success me-2">From this property (Between {{ $dates[0] }} and {{ $dates[1] }})</span>
                            @else
                                <span class="text-success me-2">From this property (All time)</span>
                                <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$analyticsData['listing']['id']}}">See details</a>
                            </span>
                            @endif
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <div class="row">
        <div class="col col-xl-4 col-lg-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Reservations by Listing Channel</h4>
                </div>

                <div class="card-body pt-0">
                    <div id="sessions-os" class="apex-charts mt-2" data-colors="#16a7e9,#47ad77,#ffc35a,#f15776">
                    </div>

                    <div class="row text-center mt-2">
                        <div class="col-4">
                            <h4 class="fw-normal">
                                <span>{{$analyticsData['reservations']->where('source','Airbnb')->where('status','accepted')->count()}}</span>
                            </h4>
                            <p class="text-muted mb-0">Airbnb</p>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-normal">
                                <span>{{$analyticsData['reservations']->where('source','Booking.com')->where('status','accepted')->count()}}</span>
                            </h4>
                            <p class="text-muted mb-0">Booking.com</p>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-normal">
                                <span>{{$analyticsData['reservations']->where('source','Guest24 Services')->where('status','accepted')->count()}}</span>
                            </h4>
                            <p class="text-muted mb-0">Guest24 Services</p>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-3 col-lg-12">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Reservation lengths by month </h4>
                </div>

                <div class="card-body pt-0">
                    <div id="reservation-lentgths" class="apex-charts" data-colors="#16a7e9"></div>

                    <div class="table-responsive mt-3">
                        <table class="table table-sm mb-0">
                            <thead>
                            <tr>
                                <th>Month</th>
                                <th>Days</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lastThreeMonths as $month)
                                @php
                                    $totalLengths = count($analyticsData['monthly_reservation_lengths']);
                                    $index = $totalLengths - 3 + $loop->index;
                                    $days = $analyticsData['monthly_reservation_lengths'][$index] ?? 'No data.';
                                @endphp
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);" class="text-muted">{{ $month->format('F') }}</a>
                                    </td>
                                    <td>{{ $days }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-5 col-lg-12">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Monthly occupancy rate </h4>
                </div>

                <div class="card-body pt-0">
                    <div id="occupancy-chart" class="apex-charts" data-colors="#3e60d5"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="card">
            <div class="d-flex card-header justify-content-between align-items-center">
                <h4 class="header-title">Reservations (Last 30)</h4>
            </div>
            <div class="card-body pt-0">
                <div id="listing-reservations-chart"></div>
            </div>
        </div>
    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.dashboard-analytics.js'])
    <script type="text/javascript">
        let channels = @json($analyticsData['channels']);
        let seriesNetRevenue = @json($analyticsData['series_net_revenue']);
        let seriesGuests = @json($analyticsData['series_guests']);
        let reservationDates = @json($analyticsData['series_reservation_dates']);
        let seriesNights = @json($analyticsData['series_reservation_nights']);
        let reservationLengths = @json($analyticsData['monthly_reservation_lengths']);
        let months = @json($analyticsData['month_names']);
        let occupancy = @json($analyticsData['occupancy_by_month']);
    </script>
@endsection
