@extends('layouts.vertical', ['page_title' => 'Analytics Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'])
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control shadow border-0" id="dash-daterange">--}}
{{--                                <span class="input-group-text bg-success border-success text-white">--}}
{{--                                    <i class="ri-calendar-todo-fill fs-13"></i>--}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                           TODO: hello--}}

                            <a href="javascript: location.reload();" class="btn btn-success ms-2 flex-shrink-0">
                                <i class="ri-refresh-line"></i> Refresh
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard <span class="text-muted">(Beta)</span></h4>
                </div>
                <div class="alert alert-warning text-bg-warning border-0" role="alert">
                   <span style="color: #464f5b;"> <strong>Warning! - </strong> Dear host, you can follow analysis & charts of your properties
                    from below. Please note that this page is in its early access phase and will be much improved in terms of design and functionality in the future.
                Thank you for your patience.</span>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-lg-5">
            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-line text-bg-info widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Accepted Reservations</h5>
                        <h3 class="my-3">{{count($dashboardData['reservations']->where('status','accepted'))}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2">All time</span>
                            <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$dashboardData['listings']->first()['id']}}">See details</a>
                            </span>
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
                        <h5 class="text-muted fw-normal mt-0" title="Average Profit">Profit</h5>
                        <h3 class="my-3">€{{round($dashboardData['user_total_revenue'], 2)}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2">All time</span>
                            <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$dashboardData['listings']->first()['id']}}">See details</a>
                            </span>
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
                        <h5 class="text-muted fw-normal mt-0" title="Awaiting Profit">Pending Profit</h5>
                        <h3 class="my-3">€{{round($dashboardData['user_open_revenue'],2)}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2">All time</span>
                            <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','reservations']).'?listingId='.$dashboardData['listings']->first()['id']}}">See details</a>
                            </span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-line-chart-line text-bg-success widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Listings</h5>
                        <h3 class="my-3">{{count($dashboardData['listings'])}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2">Total</span>
                            <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['pages','properties'])}}">See details</a>
                            </span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-calendar-event-line text-bg-secondary widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Available Reservation Days</h5>
                        <h3 class="my-3">{{Auth()->user()['days']}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2">This year</span>
                            <span class="float-end"><i class="ri-arrow-right-line"></i>
                            <a href="{{route('second',['apps','calendar'])}}">See calendar</a>
                            </span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
        <div class="row">
            <div class="col col-4">
                <div class="card">
                    <div class="d-flex card-header bg-secondary-subtle">
                        <h4 class="header-title">Bookings by source (Accepted bookings only)</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="pie-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="chart" id="cashflow-chart"></div>
                </div>
            </div>
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chart" id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end row -->
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
    <script>
        let seriesGuests = @json($dashboardData['series_guests']);
        let seriesNetProfit = @json($dashboardData['series_net_revenue']);
        let seriesMonths = @json($dashboardData['series_months']);
        let seriesMonthlyProfit = @json($dashboardData['series_monthly_profit']);
        let reservationDates = @json($dashboardData['reservation_dates']);
        let reservationListings = @json($dashboardData['reservation_listings']);
        let reservationNights = @json($dashboardData['reservation_nights']);
        let seriesPievals = @json($dashboardData['series_pievals'])
    </script>
@endsection

