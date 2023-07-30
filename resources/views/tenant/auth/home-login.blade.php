@extends('tenant.layouts.guest')
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>

            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>

        </div>
        <form class="mt-8 space-y-6" action="{{ route('auth.home-login') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px">

                <!-- Login Domain-->
                <div class="mt-6">
                    <label for="domain" class="sr-only">Domain</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input placeholder="Domain" id="domain" name="domain" type="domain" value="{{ old('domain', '') }}" autocomplete="domain" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        <span class="flex items-center px-3 rounded-r-md border-t border-b border-r border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            <span>
                                .{{ config('tenancy.central_domains')[0] }}
                            </span>
                        </span>
                    </div>
                    @error('domain')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                </div>

                <div class="text-sm">
                    Don’t you have an account?
                    <a href="{{route('auth.register')}}" class="font-medium text-indigo-600 hover:text-indigo-500"> Sign Up </a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
                    Sign in
                </button>
            </div>
        </form>


    </div>
</div>

