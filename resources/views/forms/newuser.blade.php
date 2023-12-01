@extends('layouts.vertical', ['page_title' => 'Form Elements', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Create a new user</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create A New User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">User Details</h4>
                        <p class="text-muted fs-14">
                            Please enter the new user details
                        </p>
                        <form action="/auth/create-user" method="POST">
                            @csrf

                            @if (sizeof($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                   placeholder="Enter password" name="password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Set Role</label>
                                        <select class="form-select form-select" id="role" name="role">
                                            <option selected>Open this select menu</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Host">Host</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" class="form-control" name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Confirmation</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                   placeholder="Enter password" name="password_confirmation">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-xxl-5">
                                        <button type="submit" class="btn btn-info">Create User</button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div> <!-- container -->
@endsection
