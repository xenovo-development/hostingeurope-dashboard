@extends('layouts.vertical', ['page_title' => 'Properties', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hosting Europe</a></li>
                            <li class="breadcrumb-item active">Properties</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Properties</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">My Listings</h4>
                        <p class="text-muted fs-14">
                            All of your listings are listed below.
                        </p>

                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                <tr>
                                    <th>Street</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>City</th>
                                    <th class="text-center">Links</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($propertiesData['listings'] as $listing)
                                    <tr>
                                        <td>
                                            <img src="{{$listing['thumbnail_file']}}" alt="table-user"
                                                 class="avatar-md me-2 rounded"/>
                                            {{$listing['street']}}
                                        </td>
                                        <td>{{$listing['name']}}</td>
                                        <td>{{$listing['property_type']}}</td>
                                        <td>{{$listing['city']}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-soft-dark rounded-pill">
                                                <a href="javascript: void(0);" class="text-body fs-18"> <i
                                                        class="ri-bar-chart-grouped-line"></i></a>
                                            </button>
                                            <button class="btn btn-soft-dark rounded-pill">
                                            <a href="javascript: void(0);" class="text-body fs-18"> <i
                                                class="ri-calendar-event-line"></i></a>
                                            </button>
                                            <button class="btn btn-soft-dark rounded-pill">
                                            <a href="javascript: void(0);" class="text-body fs-18"> <i
                                                class="ri-bookmark-3-line"></i></a>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <img src="" alt="table-user"
                                                 class="avatar-md me-2 rounded"/>
                                            No listings found
                                        </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td class="text-center">
                                            <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                                    class="ri-bar-chart-grouped-line"></i></a>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div><!-- end row -->
    </div> <!-- container -->
@endsection

