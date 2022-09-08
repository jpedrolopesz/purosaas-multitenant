@extends('tenant.layouts.account.default')

@section('account.content')



    <div class="flex-1 min-w-0 px-4 py-5 sm:px-6 ">

        <h3 class="text-xl leading-6 font-semibold text-gray-900">
            <img class="h-24 w-24 rounded-full" src="/uploads/avatars/{{$user->avatar}}"width="38" height="38" alt="User" />

        </h3>
    </div>


    <form action="{{route('tenant.account.team.update' , $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">


                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input value="{{$user->name}}" type="text" name="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input value="{{$user->email}}" type="text" name="email" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <label for="recurrence" class="block text-sm font-medium text-gray-700">Recurrence</label>
                            <select name="recurrence" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option></option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="px-4 py-3  bg-gray-50 text-right sm:px-6">
                    <a href="{{route('tenant.account.team.index')}}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300  ">
                        « Back
                    </a>
                    <button type="submit" class="inline-flex items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium leading-5  rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salve
                    </button>
                </div>
            </div>
        </div>
    </form>



@endsection
