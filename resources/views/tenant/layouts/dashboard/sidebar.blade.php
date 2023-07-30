
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


