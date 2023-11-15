<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('any', 'index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('any', 'index') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/images/logo-dark.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{ route('second', ['pages', 'profile']) }}">
                <img src="/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Tosha Minner</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>


            <li class="side-nav-item">
                <a href="{{ route('any', 'index') }}" class="side-nav-link">
                    <i class="ri-home-4-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            @if(Auth::user()['role']==='Admin')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Admin </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['auth', 'login']) }}">Create new user</a>
                            <a href="{{ route('second', ['auth', 'login']) }}">Set listing</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            <li class="side-nav-item">
                <a href="{{ route('second', ['apps', 'calendar']) }}" class="side-nav-link">
                    <i class="ri-calendar-event-line"></i>
                    <span> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('second', ['pages', 'profile']) }}" class="side-nav-link">
                    <i class="ri-account-pin-circle-line"></i>
                    <span> Profile </span>
                </a>
            </li>


{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">--}}
{{--                    <i class="ri-mail-line"></i>--}}
{{--                    <span> Email </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarEmail">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['email', 'inbox']) }}">Inbox</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['email', 'read']) }}">Read Email</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">--}}
{{--                    <i class="ri-task-line"></i>--}}
{{--                    <span> Tasks </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarTasks">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['task', 'list']) }}">List</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['task', 'details']) }}">Details</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('second', ['apps', 'kanban']) }}" class="side-nav-link">--}}
{{--                    <i class="ri-list-check-3"></i>--}}
{{--                    <span> Kanban Board </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">--}}
{{--                    <i class="ri-shield-user-line"></i>--}}
{{--                    <span> Auth Pages </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarPagesAuth">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'login']) }}">Login</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'login-2']) }}">Login 2</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'register']) }}">Register</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'register-2']) }}">Register 2</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'logout']) }}">Logout</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'logout-2']) }}">Logout 2</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'recoverpw']) }}">Recover Password</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'recoverpw-2']) }}">Recover Password 2</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'lock-screen']) }}">Lock Screen</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'lock-screen-2']) }}">Lock Screen 2</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'confirm-mail']) }}">Confirm Mail</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('second', ['auth', 'confirm-mail-2']) }}">Confirm Mail 2</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
