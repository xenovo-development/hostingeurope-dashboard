@extends('layouts.vertical', ['page_title' => 'Properties', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
        'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
    ])
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Listings</h4>
                        <p class="text-muted fs-14">
                            All the listings with their bound users. You can change it by clicking the user name.
                        </p>

                        <table id="listings-table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Street</th>
                                <th>Title</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Min Night</th>
                                <th>Max Night</th>
                                <th>Beds</th>
                                <th>Bedrooms</th>
                                <th>Capacity</th>
                                <th>CheckIn</th>
                                <th>CheckOut</th>
                                <th>Tags</th>
                                <th>Owner</th>
                            </tr>
                            </thead>


                            <tbody>
                            @forelse($listingData['listings'] as $listing)
                                <tr>
                                    <td>{{$listing['id']}}</td>
                                    <td>{{$listing['property_type']}}</td>
                                    <td>{{$listing['street']}}</td>
                                    <td>{{$listing['name']}}</td>
                                    <td>{{$listing['city']}}</td>
                                    <td>{{$listing['country']}}</td>
                                    <td>{{$listing['min_nights']}}</td>
                                    <td>{{$listing['max_nights']}}</td>
                                    <td>{{$listing['beds']}}</td>
                                    <td>{{$listing['bedrooms']}}</td>
                                    <td>{{$listing['person_capacity']}}</td>
                                    <td>{{$listing['checkin_start']}}</td>
                                    <td>{{$listing['checkout']}}</td>
                                    <td>{{$listing['tags']}}</td>
                                    <td><a href="" data-id="{{$listing['id']}}" data-name="{{$listing['name']}}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#right-modal" id="owner-link">{{$listing->user['name']}}</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No data.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

        <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-right">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h4 class="mt-0">Set owner</h4>
                            <p id="listing_name">Here you can change the owner of the listing </p>
                            <form action="{{route('listing.owner')}}" method="POST" id="owner-form">
                                @csrf
                                <div class="my-3">
                                    <label for="listing_id">Listing</label>
                                    <input name="listing_id" id="listing_id" class="form-control" readonly="readonly">
                                </div>
                                <div class="my-3">
                                    <label for="user_id">Users</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Select user...</option>
                                        @forelse($listingData['users'] as $user)
                                            <option value="{{$user['id']}}">{{$user['name']}}</option>
                                        @empty
                                            <option value="">No clients</option>
                                        @endforelse
                                    </select>
                                </div>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="loading-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <h4 class="text-center mt-xxl-4">Sending reservation request...</h4>
                    <div class="text-center mb-3 mt-3">
                        <div class="spinner-border avatar-lg text-primary m-2"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    @vite('resources/js/listings.js')
@endsection
