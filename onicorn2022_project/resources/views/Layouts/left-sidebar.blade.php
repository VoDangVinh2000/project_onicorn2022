<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" style="overflow-y: auto;">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Nowak Helme</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="index.html">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="#page" data-bs-toggle="collapse">
                        <i class="fa fa-newspaper-o"></i>
                        <span> Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="page">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin_page_list')}}">List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#news" data-bs-toggle="collapse">
                        <i class="fa fa-newspaper-o"></i>
                        <span> News </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="news">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin-news">List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#layouts" data-bs-toggle="collapse">
                        <i class="fa fa-pencil-square-o"></i>
                        <span> Layouts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="layouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin-menus">Menus</a>
                            </li>
                            <li>
                                <a href="/admin-footer">Footer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#head" data-bs-toggle="collapse">
                        <i class="fa fa-pencil-square-o"></i>
                        <span> Head </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="head">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin-head">List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#banner" data-bs-toggle="collapse">
                        <i class="fa fa-pencil-square-o"></i>
                        <span> Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="banner">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin-banner">List</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
