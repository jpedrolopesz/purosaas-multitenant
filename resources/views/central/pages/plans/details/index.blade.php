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
                        @if(isset($section_title)){{ $section_title }}@else{{ ucwords(str_replace('-', ' ', Request::segment(2)))  }}@endif
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{route('central.pages.plans.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        {{$plans->name}}
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{route('central.pages.plans.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        <span class="@if(Request::segment(4)){{ 'text-indigo-600' }}@endif">
                           {{ ucwords(str_replace('-', ' ', Request::segment(4)))  }}
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
                   Details {{$plans->name}}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Create plans for your future customers.</p>
            </div>

            <div class="mt-5 flex lg:mt-0 lg:ml-4  px-4 py-5 sm:px-6">

                <a href="{{route('central.pages.plans.index')}}" class=" mr-3 relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300  ">
                    « Back
                </a>
                <a href="{{route('central.pages.plans.details.create' , $plans->id)}}" class="inline-flex  items-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-3 mr-1 h-3 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    Create Details
                </a>
            </div>


        </div>

        <div class="px-2 py-3 sm:px-3">
            <div class=" relative overflow-x-auto shadow-md md:rounded-md">
                <table class="table-auto w-full  text-sm text-left text-gray-500 ">
                    <thead class="w-full text-sm bg-gray-50 text-left text-gray-500 uppercase text-slate-500 bg-slate-50  border-b border-slate-200">
                    <tr>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Details</div>
                        </th>
                        <th class="px-2 first:pl-5  last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Actions</div>
                        </th>
                    </tr>
                    </thead>
                    @foreach( $details as $detail)
                        <tbody class="text-sm border-b divide-y divide-slate-200">
                        <tr>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-sky-500">{{$detail->name}}</div>
                            </td>

                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="space-x-4 flex flex-row">

                                    <a href="{{route('central.pages.plans.details.edit',[ $plans->id, $detail->id])}}" class="font-medium text-blue-600  hover:underline">
                                        <i class=' table__icon bx bxs-edit'></i>
                                    </a>
                                    <div>
                                <form action="{{ route('central.details.destroy',[ $plans->id, $detail->id]) }}" method="POST" class="text-red-500 hover:text-rose-600 rounded-full">
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
            {!! $details->links()!!}
        </div>
    </div>
@endsection
