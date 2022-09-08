@extends('tenant.layouts.account.default')

@section('account.content')



            <div class="flex-1 min-w-0 px-4 py-5 sm:px-6 ">

                <h3 class="text-xl leading-6 font-semibold text-gray-900">
                    <img class="h-24 w-24 rounded-full" src="/uploads/avatars/{{$user->avatar}}"width="38" height="38" alt="User" />

                </h3>
            </div>


        <div >
            <dl>
                <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->name}}</dd>
                </div>
                <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->email}}</dd>
                </div>
                <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Created</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->created_at}}</dd>
                </div>
                <div class="bg-white border-b border-gray-100 px-3 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Updated</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user->updated_at}}</dd>
                </div>
            </dl>
        </div>
        <div class="px-4 py-3  bg-gray-50 text-right sm:px-6">
            <a href="{{route('tenant.account.team.index')}}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300  ">
                « Back
            </a>
        </div>


@endsection
