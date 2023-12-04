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
                    <h4 class="page-title">Properties <span class="text-muted">(Beta)</span></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="alert alert-warning text-bg-warning border-0" role="alert">
                    <span
                        style="color: #464f5b;"><strong>Warning! - </strong> Dear host, This page represents the <strong>beta</strong>
                        stage of its development. Please note that this page is in its early access phase and will be much improved in terms of design and functionality in the future.
                        Thank you for your patience.</span>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex header-title bg-secondary-subtle"></div>
                    <h4 class="header-title">My Listings</h4>
                    <p class="text-muted fs-14">
                        All of your listings are listed below.
                    </p>

                    <div class="row">
                        <div class="col-sm-2 mb-2 mb-sm-0">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                @forelse($propertiesData['listings'] as $listing)

                                    <a class="nav-link {{$loop->first ? 'active':''}}" id="v-pills-{{$listing['id']}}-tab"
                                       data-bs-toggle="pill"
                                       href="#v-pills-{{$listing['id']}}" role="tab"
                                       aria-controls="v-pills-{{$listing['id']}}"
                                       aria-selected="{{$loop->first ? 'true':'false'}}">
                                        {{$listing['street']}}
                                    </a>
                                @empty
                                    <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill"
                                       role="tab" aria-controls="v-pills-home"
                                       aria-selected="true">
                                        No properties found
                                    </a>
                                @endforelse
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                @forelse($propertiesData['listings'] as $listing)
                                    <div class="tab-pane fade {{$loop->first ? 'active show':''}}"
                                         id="v-pills-{{$listing['id']}}" role="tabpanel"
                                         aria-labelledby="v-pills-{{$listing['id']}}-tab">
                                        <!-- project card -->
                                        <div class="card bg-light-subtle d-block">
                                            <div class="card-body ">
                                                <h4>{{$listing['street']}}</h4>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <!-- listing -->
                                                        <p class="mt-2 mb-1 text-muted">Image</p>
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{$listing['thumbnail_file']}}" alt="img"
                                                                 class="rounded me-2" height="100"/>
                                                            <div class="w-100">
                                                                <h5 class="mt-1">
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!-- end listing -->
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-md-9">
                                                        <div class="row d-flex flex-wrap  justify-content-start">
                                                            <!-- start state -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Type</p>
                                                                <div class="d-flex align-items-start">
                                                                    @if($listing['property_type']=='Apartment')
                                                                        <i class="ri-home-7-line fs-18 text-success me-1"></i>
                                                                    @else
                                                                        <i class="ri-home-smile-2-line fs-18 text-success me-1"></i>
                                                                    @endif
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['property_type']?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end state -->
                                                            <!-- start street -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Street</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-map-pin-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['street'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end street -->
                                                            <!-- start title -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Listing Title</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-double-quotes-l fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['name'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end title -->
                                                            <!-- start city -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">City</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-earth-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['city']??'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end city -->
                                                            <!-- start country -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Country</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-earth-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['country'] = null ?? 'Cyprus'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end country -->
                                                            <!-- start minimum nights -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Minimum Nights</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-moon-fill fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['min_nights'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end minimum nights -->
                                                            <!-- start maximum nights -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Maximum Nights</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-moon-fill fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['max_nights'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end maximum nights -->
                                                            <!-- start beds -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Beds</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-hotel-bed-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['beds'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end beds -->
                                                            <!-- start bedrooms -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Bedrooms</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-home-office-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['bedrooms'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end bedrooms -->
                                                            <!-- start person capacity -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Person Capacity</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-team-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{$listing['person_capacity'] ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end person capacity -->
                                                            <!-- start checkin -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Checkin</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-time-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{\Carbon\Carbon::parse($listing['checkin_start'])->format('H:i') ?? 'No data'}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end checkin -->
                                                            <!-- start checkin start -->
                                                            <div class="col-md-2">
                                                                <p class="mt-2 mb-1 text-muted">Check Out</p>
                                                                <div class="d-flex align-items-start">
                                                                    <i class="ri-time-line fs-18 text-success me-1"></i>
                                                                    <div class="w-100">
                                                                        <h5 class="mt-1">
                                                                            {{\Carbon\Carbon::parse($listing['checkout']??'11:00')->format('H:i')}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end checkin start-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <h5 class="mt-3">Tags:</h5>

                                                <p class="text-muted mb-4">
                                                    {{json_decode($listing['tags'])}}
                                                </p>

                                                <div class="col col-auto d-flex justify-content-end">
                                                    <a href="{{route('second',['apps','calendar'])}}" type="button" class="btn btn-success m-1">
                                                        <i class="ri-calendar-event-line me-1"></i>
                                                        <span>Calendar</span>
                                                    </a>
                                                    <a href="{{route('second',['pages','reservations']).'?listingId='.$listing['id']}}" type="button" class="btn btn-info m-1">
                                                        <i class="ri-bookmark-3-line me-1"></i>
                                                        <span>Reservations</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end card-body-->
                                        </div>
                                        <!-- end card-->
                                    </div>

                                    <!-- end card-->
                                @empty
                                    No Listings Found.
                                @endforelse
                            </div> <!-- end tab-content-->
                        </div>
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
@endsection

