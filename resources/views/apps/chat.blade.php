@extends('layouts.vertical', ['page_title' => 'Chat', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Chat</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chat</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- start chat users-->
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-start mb-3">
                            <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="42" alt="Brandon Smith">
                            <div class="w-100">
                                <h5 class="mb-0">
                                    <a href="{{ route('second', ['pages', 'profile']) }}" class="text-reset lh-base">Tosha Minner</a>
                                </h5>
                                <p class="mb-0 text-muted">
                                    <small class="ri-checkbox-blank-circle-fill text-success"></small> Online
                                </p>
                            </div>
                            <a href="javascript: void(0);" class="text-reset fs-20">
                                <i class="ri-settings-5-line"></i>
                            </a>
                        </div>

                        <!-- start search box -->
                        <div class="app-search">
                            <form>
                                <div class="mb-2 w-100 position-relative">
                                    <input type="search" class="form-control" placeholder="People, groups &amp; messages...">
                                    <span class="ri-search-line search-icon"></span>
                                </div>
                            </form>
                        </div>
                        <!-- end search box -->

                        <h6 class="fs-13 text-muted text-uppercase mt-2">Group Chats</h6>
                        <div class="py-2">
                            <a href="javascript: void(0);" class="text-reset mb-2 d-block">
                                <i class="ri-checkbox-blank-circle-line me-1 text-success"></i>
                                <span class="mb-0 mt-1">App Development</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset mb-2 d-block">
                                <i class="ri-checkbox-blank-circle-line me-1 text-warning"></i>
                                <span class="mb-0 mt-1">Office Work</span>
                            </a>
                        </div>

                        <h6 class="fs-13 text-muted text-uppercase mb-2">Contacts</h6>
                    </div> <!-- end card-body-->

                    <div class="card-body p-0">
                        <!-- users -->
                        <div class="row">
                            <div class="col">
                                <div data-simplebar style="max-height: 380px;">
                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="42" alt="Brandon Smith" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">4:30am</span>
                                                    Brandon Smith
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-25 float-end text-end"><span class="badge bg-danger-subtle text-danger">3</span></span>
                                                    <span class="w-75">How are you today?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3 bg-light-subtle border-top border-bottom border-light">
                                            <img src="/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="42" alt="James Z" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">5:30am</span>
                                                    James Zavel
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">typing...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="42" alt="Maria C" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Thu</span>
                                                    Maria C
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-25 float-end text-end"><span class="badge bg-danger-subtle text-danger">2</span></span>
                                                    <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-10.jpg" class="me-2 rounded-circle" height="42" alt="Rhonda D" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Wed</span>
                                                    Rhonda D
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">Please check these design assets...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="42" alt="Michael H" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Tue</span>
                                                    Michael H
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">Are you free for 15 min? I would like to discuss something...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="42" alt="Thomas R" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Tue</span>
                                                    Thomas R
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">Let's have meeting today between me, you and Tony...</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="42" alt="Thomas J" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Tue</span>
                                                    Thomas J
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">Howdy?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0);" class="text-body">
                                        <div class="d-flex align-items-start py-2 px-3">
                                            <img src="/images/users/avatar-4.jpg" class="me-2 rounded-circle" height="42" alt="Ricky J" />
                                            <div class="w-100">
                                                <h5 class="my-0">
                                                    <span class="float-end text-muted fw-normal fs-12">Mon</span>
                                                    Ricky J
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    <span class="w-75">Are you interested in learning?</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- end slimscroll-->
                            </div>
                            <!-- End col -->
                        </div>
                        <!-- end users -->
                    </div>
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xl-9 col-lg-8">

                <div class="card">
                    <div class="card-body py-2 px-3 border-bottom border-light">
                        <div class="row justify-content-between py-1">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-start">
                                    <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="36" alt="Brandon Smith">
                                    <div>
                                        <h5 class="my-0 font-15">
                                            <a href="{{ route('second', ['pages', 'profile']) }}" class="text-reset">James Zavel</a>
                                        </h5>
                                        <p class="mt-1 mb-0 text-muted fs-12">
                                            <small class="ri-checkbox-blank-circle-fill text-danger"></small> Offline
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div id="tooltips-container">
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-phone-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Voice Call"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-vidicon-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Video Call"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-group-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Users"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-delete-bin-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Chat"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="conversation-list p-3" data-simplebar style="max-height: 520px;">
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="James Z" />
                                    <i>10:00</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Hello!
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="Geneva M" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Hi, How are you? What about our next meeting?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="James Z" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Yeah everything is fine
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="Geneva M" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Wow that's great
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Let's have it today if you are free
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="Geneva M" class="rounded" />
                                    <i>10:03</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Sure thing! let me know if 2pm works for you
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Sorry, I have another meeting scheduled at 2pm. Can we have it at 3pm instead?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            We can also discuss about the presentation talk format if you have some extra mins
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="Geneva M" class="rounded" />
                                    <i>10:05</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. I am attaching the last year format and assets here...
                                        </p>
                                    </div>
                                    <div class="card mt-2 mb-1 shadow-none border text-start">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-primary rounded">
                                                            .ZIP
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Attex-sketch.zip</a>
                                                    <p class="mb-0 text-muted">2.3 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                        <i class="ri-download-2-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col">
                                <div class="bg-light p-3 rounded">
                                    <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                        <div class="row">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" class="form-control border-0" placeholder="Enter your text" required="" />
                                                <div class="invalid-feedback">
                                                    Please enter your messsage
                                                </div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-light"><i class="ri-attachment-2"></i></a>
                                                    <button type="submit" class="btn btn-success chat-send w-100"><i class="ri-send-plane-2-line"></i></button>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    </form>
                                </div>
                            </div>
                            <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-body -->
                </div> <!-- end card -->
            </div>
            <!-- end chat area-->

        </div> <!-- end row-->

    </div> <!-- container -->
@endsection
