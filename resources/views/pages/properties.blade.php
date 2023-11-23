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
                    <h4 class="page-title">Properties <span class="text-muted">(Pre Alpha)</span></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        {{--        <div class="col-xl-12">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="d-flex header-title bg-secondary-subtle"></div>--}}
        {{--                    <h4 class="header-title">My Listings</h4>--}}
        {{--                    <p class="text-muted fs-14">--}}
        {{--                        All of your listings are listed below.--}}
        {{--                    </p>--}}

        {{--                    <div class="row">--}}
        {{--                        <div class="col-sm-3 mb-2 mb-sm-0">--}}
        {{--                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"--}}
        {{--                                 aria-orientation="vertical">--}}
        {{--                                @forelse($propertiesData['listings'] as $listing)--}}
        {{--                                    <a class="nav-link active show" id="v-pills-{{$listing['id']}}-tab"--}}
        {{--                                       data-bs-toggle="pill"--}}
        {{--                                       href="#v-pills-{{$listing['id']}}" role="tab"--}}
        {{--                                       aria-controls="v-pills-{{$listing['id']}}"--}}
        {{--                                       aria-selected="true">--}}
        {{--                                        {{$listing['street']}}--}}
        {{--                                    </a>--}}
        {{--                                @empty--}}
        {{--                                    <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill"--}}
        {{--                                       href="#v-pills-airbnb" role="tab" aria-controls="v-pills-home"--}}
        {{--                                       aria-selected="true">--}}
        {{--                                        No properties found--}}
        {{--                                    </a>--}}
        {{--                                @endforelse--}}
        {{--                            </div>--}}
        {{--                        </div> <!-- end col-->--}}

        {{--                        <div class="col-sm-9">--}}
        {{--                            <div class="tab-content" id="v-pills-tabContent">--}}
        {{--                                @forelse($propertiesData['listings'] as $listing)--}}
        {{--                                    <div class="tab-pane fade @if($loop->first){{'active show'}}@endif"--}}
        {{--                                         id="v-pills-{{$listing['id']}}" role="tabpanel"--}}
        {{--                                         aria-labelledby="v-pills-{{$listing['id']}}-tab">--}}
        {{--                                    </div>--}}
        {{--                                    <!-- project card -->--}}
        {{--                                    <div class="card d-block">--}}
        {{--                                        <div class="card-body ">--}}
        {{--                                            <div class="dropdown float-end">--}}
        {{--                                                <a href="#" class="dropdown-toggle arrow-none text-muted"--}}
        {{--                                                   data-bs-toggle="dropdown" aria-expanded="false">--}}
        {{--                                                    <i class="ri-more-fill fs-18"></i>--}}
        {{--                                                </a>--}}
        {{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
        {{--                                                    <!-- item-->--}}
        {{--                                                    <a href="javascript:void(0);" class="dropdown-item">--}}
        {{--                                                        <i class='ri-attachment-line me-1'></i>Attachment--}}
        {{--                                                    </a>--}}
        {{--                                                    <!-- item-->--}}
        {{--                                                    <a href="javascript:void(0);" class="dropdown-item">--}}
        {{--                                                        <i class='ri-edit-box-line me-1'></i>Edit--}}
        {{--                                                    </a>--}}
        {{--                                                    <!-- item-->--}}
        {{--                                                    <a href="javascript:void(0);" class="dropdown-item">--}}
        {{--                                                        <i class='ri-file-copy-2-line me-1'></i>Mark as Duplicate--}}
        {{--                                                    </a>--}}
        {{--                                                    <div class="dropdown-divider"></div>--}}
        {{--                                                    <!-- item-->--}}
        {{--                                                    <a href="javascript:void(0);" class="dropdown-item text-danger">--}}
        {{--                                                        <i class='ri-delete-bin-line me-1'></i>Delete--}}
        {{--                                                    </a>--}}
        {{--                                                </div>--}}
        {{--                                                <!-- end dropdown menu-->--}}
        {{--                                            </div>--}}
        {{--                                            <!-- end dropdown-->--}}


        {{--                                            <h4>{{$listing['street'] . ' - '. $listing['name']}}</h4>--}}

        {{--                                            <div class="row">--}}
        {{--                                                <div class="col-md-3">--}}
        {{--                                                    <!-- Listing -->--}}
        {{--                                                    <p class="mt-2 mb-1 text-muted">Image</p>--}}
        {{--                                                    <div class="d-flex align-items-start">--}}
        {{--                                                        <img src="{{$listing['thumbnail_file']}}" alt="img"--}}
        {{--                                                             class="rounded me-2" height="100"/>--}}
        {{--                                                        <div class="w-100">--}}
        {{--                                                            <h5 class="mt-1">--}}
        {{--                                                            </h5>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                    <!-- end Listing -->--}}
        {{--                                                </div>--}}
        {{--                                                <!-- end col -->--}}
        {{--                                                <div class="col-md-9 d-flex justify-content-between">--}}
        {{--                                                    <div class="col-md-auto">--}}
        {{--                                                        <!-- start State -->--}}
        {{--                                                        <p class="mt-2 mb-1 text-muted">Type</p>--}}
        {{--                                                        <div class="d-flex align-items-start">--}}
        {{--                                                            @if($listing['property_type']=='Apartment')--}}
        {{--                                                                <i class="ri-home-7-line fs-18 text-success me-1"></i>--}}
        {{--                                                            @else--}}
        {{--                                                                <i class="ri-home-smile-2-line fs-18 text-success me-1"></i>--}}
        {{--                                                            @endif--}}
        {{--                                                            <div class="w-100">--}}
        {{--                                                                <h5 class="mt-1">--}}
        {{--                                                                    {{$listing['property_type']?? 'No data'}}--}}
        {{--                                                                </h5>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <!-- end State -->--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="col-md-auto">--}}
        {{--                                                        <!-- start Title -->--}}
        {{--                                                        <p class="mt-2 mb-1 text-muted">Street</p>--}}
        {{--                                                        <div class="d-flex align-items-start">--}}
        {{--                                                            <i class="ri-map-pin-line fs-18 text-success me-1"></i>--}}
        {{--                                                            <div class="w-100">--}}
        {{--                                                                <h5 class="mt-1">--}}
        {{--                                                                    {{$listing['street'] ?? 'No data'}}--}}
        {{--                                                                </h5>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div><!-- end Title -->--}}
        {{--                                                    <div class="col-md-auto">--}}
        {{--                                                        <!-- start Title -->--}}
        {{--                                                        <p class="mt-2 mb-1 text-muted">Listing Title</p>--}}
        {{--                                                        <div class="d-flex align-items-start">--}}
        {{--                                                            <i class="ri-double-quotes-l fs-18 text-success me-1"></i>--}}
        {{--                                                            <div class="w-100">--}}
        {{--                                                                <h5 class="mt-1">--}}
        {{--                                                                    {{$listing['name'] ?? 'No data'}}--}}
        {{--                                                                </h5>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div><!-- end Title -->--}}

        {{--                                                    <div class="col-md-auto">--}}
        {{--                                                        <!-- start State -->--}}
        {{--                                                        <p class="mt-2 mb-1 text-muted">State</p>--}}
        {{--                                                        <div class="d-flex align-items-start">--}}
        {{--                                                            <i class="ri-earth-line fs-18 text-success me-1"></i>--}}
        {{--                                                            <div class="w-100">--}}
        {{--                                                                <h5 class="mt-1">--}}
        {{--                                                                    {{$listing['state']??'No data'}}--}}
        {{--                                                                </h5>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <!-- end State -->--}}
        {{--                                                    </div>--}}
        {{--                                                    <!-- end col -->--}}
        {{--                                                    <div class="col-md-auto">--}}
        {{--                                                        <!-- start State -->--}}
        {{--                                                        <p class="mt-2 mb-1 text-muted">Country</p>--}}
        {{--                                                        <div class="d-flex align-items-start">--}}
        {{--                                                            <i class="ri-earth-line fs-18 text-success me-1"></i>--}}
        {{--                                                            <div class="w-100">--}}
        {{--                                                                <h5 class="mt-1">--}}
        {{--                                                                    {{$listing['country']?? 'No data'}}--}}
        {{--                                                                </h5>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <!-- end State -->--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                            <!-- end row -->--}}

        {{--                                            <h5 class="mt-3">Overview:</h5>--}}

        {{--                                            <p class="text-muted mb-4">--}}
        {{--                                                This is a wider card with supporting text below as a natural lead-in to--}}
        {{--                                                additional content. This content is a little bit longer. Some quick--}}
        {{--                                                example text to build on the card title and make up the bulk of the--}}
        {{--                                                card's--}}
        {{--                                                content. Some quick example text to build on the card title and make up.--}}
        {{--                                            </p>--}}
        {{--                                        </div>--}}
        {{--                                        <!-- end card-body-->--}}
        {{--                                    </div>--}}
        {{--                                    <!-- end card-->--}}

        {{--                            </div>--}}
        {{--                            <!-- end card-->--}}
        {{--                            @empty--}}
        {{--                                {{'mt'}}--}}
        {{--                            @endforelse--}}
        {{--                        </div> <!-- end tab-content-->--}}
        {{--                    </div> <!-- end col-->--}}
        {{--                </div>--}}
        {{--                <!-- end row-->--}}
        {{--            </div> <!-- end card-body -->--}}
        {{--        </div> <!-- end card-->--}}
        <div class="alert alert-warning text-bg-warning border-0" role="alert">
            <span
                style="color: #464f5b;"><strong>Warning! - </strong> Dear host, This page represents the <strong>pre alpha</strong>
                stage of its development. Please note that this page is in its early access phase and will be much improved in terms of design and functionality in the future.
                Thank you for your patience.</span>
        </div>
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
                                        <a href="{{route('second',['apps','calendar'])}}"
                                           class="btn btn-soft-dark rounded-pill text-body fs-20"> <i
                                                class="ri-calendar-event-line"></i></a>
                                        <a href="{{route('second', ['pages', 'reservations']).'?listingId='.$listing['id'] }}"
                                           class="btn btn-soft-dark rounded-pill text-body fs-20"> <i
                                                class="ri-bookmark-3-line"></i></a>
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

