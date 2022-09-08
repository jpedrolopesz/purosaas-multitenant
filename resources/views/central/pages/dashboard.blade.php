@extends('central.layouts.admin')

@section('content')

    <nav class="flex p-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{route('central.dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Central
                </a>
            </li>

        </ol>
    </nav>


            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-fuchsia-50 text-blue-400">

                                <i class='bx bx-wallet nav__dashboard'></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-gray-400">Available Balance</div>
                            @foreach($balance['available'] as $available)
                                <div class="text-2xl font-bold text-gray-900 ">
                                    ${{ number_format( $available['amount'], 1, ",", ".") }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-cyan-50 text-green-400">
                                <i class='bx bx-line-chart nav__dashboard'></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-gray-400">Pending Balance</div>
                            @foreach($balance['pending'] as $pending)
                                <div class="text-2xl font-bold text-gray-900 ">
                                     {{ '$'. number_format( $pending['amount'], 1, ",", "."  ) }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-amber-50 text-red-400">
                                <i class='bx bxs-buildings nav__dashboard'></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-gray-400">Tenants</div>
                            <div class="text-2xl font-bold text-gray-900">{{$tenants}}</div>
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-emerald-50 text-indigo-400">
                                <i class='bx bx-copy-alt nav__dashboard' ></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-gray-400">Plans</div>
                            <div class="text-2xl font-bold text-gray-900">{{$plans}}</div>
                        </div>
                    </div>
                </div>
            </div>

@endsection



