@extends('layouts.account.default')

@section('account.content')


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

            <div class="grid grid-cols-12 gap-6">
                <!-- Tab 1 -->
                @foreach($plansMonthly as $plan)


                    <div class="relative col-span-full xl:col-span-4 bg-white shadow-md rounded-lg border border-gray-150  border-l-8 shadow">
    @if (tenant()->subscribedToPrice($plan->stripe_id, 'default'))
   <div class="absolute top-0 left-0 right-0 h-0.5 bg-emerald-500"></div>
   @endif
   <div class="px-5 pt-5 pb-6 ">
       <header class="flex items-center mb-2">
           <div class="w-6 h-6 rounded-full shrink-0 bg-gradient-to-tr from-emerald-500 to-emerald-300 mr-3">
               <svg class="w-6 h-6 fill-current text-gray" viewBox="0 0 24 24">
                   <path d="M12 17a.833.833 0 01-.833-.833 3.333 3.333 0 00-3.334-3.334.833.833 0 110-1.666 3.333 3.333 0 003.334-3.334.833.833 0 111.666 0 3.333 3.333 0 003.334 3.334.833.833 0 110 1.666 3.333 3.333 0 00-3.334 3.334c0 .46-.373.833-.833.833z" />
               </svg>
           </div>
           <h3 class="text-lg text-slate-800 font-semibold">{{$plan->name}}</h3>
       </header>
       <div class="text-sm mb-2">Ideal for individuals that need a custom solution with custom tools.</div>
       <!-- Price -->
       <div class="text-slate-800 font-bold mb-4">
           <span class="text-3xl">
               ${{number_format($plan->price /100,2) }}</span>
           <span class="text-slate-500 font-medium text-sm">
               /{{$plan->slug}}</span>
       </div>

       <!-- CTA -->
       <div class="">


           @if (tenant()->subscribedToPrice($plan->stripe_id, 'default'))
               @if (!tenant()->subscription( 'default')->cancelled())
                   <form action="{{route('tenant.subscription.store')}}"  method="post">
                       @csrf
                       <button class="btn border-slate-200 bg-slate-100 text-slate-400 w-full cursor-not-allowed flex items-center" >
                           Current Plan</button>
                   </form>
               @endif
               @if (tenant()->subscription('default')->cancelled())
                   <a  href="{{route('tenant.subscription.subscription',$plan->id)}}" type="button" class="bg-indigo-600 py-2 px-3 border rounded-md shadow-md text-sm leading-4 text-white ">
                       Reactivate
                   </a>
               @endif
           @else
               @if (!tenant()->subscription('default'))
                   <a  href="{{route('tenant.subscription.subscription',$plan->id)}}" type="button" class="bg-indigo-600 py-2 px-3 border rounded-md shadow-md text-sm leading-4 text-white ">
                       Subscription
                   </a>
               @endif
               @if(tenant()->subscription('default'))
                       <a  href="{{route('tenant.subscription.subscription',$plan->id)}}" type="button" class="btn bg-indigo-500 hover:bg-indigo-600 text-white w-full ">
                   Update Plan
               </a>
                   @endif
           @endif
       </div>
   </div>
   <div class="flex items-center px-5 ">
       <h4 class="flex-shrink-0 pr-4 bg-white text-xs leading-5 tracking-wider font-semibold uppercase text-purple-700">
           What&#x27;s included
       </h4>
       <div class="flex-1 border-t-2 border-gray-200">
       </div>
   </div>
   <div class="px-5 pt-4 pb-5">
       <!-- List -->
       <ul>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Lorem ipsum dolor sit amet</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Quis nostrud exercitation</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Lorem ipsum dolor sit amet</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Quis nostrud exercitation</div>
           </li>
       </ul>
   </div>
</div>
@endforeach
</div>

</div>

<!-- Cards Yearly -->
<div x-show="!card" x-cloak>

<div class="grid grid-cols-12 gap-6">
@foreach($plansYearly as $plan)


<div class="relative col-span-full xl:col-span-4 bg-white shadow-md rounded-lg border border-gray-150  border-l-8 shadow">
   <div class="absolute top-0 left-0 right-0 h-0.5 bg-emerald-500"></div>
   <div class="px-5 pt-5 pb-6 ">
       <header class="flex items-center mb-2">
           <div class="w-6 h-6 rounded-full shrink-0 bg-gradient-to-tr from-emerald-500 to-emerald-300 mr-3">
               <svg class="w-6 h-6 fill-current text-gray" viewBox="0 0 24 24">
                   <path d="M12 17a.833.833 0 01-.833-.833 3.333 3.333 0 00-3.334-3.334.833.833 0 110-1.666 3.333 3.333 0 003.334-3.334.833.833 0 111.666 0 3.333 3.333 0 003.334 3.334.833.833 0 110 1.666 3.333 3.333 0 00-3.334 3.334c0 .46-.373.833-.833.833z" />
               </svg>
           </div>
           <h3 class="text-lg text-slate-800 font-semibold">{{$plan->name}}</h3>
       </header>
       <div class="text-sm mb-2">Ideal for individuals that need a custom solution with custom tools.</div>
       <!-- Price -->
       <div class="text-slate-800 font-bold mb-4">
           <span class="text-3xl">
               ${{number_format($plan->price /100,2) }}</span>
           <span class="text-slate-500 font-medium text-sm">
               /{{$plan->slug}}</span>
       </div>


       <!-- CTA -->
       <div class="">
           @if ('')
           @else
               <a  href="{{route('tenant.subscription.subscription',$plan->id, )}}" type="button" class="bg-indigo-600  bg-white py-2 px-3 border rounded-md shadow-md text-sm leading-4 text-white  ">
                   Subscribe
               </a>
           @endif
       </div>

   </div>
   <div class="flex items-center px-5 ">
       <h4 class="flex-shrink-0 pr-4 bg-white text-xs leading-5 tracking-wider font-semibold uppercase text-purple-700">
           What&#x27;s included
       </h4>
       <div class="flex-1 border-t-2 border-gray-200">
       </div>
   </div>
   <div class="px-5 pt-4 pb-5">
       <!-- List -->
       <ul>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Lorem ipsum dolor sit amet</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Quis nostrud exercitation</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Lorem ipsum dolor sit amet</div>
           </li>
           <li class="flex items-center py-1">
               <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                   <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
               </svg>
               <div class="text-sm">Quis nostrud exercitation</div>
           </li>
       </ul>
   </div>
</div>
@endforeach
</div>


</div>
</div>
</div>

    <section>
        <div class="px-6 py-3  text-center xl:text-left xl:flex xl:flex-wrap xl:justify-between xl:items-center">
            <div class="text-slate-800 font-semibold mb-2 xl:mb-0">Looking for different configurations?</div>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Contact Sales</button>
        </div>
    </section>

@endsection

