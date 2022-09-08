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
                        {{ ucwords(str_replace('-', ' ', Request::segment(3)))  }}
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        <span class="text-indigo-600">
                            {{$plan->name}}
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
                        {{$plan->name}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Data visualization for end customer.</p>
                </div>

            </div>

            <div >
                <dl>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->name}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Recurrence</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->slug}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Price</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${{number_format($plan->price / 100,2)}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Code Stripe</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->stripe_id}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->description}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Created</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->created_at}}</dd>
                    </div>
                    <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$plan->updated_at}}</dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-3  bg-gray-50 text-right sm:px-6">
                <a href="{{route('central.pages.plans.index')}}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300  ">
                    « Back
                </a>
                <a href="{{route('central.pages.plans.edit', $plan->id)}}" type="submit" class="inline-flex items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium leading-5  rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit »
                </a>

            </div>

        </div>




@endsection
