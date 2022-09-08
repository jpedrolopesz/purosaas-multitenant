
<div class="sidebar">
    <div class="logo_class">
        <div class="logo ml-6">

            <div class="logo_name">{{tenant('company')}}</div>
        </div>

        <i class="nav_icon bx bx-menu" id="menu"></i>
    </div>

    <!-- Search Button -->
    <ul class="nav-list">

        <!-- Dashboard Button -->
        <li>
            <a href="{{route('tenant.dashboard.dashboard')}}">
                <i class="nav__icon bx bx-grid-alt"></i>
                <span class="links_name font-semibold">Dashboard</span>
            </a>
            <span class="tooltip">Dashborad</span>
        </li>

        <!-- User Button-->

        <li style="list-style: none">
            <a href="#">
                <i class="nav__icon bx bx-user"></i>
                <span class="links_name font-semibold">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>

        <!-- Message Button -->

        <li style="list-style: none">
            <a href="#">
                <i class=" nav__icon bx bxs-chat"></i>
                <span class="links_name font-semibold">Message</span>
            </a>
            <span class="tooltip">Message</span>
        </li>

        <!-- Analytic Button-->

        <li style="list-style: none">
            <a href="#">
                <i class="nav__icon bx bxs-pie-chart-alt-2"></i>
                <span class="links_name font-semibold">Analytic</span>
            </a>
            <span class="tooltip">Analytic</span>
        </li>

        <!-- File Manager  -->

        <li style="list-style: none">
            <a href="#">
                <i class="nav__icon bx bx-folder"></i>
                <span class="links_name font-semibold">File Manager</span>
            </a>
            <span class="tooltip">File Manager</span>
        </li>

        <!-- Order  -->
        <li style="list-style: none">
            <a href="#">
                <i class="nav__icon bx bx-cart"></i>
                <span class="links_name font-semibold">Order</span>
            </a>
            <span class="tooltip">Order</span>
        </li>

        <!-- Saved -->

        <li style="list-style: none">
            <a href="#">
                <i class="nav_icon bx bxs-heart"></i>
                <span class="links_name font-semibold">Saved</span>
            </a>
            <span class="tooltip">Saved</span>
        </li>

        <!-- Setting -->

        <li style="list-style: none">
            <a href="#">
                <i class="nav_icon bx bxs-cog"></i>
                <span class="links_name font-semibold">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
    </ul>

    <!-- Profile Content -->
    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="user" />
                <div class="name_job">
                    <div class="name">{{Auth::user()->name}}</div>
                    <div class="job">{{tenant('company')}}</div>
                </div>
            </div>
            <!-- Logo Button -->
            <i class="nav_icon bx bx-log-out" id="log_out"></i>
        </div>
    </div>
</div>


