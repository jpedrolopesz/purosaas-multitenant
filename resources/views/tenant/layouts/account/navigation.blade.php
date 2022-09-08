<div class="w-16 -ml-8 mr-6 md:w-1/5">

    <div class="relative flex flex-col items-start justify-center w-full py-6 bg-white border rounded-lg border-gray-150">
        <h3 class="hidden px-6 pb-3 text-xs font-semibold leading-4 tracking-wider text-gray-500 uppercase md:block">Settings</h3>

        @if(Auth::user()->is_admin)

        <!-- Company -->
        <a href="{{route('tenant.account.company.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i class="bx bx-building-house nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/company')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/company')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Company</span>
        </a>

        <!-- Team -->
        <div x-data="{ show: false }" class="relative  w-full items-center overflow-hidden select-none">
            <div @click="show=!show" class="block relative w-full flex items-center px-6 py-3 md:py-1 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">

                <i class="bx bx-vector nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 text-gray-400  transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
                <span class="hidden truncate md:inline-block text-gray-600 transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Manage Team</span>
                <i class='bx bx-chevron-down nav__icon flex-shrink-0 font-medium -m-3 md:m-2 text-gray-400' :class="{ '-rotate-180' : show }"></i>

            </div>
             <ul class="md:mx-4 ml:3" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="" >
                 <li>
                    <a href="{{route('tenant.account.team.index')}}"
                       class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">

                        <i class="bx bxs-group nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/team')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
                        <span class="hidden truncate md:inline-block @if(Request::is('account/team')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Team</span>
                    </a>
                </li>
            </ul>
        </div>
         @endif

        <!-- Profile -->
        <a href="{{route('tenant.account.profile.index')}}"
            class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i  class="bx bx-user nav__icon  flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/profile')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/profile')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Profile</span>
        </a>

        <!-- Password -->
        <a href="{{route('tenant.account.password.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
             <i class="bx bx-lock-open-alt nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/password')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/password')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Reset Password</span>
        </a>

    </div>

   @if(Auth::user()->is_admin)

    <div class="relative flex flex-col items-start justify-center w-full py-6 mt-6 bg-white border rounded-lg border-gray-150">
        <h3 class="hidden px-6 pb-3 text-xs font-semibold leading-4 tracking-wider text-gray-500 uppercase md:block">Billing</h3>

        <!-- Plans Details -->
        <a href="{{route('tenant.account.plans.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i class="bx bx-shopping-bag nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/plans')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/plans')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Plans</span>
        </a>

        @if (tenant()->subscribed())
            <!-- Subscription Card Update -->
        <a href="{{ route('tenant.account.subscription.card-update') }}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i class="bx bx-credit-card nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/card-update')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/card-update')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Card Update</span>
        </a>

        <!-- Invoice Details -->
        <a href="{{route('tenant.account.invoice.index')}}"
           class="block relative w-full flex items-center px-6 py-3 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md group hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50">
            <i class="bx bx-file nav__icon flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('account/invoice')){{ 'text-indigo-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500"></i>
            <span class="hidden truncate md:inline-block @if(Request::is('account/invoice')){{ 'text-indigo-600' }}@else{{ 'text-gray-600' }}@endif transition duration-150 ease-in-out group-hover:text-indigo-500 group-focus:text-gray-500">Invoices</span>
        </a>
            @endif


    </div>

    @endif

</div>






