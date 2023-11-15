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
                            <div class="input-group">
                                <input type="text" class="form-control shadow border-0" id="dash-daterange">
                                <span class="input-group-text bg-success border-success text-white">
                                    <i class="ri-calendar-todo-fill fs-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-success ms-2 flex-shrink-0">
                                <i class="ri-refresh-line"></i> Refresh
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-lg-4">
            <div class="col col-md-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-line text-bg-info widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Accepted Reservations</h5>
                        <h3 class="my-3">{{$dashboardData['reservations_count']}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ri-arrow-up-line"></i>{{$dashboardData['reservations_count']}}</span>
                            <span class="text-nowrap">Since last month</span>
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
                        <h3 class="my-3">€{{$dashboardData['user_total_revenue']}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ri-arrow-up-line"></i>€{{$dashboardData['user_total_revenue']}}</span>
                            <span class="text-nowrap">Since last month</span>
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
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Open Revenue</h5>
                        <h3 class="my-3">€{{$dashboardData['user_open_revenue']}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ri-arrow-up-line"></i>€{{$dashboardData['user_open_revenue']}}</span>
                            <span class="text-nowrap">Since last month</span>
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
                        <h3 class="my-3">{{$dashboardData['user_listing_count']}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="ri-arrow-up-line"></i> {{$dashboardData['user_listing_count']}}</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chart" id="chart"></div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/dashboard.js'])
    <script>
        let seriesSubTotal = @json($dashboardData['series_subtotal']);
        let seriesCommission = @json($dashboardData['series_commission']);
        let seriesNetRevenue = @json($dashboardData['series_net_revenue']);
        let reservationDates = @json($dashboardData['reservation_dates']);
        let reservationListings = @json($dashboardData['reservation_listings']);
    </script>
@endsection

