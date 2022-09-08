@extends('layouts.guest')
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Create your new password</h2>

        </div>
        <form class="mt-8 space-y-6" action="{{ route('tenant.password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="-space-y-px">

                <!-- Email address -->
                <div class="mt-6">
                    <label for="email-address" class="sr-only">Email address</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input placeholder="Email address" id="email-address" name="email" type="email" value="{{ old('email-address', '') }}" autocomplete="email" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        @error('email-address')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <label for="password" class="sr-only">Password</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input placeholder="New password" id="password" type="password" name="password" required autocomplete="new-password"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-6">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input placeholder="Confirm password" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>



            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>

