@php
    $subscribed = tenant()->subscribed('default');
    $color = $subscribed ? 'green' : 'orange';
@endphp

<div x-show="open" x-data="{ open: true }">

<div>
    @if(! tenant()->subscribed('default'))
        {{-- Trial --}}
        @if(tenant()->onGenericTrial())
            <div class="rounded-md bg-orange-50 p-1">
                <div class="flex">
                    <div>
                        <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-800">
                            You're on the free plan until <time datetime="{{ tenant()->trial_ends_at->format('Y-m-d') }}">
                                {{ tenant()->trial_ends_at->format('M d, Y') }}</time>, <strong>but you haven't subscribed to any plan yet</strong>. Please do so now to contine using the application even after your trial ends.
                        </p>
                    </div>
                </div>
            </div>
        @else
            {{-- No subscription --}}
            <div class="rounded-md bg-orange-50 p-1">
                <div class="flex">
                    <div>
                        <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-800">
                            You're on <strong>not subscribed</strong>. If you wish to keep using the application, please choose a subscription plan below.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @else
        @if(tenant()->subscription('default')->onGracePeriod())
            {{-- Grace period --}}
            <div class="rounded-md bg-orange-50 p-1">
                <div class="flex">
                    <div>
                        <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-orange-800">
                            You're on a <strong>grace period</strong> until <time datetime="{{ tenant()->subscription('default')->ends_at->format('Y-m-d') }}">
                                {{ tenant()->subscription('default')->ends_at->format('M d, Y') }}</time>.
                            If you wish to continue using the application after that date, please <strong>resubscribe</strong>.
                        </p>
                    </div>
                </div>
            </div>
        @else
            {{-- Subscribed --}}
            <div class="rounded-md bg-green-50 p-2">
                <div class="flex ml-6 justify-between">
                    <div class=" flex">
                        <div>
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-green-800">
                            You're subscribed to the <strong>{{ tenant()->plan->name }}</strong> plan.
                            @if(tenant()->subscription('default')->onTrial())
                                You're also on trial, until <time datetime="{{ tenant()->subscription('default')->trial_ends_at->format('Y-m-d') }}">{{ tenant()->subscription('default')->trial_ends_at->format('M d, Y') }}</time>.
                                Once it ends, we'll charge you for your plan.
                            @endif
                        </p>
                    </div>
                    <button class="opacity-70 hover:opacity-80 ml-1 mt-[3px]" @click="open = false">
                        <div class="sr-only">Close</div>
                        <svg class="w-4 h-4 fill-current">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    @endif
</div>

</div>
