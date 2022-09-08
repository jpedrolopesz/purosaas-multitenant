@extends('central.layouts.account.default')

    @section('account.content')

    <form enctype="multipart/form-data" action="{{route('central.account.password.store')}}" method="POST">
        @csrf
        <div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6 dark:bg-dark-eval-1">

                <!-- Current Password -->
                <div class="form__input-group {{$errors->has('password_current') ? 'has-error' : ''}}">
                    <label for="password_current" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Current password</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_current" type="password" name="password_current" placeholder="Current password" required
                               class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1">
                    </div>

                    @if ($errors->has('password_current'))
                        <span class="help-block">
                            <strong>{{$errors->first('password_current')}}</strong>
                        </span>
                @endif

                </div>

                <!-- New Password -->
                <div class="form__input-group {{$errors->has('password') ? 'has-error' : ''}}">
                    <label for="password" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">New Password</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" type="password" name="password" placeholder=" New password" required
                               class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1">
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{$errors->first('password')}}</strong>
                        </span>
                @endif

                </div>

                <!-- Confirmation Password -->
                <div class="form__input-group {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
                    <label for="password_confirmation" class="block text-sm dark:text-white font-medium leading-5 text-gray-700">Confirmation Password Again</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmation password" required
                               class="shadow-sm w-full focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-100 rounded-md dark:bg-dark-eval-1">
                    </div>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{$errors->first('password_confirmation')}}</strong>
                        </span>
                @endif

                </div>

                <!-- Button -->
                <div class="flex flex-col">
                    <div class="flex self-end">
                        <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 text-white ml-3">Save Changes</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection


