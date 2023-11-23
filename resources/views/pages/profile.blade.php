@extends('layouts.vertical', ['page_title' => 'Profile', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile <span class="text-muted">(Beta)</span></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="/images/Asset 16.png" class="rounded avatar-lg img-thumbnail object-fit-lg-contain" alt="profile-image">

                        <h4 class="mb-1 mt-2">{{Auth::user()['name'] }}</h4>
                        <p class="text-muted">{{Auth::user()['role']}}</p>

                        <div class="text-start mt-3">
                            <p class="text-muted mb-2"><strong>Full Name :</strong> <span class="ms-2">{{ \Illuminate\Support\Facades\Auth::user()['name'] }}</span></p>

                            <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2 ">{{ \Illuminate\Support\Facades\Auth::user()['email'] }}</span></p>

                            <p class="text-muted mb-1"><strong>User Type :</strong> <span class="ms-2">{{Auth::user()['role']}}</span></p>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->



            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
                <!-- Chart-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Bookings & Revenue</h4>
                        <div>
                            <div style="height: 260px;" class="chartjs-chart">
                                <canvas id="high-performing-product"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Chart-->

                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-start rounded-0 active">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-end rounded-0">
                                    Settings
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="aboutme">

                                <h5 class="text-uppercase mb-3"><i class="ri-briefcase-line me-1"></i>
                                    Listings</h5>
                                <div class="table-responsive">
                                    <table class="table table-sm table-centered table-hover table-borderless mb-0">
                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Street</th>
                                                <th>Total Reservations</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($profileData['listings'] as $listing)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{$listing['thumbnail_file']}}" alt="thumbnail_file" class="avatar-xs me-2 rounded-circle" height="24">
                                                    {{$listing['name']}}</td>
                                                <td>{{$listing['street']}}</td>
                                                <td>{{$listing->reservations()->where('status','accepted')->count()}}</td>
                                                @if($listing['is_listed'])
                                                <td><span class="badge bg-info-subtle text-success-emphasis">Listed</span></td>
                                                @else
                                                    <td><span class="badge bg-warning-subtle text-warning-emphasis">Unlisted</span></td>
                                                @endif
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>1</td>
                                                <td><img src="" alt="thumbnail_file" class="avatar-xs me-2 rounded-circle" height="24">
                                                    No listings Found</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>


                            </div> <!-- end tab-pane -->
                            <!-- end about me section content -->

                            <div class="tab-pane" id="settings">
                                <form action="/auth/update-user" method="POST">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="ri-contacts-book-2-line me-1"></i> Personal Info</h5>
                                    @if (sizeof($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="username" placeholder="Enter password" value="{{Auth()->user()['name']}}" name="name">
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="useremail" placeholder="Enter email" value="{{Auth()->user()['email']}}" readonly="readonly" name="email">
                                            </div>
                                        </div><!-- end col -->
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="old_password">
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                                <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password" name="old_password_confirmation">
                                            </div>
                                        </div><!-- end col -->
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="newpassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="password">
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="newpassword_confirmation" class="form-label">Password Confirmation</label>
                                                <input type="password" class="form-control" id="newpassword_confirmation" placeholder="Enter new password" name="password_confirmation">
                                            </div>
                                        </div><!-- end col -->
                                    </div> <!-- end row -->
                                    <div class="text-end">
                                       <button type="submit" class="btn btn-success mt-2"><i class="ri-save-line"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.profile.js'])
    <script>
        let seriesBookingsCount = @json($profileData['series_bookings_count']);
        let seriesRevenue = @json($profileData['series_revenue']);
        let seriesMonths = @json($profileData['series_months']);
    </script>
@endsection
