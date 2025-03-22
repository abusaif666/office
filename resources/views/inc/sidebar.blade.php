<div class="sidebar_wrapper">
    <div class="sidebar_logo_box"><a class="logo" href="{{ route('home') }}">Dashboard</a></div>
    <div class="sidebar_menu_box">
        <ul class="sidebar_menu">
            <li>
                <a class="{{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="fas fa-home"></i>Dashboard
                </a>
            </li>

            <li class="has-submenu">
                <a class="{{ Request::routeIs('add.ticket') || Request::routeIs('ticket.list') ? 'active' : '' }}" href="#"><i class="fas fa-ticket"></i> Ticket <span class="submenu-toggle"><i class="fa-solid fa-chevron-right"></i></span></a>
                <ul class="submenu">
                    <li><a href="{{ route('add.ticket') }}">Add Ticket</a></li>
                    <li><a href="{{ route('ticket.list') }}">Ticket List</a></li>
                </ul>
            </li>


            <li class="has-submenu">
                <a class="{{ Request::routeIs('add.employee') || Request::routeIs('employee.list') ? 'active' : '' }}" href="#"><i class="fa-solid fa-user-tie"></i> Employees <span class="submenu-toggle"><i class="fa-solid fa-chevron-right"></i></span></a>
                <ul class="submenu">
                    <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                    <li><a href="{{ route('employee.list') }}">Employee List</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <a class="{{ Request::routeIs('add.user') || Request::routeIs('user.list') ? 'active' : '' }}" href="#"><i class="fa-solid fa-users"></i> User <span class="submenu-toggle"><i class="fa-solid fa-chevron-right"></i></span></a>
                <ul class="submenu">
                    <li><a href="{{route('add.user')}}">Add User</a></li>
                    <li><a href="{{route('user.list')}}">User List</a></li>
                </ul>
            </li>

            <!-- Logout -->
            <li> <a href="{{ route('login') }}"><i class="fa-solid fa-right-from-bracket"></i>Logout</a> </li>


        </ul>
    </div>
</div>
