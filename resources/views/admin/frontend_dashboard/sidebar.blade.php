<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Code Club</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth()->user()->first_name .' '.Auth()->user()->last_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{Route('home')}}" class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/acm/') || request()->is('admin/acm/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/acm/') || request()->is('admin/acm/*') ? 'active' : '' }}">
                        <i class="fas fa-code"></i>
                        <p>
                            ACM
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">

                            <a href="{{Route("acm.home")}}" class="nav-link {{ request()->is('admin/acm/home') || request()->is('admin/acm/acm/*') ? 'active' : '' }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard ACM</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/acm/lesson') || request()->is('admin/acm/lesson/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-book"></i>
                                <p>
                                    Lesson Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('lesson.index')}}" class="nav-link nav-link {{ request()->is('admin/acm/lesson') || request()->is('admin/acm/lesson/*') && !request()->is('admin/acm/lesson/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of lesson</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('lesson.create')}}" class="nav-link {{ request()->is('admin/acm/lesson/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Lesson</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/acm/topic') || request()->is('admin/acm/topic/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-columns"></i>
                                <p>
                                    Topic Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('topic.index')}}" class="nav-link nav-link {{ request()->is('admin/acm/topic') || request()->is('admin/acm/topic/*') && !request()->is('admin/acm/topic/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of topic</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('topic.create')}}" class="nav-link {{ request()->is('admin/acm/topic/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create topic</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/acm/level') || request()->is('admin/acm/level/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-level-up-alt"></i>
                                <p>
                                    Level Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('level.index')}}" class="nav-link nav-link {{ request()->is('admin/acm/level') || request()->is('admin/acm/level/*') && !request()->is('admin/acm/level/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of level</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('level.create')}}" class="nav-link {{  request()->is('admin/acm/level/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create level</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/acm/ladder') || request()->is('admin/acm/ladder/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-layer-group"></i>
                                <p>
                                    Ladder Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('ladder.index')}}" class="nav-link nav-link {{ request()->is('admin/acm/ladder') || request()->is('admin/acm/ladder/*') && !request()->is('admin/acm/ladder/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of ladder</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('ladder.create')}}" class="nav-link {{ request()->is('admin/acm/ladder/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create ladder</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/calender/') || request()->is('admin/calender/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/calender/') || request()->is('admin/calender/*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-week"></i>
                            <p>
                            Calendar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">

                            <a href="{{Route("ShowCalendar")}}" class="nav-link {{ request()->is('admin/calender/') || request()->is('admin/calender/show-calendar') ? 'active' : '' }}">
                                <i class="far fa-calendar-alt"></i>
                                <p>Calendar View</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/calender/venue') || request()->is('admin/calender/venue/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-book"></i>
                                <p>
                                    Venue Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('venue.index')}}" class="nav-link nav-link {{ request()->is('admin/calender/venue') || request()->is('admin/calender/venue/*') && !request()->is('admin/calender/venue/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Venue</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('venue.create')}}" class="nav-link {{ request()->is('admin/calender/venue/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Venue</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('admin/calender/event') || request()->is('admin/calender/event/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/calender/event') || request()->is('admin/calender/event/*') ? 'active' : '' }}">
                                <i class="fab fa-elementor"></i>
                                <p>
                                    Event Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('event.index')}}" class="nav-link nav-link {{ request()->is('admin/calender/event') || request()->is('admin/calender/event/*') && !request()->is('admin/calender/event/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Event</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('event.create')}}" class="nav-link {{ request()->is('admin/calender/event/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Event</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('admin/calender/meeting') || request()->is('admin/calender/meeting/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-handshake"></i>
                                <p>
                                    meeting Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('meeting.index')}}" class="nav-link nav-link {{ request()->is('admin/calender/meeting') || request()->is('admin/calender/meeting/*') && !request()->is('admin/calender/meeting/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Meeting</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('meeting.create')}}" class="nav-link {{ request()->is('admin/calender/meeting/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Meeting</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('admin/user/') || request()->is('admin/user/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/user/') || request()->is('admin/user/*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">

                            <a href="{{Route("user.index")}}" class="nav-link {{ request()->is('admin/user/user') || request()->is('admin/user/user/*') && !request()->is('admin/user/user/create') ? 'active' : '' }}">
                                <i class="fas fa-th-list"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item ">

                            <a href="{{Route("user.create")}}" class="nav-link {{ request()->is('admin/user/user/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square"></i>
                                <p>User Create</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/exam/') || request()->is('admin/exam/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/exam/') || request()->is('admin/exam/*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        <p>
                            Exam
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item has-treeview {{ request()->is('admin/exam/category') || request()->is('admin/exam/category/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="far fa-list-alt"></i>
                                <p>
                                    Category Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('category.index')}}" class="nav-link nav-link {{ request()->is('admin/exam/category') || request()->is('admin/exam/category/*') && !request()->is('admin/exam/category/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category.create')}}" class="nav-link {{ request()->is('admin/exam/category/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('admin/exam/question') || request()->is('admin/exam/question/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-question"></i>
                                <p>
                                    Question Management

                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('question.index')}}" class="nav-link nav-link {{ request()->is('admin/exam/question') || request()->is('admin/exam/question/*') && !request()->is('admin/exam/question/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Question</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('question.create')}}" class="nav-link {{ request()->is('admin/exam/question/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Question</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('admin/exam/option') || request()->is('admin/exam/option/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-hand-pointer"></i>
                                <p>
                                    Option Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('option.index')}}" class="nav-link nav-link {{ request()->is('admin/exam/option') || request()->is('admin/exam/option/*') && !request()->is('admin/exam/option/create')? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>List of Option</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('option.create')}}" class="nav-link {{ request()->is('admin/exam/option/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square"></i>
                                        <p>Create Option</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <form id="logout-form" action="{{Route("logout")}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{Route("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        <i class="fas fa-sign-out-alt"></i>
                        <p class="text">Exit</p>
                    </a>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
