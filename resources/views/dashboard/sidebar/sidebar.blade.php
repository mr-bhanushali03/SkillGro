    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('storage/website') }}/img/favicon.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt="" height="30">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('storage/website') }}/img/favicon.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt="" height="30">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                    @if (auth()->user()->role == 'Super Admin')    
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('category*') ? 'active' : '' }}" href="{{ route('category') }}"
                            target="_self" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="las la-chart-pie"></i> <span data-key="t-layouts">Category</span>
                        </a>
                    </li>
                    @endif
                    
                    @if (auth()->user()->role == 'Instructor')    
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('course*') ? 'active' : '' }}" href="{{ route('course') }}"
                            target="_self" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-git-repository-fill"></i> <span data-key="t-layouts">Course</span>
                        </a>
                    </li>                    
                    @endif

                    {{-- <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="las la-tachometer-alt"></i> <span data-key="t-layouts">Dashboard</span> <span
                                class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('website.courses')}}" target="_self" class="nav-link"
                                        data-key="t-horizontal">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" target="_self" class="nav-link"
                                        data-key="t-detached">Become a Teacher</a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu --> --}}

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
