@extends('layouts.vertical', ['page_title' => 'Clients', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Clients</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Clients list</h4>
                    <p class="text-muted fs-14">
                        From here you can mock log in as selected users and then log back in to your actual account.
                    </p>

                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0" id="users-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Role</th>
                                <th>E-Mail</th>
                                <th>Listings <span class="text-muted">(Hostify ID's)</span></th>
                                <th>Log in</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usersData as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td class="table-user">
                                        <img src="/images/logo-dark.png" alt="table-user" class="me-2 rounded-circle"/>
                                        {{$user['name']}}
                                    </td>
                                    <td>{{$user['role']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        @php $count = 0; @endphp
                                        @forelse($user->listings as $listing)
                                            <span tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover"
                                                  data-bs-content="{{$listing['name']}}" title="{{$listing['street']}}">
                                                    {{$listing->id}}
                                                </span>
                                            @if(++$count == 15 && !$loop->last)
                                                <br>
                                                @php $count = 0; @endphp
                                            @endif
                                        @empty
                                            No Listings.
                                        @endforelse
                                    </td>
                                    <td>
                                        <form action="impersonate/user" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user['id']}}">
                                            <button type="submit" class="btn btn-soft-info"><i
                                                    class="ri-login-circle-line"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div> <!-- container -->
@endsection
@section('script')
    @vite(['resources/js/users.js'])
@endsection
