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
                            <span class="text-success me-2"><i class="ri-arrow-up-line"></i> 4.87%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Sessions by Browser</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div id="sessions-browser" class="apex-charts" data-colors="#16a7e9"></div>

                    <div class="mt-1 text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><img class="ms-3 pe-1"
                                                              src="/images/browsers/chrome.png" height="18"
                                                              alt="chrome"><span class="align-middle">45.87%</span></li>
                            <li class="list-inline-item"><img class="ms-3 pe-1"
                                                              src="/images/browsers/firefox.png" height="18"
                                                              alt="chrome"><span class="align-middle">3.25%</span></li>
                            <li class="list-inline-item"><img class="ms-3 pe-1"
                                                              src="/images/browsers/safari.png" height="18"
                                                              alt="chrome"><span class="align-middle">9.68%</span></li>
                            <li class="list-inline-item"><img class="ms-3 pe-1"
                                                              src="/images/browsers/web.png" height="18"
                                                              alt="chrome"><span class="align-middle">36.87%</span></li>
                        </ul>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Sessions by Operating System</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div id="sessions-os" class="apex-charts mt-2" data-colors="#16a7e9,#47ad77,#ffc35a,#f15776">
                    </div>

                    <div class="row text-center mt-2">
                        <div class="col-6">
                            <h4 class="fw-normal">
                                <span>8,285</span>
                            </h4>
                            <p class="text-muted mb-0">Online System</p>
                        </div>
                        <div class="col-6">
                            <h4 class="fw-normal">
                                <span>3,534</span>
                            </h4>
                            <p class="text-muted mb-0">Offline System</p>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Views Per Minute</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div id="views-min" class="apex-charts" data-colors="#16a7e9"></div>

                    <div class="table-responsive mt-3">
                        <table class="table table-sm mb-0">
                            <thead>
                            <tr>
                                <th>Page</th>
                                <th>Views</th>
                                <th>Bounce Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);"
                                       class="text-muted">/adminto/dashboard-analytics</a>
                                </td>
                                <td>25</td>
                                <td>87.5%</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-muted">/attex/dashboard-crm</a>
                                </td>
                                <td>15</td>
                                <td>21.48%</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="text-muted">/ubold/dashboard</a>
                                </td>
                                <td>10</td>
                                <td>63.59%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

    </div>


    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Sessions by country</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-lg-7">
                            <div id="world-map-markers" class="mt-3 mb-3" style="height: 332px">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="country-chart" class="apex-charts" data-colors="#16a7e9"></div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xxl-6">
            <div class="card card-h-100">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Sessions Overview</h4>
                    <ul class="nav d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">7d</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">15d</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">1m</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">1y</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="bg-light-subtle border-top border-bottom border-light">
                        <div class="row text-center">
                            <div class="col">
                                <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Direct</p>
                                <h3 class="fw-normal mb-3">
                                    <span>170k</span>
                                </h3>
                            </div>
                            <div class="col">
                                <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Organic Search</p>
                                <h3 class="fw-normal mb-3">
                                    <span>12M <i class="ri-corner-right-up-fill text-success"></i></span>
                                </h3>
                            </div>
                            <div class="col">
                                <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Refferal</p>
                                <h3 class="fw-normal mb-3">
                                    <span>8.27%</span>
                                </h3>
                            </div>
                            <div class="col">
                                <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Social</p>
                                <h3 class="fw-normal mb-3">
                                    <span>69k <i class="ri-corner-right-down-line text-danger"></i></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div>
                        <div id="sessions-overview" class="apex-charts" data-colors="#47ad77"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Channels</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i
                            class="ri-download-line ms-1"></i></a>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                            <thead class="border-top border-bottom bg-light-subtle border-light">
                            <tr>
                                <th>Channel</th>
                                <th>Visits</th>
                                <th style="width: 40%;">Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Direct</td>
                                <td>2,050</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%;"
                                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Organic Search</td>
                                <td>1,405</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%;"
                                             aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Refferal</td>
                                <td>750</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                             style="width: 30%;" aria-valuenow="30" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Social</td>
                                <td>540</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                             style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Other</td>
                                <td>8,965</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Social Media Traffic</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i
                            class="ri-download-line ms-1"></i></a>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                            <thead class="border-top border-bottom bg-light-subtle border-light">
                            <tr>
                                <th>Network</th>
                                <th>Visits</th>
                                <th style="width: 40%;">Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Facebook</td>
                                <td>2,250</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%"
                                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>1,501</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 45%"
                                             aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Twitter</td>
                                <td>750</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 30%"
                                             aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>LinkedIn</td>
                                <td>540</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 25%"
                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Other</td>
                                <td>13,851</td>
                                <td>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 52%"
                                             aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Engagement Overview</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i
                            class="ri-download-line ms-1"></i></a>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">
                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                            <thead class="border-top border-bottom bg-light-subtle border-light">
                            <tr>
                                <th>Duration (Secs)</th>
                                <th style="width: 30%;">Sessions</th>
                                <th style="width: 30%;">Views</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>0-30</td>
                                <td>2,250</td>
                                <td>4,250</td>
                            </tr>
                            <tr>
                                <td>31-60</td>
                                <td>1,501</td>
                                <td>2,050</td>
                            </tr>
                            <tr>
                                <td>61-120</td>
                                <td>750</td>
                                <td>1,600</td>
                            </tr>
                            <tr>
                                <td>121-240</td>
                                <td>540</td>
                                <td>1,040</td>
                            </tr>
                            <tr>
                                <td>141-420</td>
                                <td>56</td>
                                <td>886</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

    </div>
    <!-- end row -->

    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.dashboard-analytics.js'])
@endsection
