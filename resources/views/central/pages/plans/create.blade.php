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
                        {{ ucwords(str_replace('-', ' ', Request::segment(2)))  }}
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        <span class="@if(Request::segment(3)){{ 'text-indigo-600' }}@endif">
                           {{ ucwords(str_replace('-', ' ', Request::segment(3)))  }}
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
                    {{ ucwords(str_replace('-', ' ', Request::segment(2)))  }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Create plans for your future customers</p>
            </div>


        </div>

        <form action="{{route('central.plans.store')}}" method="POST">
            @csrf
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">




                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name Plan</label>
                                <input required type="text" name="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>

                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm"> $ </span>
                                    </div>
                                    <input  required type="number" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="000">
                                    <div class="absolute inset-y-0 right-0 flex items-center">

                                    </div>
                                </div>


                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="slug" class="block text-sm font-medium text-gray-700">Recurrence</label>
                                <select  name="slug" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                </select>
                            </div>

                            <div class="col-span-12 sm:col-span-13">
                                <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                                <div class="mt-1">
                                    <textarea  name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum volutpat volutpat."></textarea>
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="stripe_id"  class="block text-sm font-medium text-gray-700">Code Stripe*</label>
                                <input required type="text" name="stripe_id" id="stripe_id"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="teams_limit"  class="block text-sm font-medium text-gray-700">Allowed user number*</label>
                                <input required type="number" name="teams_limit" id="teams_limit"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3  bg-gray-50 text-right sm:px-6">
                        <a href="{{route('central.pages.plans.index')}}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300  ">
                            « Back
                        </a>
                        <button type="submit" class="inline-flex items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium leading-5  rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection



