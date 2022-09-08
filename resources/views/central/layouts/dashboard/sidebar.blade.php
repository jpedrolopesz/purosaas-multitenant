
<div class="sidebar">
    <div class="logo_class">
        <div class="logo ml-6">
            <div class="logo_name mr-24">{{Auth::guard('admin')->user()->company}}</div>
        </div>

        <i class="nav_icon bx bx-menu" id="menu"></i>
    </div>

    <!-- Search Button -->
    <ul class="nav-list">
        <!-- Dashboard Button -->
        <li>
            <a href="{{route('central.dashboard')}}">
                <i class="nav__icon bx bx-grid-alt @if(Request::is('central')){{ 'text-indigo-500' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
                <span class="links_name  font-semibold @if(Request::is('central')){{ 'text-purple-500' }}@else{{ 'text-gray-700' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">
                    Central</span>
            </a>
            <span class="tooltip">Central</span>
        </li>


        <!-- Create Plans Button-->

        <li style="list-style: none">
            <a href="{{route('central.pages.plans.index')}}">

                <i class="nav__icon bx bx-copy-alt @if(Request::is('central/plan')){{ 'text-indigo-500' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
                <span class="links_name font-semibold @if(Request::is('central/plan')){{ 'text-indigo-600' }}@else{{ 'text-gray-700' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Create Plans</span>
            </a>
            <span class="tooltip">Create Plans</span>
        </li>



        <!-- Setting -->

        <li style="list-style: none">
            <a href="{{route('central.account.company.index')}}">
                <i class="nav_icon bx bxs-cog @if(Request::is('central/account/company')){{ 'text-indigo-500' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
                <span class="links_name font-semibold @if(Request::is('central/account/company')){{ 'text-indigo-600' }}@else{{ 'text-gray-700' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
    </ul>

    <!-- Profile Content -->
    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="/uploads/avatars/{{Auth::guard('admin')->user()->avatar}}" alt="user" />
                <div class="name_job">
                    <div class="name">{{Auth::guard('admin')->user()->name}}</div>
                    <div class="job">{{Auth::guard('admin')->user()->company}}</div>
                </div>
            </div>
            <!-- Logo Button -->

                <a href="{{ route('central.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class=" bx bx-log-out " id="log_out"></i>
                </a>
                <form id="logout-form" action="{{ route('central.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


        </div>
    </div>
</div>


