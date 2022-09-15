@extends('central.layouts.account.default')

@section('account.content')


    <div class="mt-5 md:mt-0 md:col-span-2 ">
    <form enctype="multipart/form-data" action="{{route('central.account.company.store')}}" method="POST">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden ">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6 dark:bg-dark-eval-1">

                <!-- Logo Company -->
                <div>
                    <label  class="block text-sm dark:text-white font-medium text-gray-700"> Logo </label>
                    <div class="mt-1 flex items-center">
                             <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                                 <img class="h-full w-full rounded-full" src="/uploads/avatars/{{Auth::guard('admin')->user()->logo}}"width="38" height="38" alt="User" />
                             </span>
                        <label class="ml-5 inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs leading-4 font-medium rounded text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">

                            <input type="file"  name="logo" style="display: none" >Upload</input>
                        </label>
                        </div>
                    <p class="mt-2 text-sm dark:text-white text-gray-500">Logo dimension 80x80</p>
                </div>

                    <!-- Name Company -->
                    <div class="form__input {{$errors->has('company') ? 'has-error' : ''}}" >
                        <label for="name" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Name Company</label>
                        <div class="mt-1 rounded-md shadow-sm " >
                            <input id="company" type="text" name="company" placeholder="Name Company" value="{{old('company', Auth::guard('admin')->user()->company)}}" required
                                   class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1"  >
                        </div>
                    </div>

                @if ($errors->has('company'))
                    <span class="help-block">
                        <strong>{{$errors->first('company')}}</strong>
                    </span>
                 @endif

                <!-- Button -->
                <div class="flex flex-col">
                    <div class="flex self-end">
                        <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 text-white ml-3">Save Changes</button>
                    </div>
                </div>

            </div>

        </div>
    </form>
    </div>
@endsection


