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
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{route('central.pages.plans.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                    <span class="@if(Request::segment(2)){{ 'text-indigo-600' }}@endif">
                           {{ ucwords(str_replace('-', ' ', Request::segment(2)))  }}
                        </span>
                    </a>
                </div>
            </li>


        </ol>
    </nav>


    <div class="flex flex-col w-full bg-white border rounded-lg md:w-5/5 border-gray-150">

        <div class="flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
            <div class="flex-1 min-w-0 px-4 py-5 sm:px-6 ">
                <h3 class="text-xl leading-6 font-semibold text-gray-900">
                    {{ ucwords(str_replace('-', ' ', Request::segment(1)))  }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Create plans for your future customers.</p>
            </div>

            <div class="mt-5 flex lg:mt-0 lg:ml-4  px-4 py-5 sm:px-6">

                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Search form -->
                    <form action="{{route('central.plans.search')}}" class="flex items-center mr-3" method="POST">
                        @csrf

                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" name="filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        </div>
                        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                    </form>
                </div>

                <a href="{{route('central.pages.plans.create')}}" class="inline-flex  items-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-3 mr-1 h-3 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    Create Plan
                </a>
            </div>


        </div>
        @include('components.component-alert')

        <div class="px-2 py-3 sm:px-3">
        <div class=" relative overflow-x-auto shadow-md md:rounded-md">
            <table class="table-auto w-full  text-sm text-left text-gray-500 ">
                <thead class="w-full text-sm bg-gray-50 text-left text-gray-500 uppercase text-slate-500 bg-slate-50  border-b border-slate-200">
                <tr>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Name</div>
                    </th>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Recurrence</div>
                    </th>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Price</div>
                    </th>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Created</div>
                    </th>
                    <th class="px-2 first:pl-5  last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-left">Actions</div>
                    </th>
                </tr>
                </thead>
                @foreach( $plans as $plan)
                <tbody class="text-sm border-b divide-y divide-slate-200">
                <tr>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-medium text-sky-500">{{$plan->name}}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-medium text-slate-800">{{$plan->slug}}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-medium text-rose-500"> ${{number_format($plan->price /100,2) }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div>{{$plan->created_at}}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                        <div class="space-x-4 flex flex-row">

                       <a href="{{route('central.pages.plans.details.index', $plan->id)}}" class="font-medium text-blue-600 hover:underline">
                            Details
                        </a>

                        <a href="{{route('central.pages.plans.edit', $plan->id)}}" class="font-medium text-blue-600  hover:underline">
                            <i class=' table__icon bx bxs-edit'></i>
                        </a>

                        <a href="{{route('central.pages.plans.view', $plan->id)}}" class="text-rose-500 hover:text-rose-600 rounded-full">
                            <i class='bx bx-show-alt table__icon'></i>
                        </a>

                    <div>
                        <form action="{{ route('central.plans.destroy', $plan->id) }}" method="POST" class="text-red-500 hover:text-rose-600 rounded-full">
                            @csrf
                            @method('DELETE')
                            <button>
                                <i class='bx bx-trash-alt table__icon'></i>
                            </button>
                        </form>
                    </div>
                        </div>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
            {!! $plans->links()!!}
        </div>
    </div>
@endsection
