<div class="flex flex-col w-full bg-white border rounded-lg md:w-4/5 border-gray-150">
    <div class="flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
        <div class="relative p-6">
            <h3 class="flex text-lg font-medium leading-6 text-gray-600">
                <i class='bx bx-user-circle nav__icon'></i>
                @if(isset($section_title)){{ $section_title }}
                @else{{tenant()->user->name}}
                {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') . ' Settings' }}
                @endif
            </h3>
        </div>
    </div>
    @include('components.component-alert')

    <!-- Form General -->
    @yield('account.content')
</div>
