@extends('tenant.layouts.account.default')

@section('account.content')

    <div class="mt-5 md:mt-0 md:col-span-2 ">
    <form enctype="multipart/form-data" action="{{route('tenant.account.profile.store')}}" method="POST">
        @csrf
            <div class="px-4 py-5  space-y-6 sm:p-6 ">

                <!-- Photo -->
                <div>
                    <label  class="block text-sm dark:text-white font-medium text-gray-700"> Photo </label>
                    <div class="mt-1 flex items-center">
                             <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                                 <img class="h-full w-full rounded-full" src="/uploads/avatars/{{Auth::user()->avatar}}"width="38" height="38" alt="User" />
                             </span>
                        <label class="ml-5 inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs leading-4 font-medium rounded text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">

                            <input type="file"  name="avatar" style="display: none" >Upload</input>
                        </label>
                        </div>
                </div>

                <!-- Email -->
                <div class="form__input {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Email Address</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email" type="text" name="email" placeholder="Email Address" value="{{old('email', Auth::user()->email)}}" required
                               class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1">
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                    @endif
                    <!-- Name -->
                    <div class="form__input {{$errors->has('name') ? 'has-error' : ''}}" >
                        <label for="name" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Name</label>
                        <div class="mt-1 rounded-md shadow-sm " >
                            <input id="name" type="text" name="name" placeholder="Name" value="{{old('name', Auth::user()->name)}}" required
                                   class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1"  >
                        </div>
                    </div>
                </div>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                 @endif

                <!-- Button -->
                <div class="flex flex-col">
                    <div class="flex self-end">
                        <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 text-white ml-3">Save Changes</button>
                    </div>
                </div>

            </div>
    </form>
    </div>
@endsection


