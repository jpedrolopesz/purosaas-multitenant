<div class="w-16 mr-6 md:w-1/5">

    <div class="relative flex flex-col items-start justify-center w-full py-6 bg-white border rounded-lg border-gray-150">
        <h3 class="hidden px-6 pb-3 text-xs font-semibold leading-4 tracking-wider text-gray-500 uppercase md:block">Settings</h3>

        <!-- Company -->
        <a href="{{route('central.account.company.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i class="bx bx-building-house nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('central/account/company')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('central/account/company')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Company</span>
        </a>

        <!-- Profile -->
        <a href="{{route('central.account.profile.index')}}"
            class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i  class="bx bx-user nav__icon  flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('central/account/profile')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('central/account/profile')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Profile</span>
        </a>

        <!-- Password -->
        <a href="{{route('central.account.password.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
             <i class="bx bx-lock-open-alt nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('central/account/password')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('central/account/password')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Reset Password</span>
        </a>


    </div>



</div>







