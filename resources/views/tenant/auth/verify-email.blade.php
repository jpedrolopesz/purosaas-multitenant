@extends('layouts.guest')


<div class="min-h-full flex items-center bg-gray-50 justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full rounded-md bg-white shadow-md space-y-8 p-5">
        <div>
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-center text-3xl p-5 font-extrabold text-gray-900">Thanks for signing up!</h2>

            <p class="text-md text-gray-500">
                Before you start, click the button to receive a verification email in your inbox.
            </p>
        </div>

        @if (session('status') == 'tenant.verification-link-sent')
            <div x-show="open" x-data="{ open: true }">
                <div class="px-4 py-2 rounded-sm text-sm bg-emerald-100 border border-emerald-200 text-emerald-600">
                    <div class="flex w-full justify-between items-start">
                        <div class="flex">
                            <svg class="w-4 h-4 shrink-0 fill-current opacity-80 mt-[3px] mr-3" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                            </svg>
                            <div>
                                {{ __('Verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        </div>
                        <button class="opacity-70 hover:opacity-80 ml-3 mt-[3px]" @click="open = false">
                            <div class="sr-only">Close</div>
                            <svg class="w-4 h-4 fill-current">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('tenant.verification.send') }}">
                @csrf

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">

          </span>
                        I want to receive verification email
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('tenant.logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>

