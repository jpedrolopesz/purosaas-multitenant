<section  class="box-border py-8 leading-7 text-gray-900 bg-white border-0 border-gray-200 border-solid sm:py-12 md:py-16 lg:py-24">
    <div class="box-border max-w-6xl px-4 pb-12 mx-auto border-solid sm:px-6 md:px-6 lg:px-4">
        <div class="px-12 mx-auto text-sm max-w-7xl md:text-base">
            <div class="flex flex-col w-full pb-10">
                <h2 class="flex items-center justify-center text-3xl font-semibold md:text-5xl">Simple, Transparent Pricing</h2>
                <p class="block mt-2 text-sm text-center text-gray-500 sm:text-base">Start your 14-day free trial</p>
            </div>

<div class="m-1" x-data="{ card: true }">
    <div class="flex justify-center mb-2">
        <div class="relative flex w-40 p-1 bg-slate-50 rounded">
                <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
                    <span class="absolute inset-0 w-1/2 bg-white rounded border border-slate-200 shadow-sm transform transition duration-150 ease-in-out" :class="card ? 'translate-x-0' : 'translate-x-full'"></span>
                </span>
            <button class="relative flex-1 text-sm font-medium p-1 " @click.prevent="card = true">Monthly</button>
            <button class="relative flex-1 text-sm font-medium p-1" @click.prevent="card = false">Yearly</button>
        </div>
    </div>

    <div class="md:mx-5">
        <!-- Cards Monthly -->
        <div x-show="card">

            <div class="grid gap-5 lg:grid-cols-3 xl:gap-8">
                @foreach($plansMonthly as $plan)
                    <div class="relative flex flex-col h-full px-6 py-8 bg-white border shadow-lg border-gray-400 lg:border-white rounded-3xl bg-opacity-30">
                        <div class="mb-8">
                            <h3 class="block mb-2 text-sm font-medium tracking-widest uppercase">{{$plan->name}}</h3>
                            <h2 class="flex items-center text-5xl leading-none"><span>${{number_format($plan->price /100,2) }}</span><span class="ml-1 text-lg font-normal">/{{$plan->slug}}</span></h2>
                        </div>
                        <nav class="mb-8 space-y-4">
                            @foreach( $plan->details as $detail)
                                <li class="flex items-center">
                        <span class="inline-flex flex-shrink-0 mr-4 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                                    <span class="text-gray-500">{{$detail->name}}</span>
                                </li>
                            @endforeach
                        </nav>
                        <div class="flex flex-col mt-auto">
                            <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white"
                               href="{{route('auth.home-login')}}">Free trial</a>
                            <p class="w-full mt-3 text-xs text-center text-gray-400">Free trial no need to register credit card</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Cards Yearly -->
        <div x-show="!card" x-cloak>

            <div class="grid gap-5 lg:grid-cols-3 xl:gap-8">
                @foreach($plansYearly as $plan)
                    <div class="relative flex flex-col h-full px-6 py-8 bg-white border shadow-lg border-gray-400 lg:border-white rounded-3xl bg-opacity-30">
                        <div class="mb-8">
                            <h3 class="block mb-2 text-sm font-medium tracking-widest uppercase">{{$plan->name}}</h3>
                            <h2 class="flex items-center text-5xl leading-none"><span>${{number_format($plan->price /100,2) }}</span><span class="ml-1 text-lg font-normal">/{{$plan->slug}}</span></h2>
                        </div>
                        <nav class="mb-8 space-y-4">
                            @foreach( $plan->details as $detail)
                                <li class="flex items-center">
                        <span class="inline-flex flex-shrink-0 mr-4 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </span>
                                    <span class="text-gray-500">{{$detail->name}}</span>
                                </li>
                            @endforeach
                        </nav>
                        <div class="flex flex-col mt-auto">
                            <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white"
                               href="{{route('auth.home-login')}}">Free trial</a>
                            <p class="w-full mt-3 text-xs text-center text-gray-400">Free trial no need to register credit card</p>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</div>

<section>
    <div class="px-6 py-3  text-center xl:text-left xl:flex xl:flex-wrap xl:justify-between xl:items-center">
        <div class="text-slate-800 font-semibold mb-2 xl:mb-0">Looking for different configurations?</div>
        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Contact Sales</button>
    </div>
</section>

</div>
        </div>
    </div>
</section>
