@extends('layouts.guest')

<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16 -mb-px">

<a class="block rounded-full bg-slate-100 text-slate-500 hover:text-slate-600"
   href="{{route('tenant.account.plans.index')}}">
    <span class="sr-only">Back</span>
    <svg width="32" height="32" viewBox="0 0 32 32">
        <path class="fill-current" d="M15.95 14.536l4.242-4.243a1 1 0 111.415 1.414l-4.243 4.243 4.243 4.242a1 1 0 11-1.415 1.415l-4.242-4.243-4.243 4.243a1 1 0 01-1.414-1.415l4.243-4.242-4.243-4.243a1 1 0 011.414-1.414l4.243 4.243z" />
    </svg>
</a>
    </div>
</div>

<div class="checkout max-h-full bg-white rounded-2xl md:items-center md:mx-20 mt-14 mb-14">
    <div class="panel max-h-full flex flex-col rounded-2xl  rounded-md md:flex-row mb-8 shadow-2xl ">
        <div class="panel-left w-full md:w-2/3 bg-white rounded-l">
            <div class="max-w-sm mx-auto px-4 py-8">
                <!-- Form -->

                <div>
                    <h2 class="mb-12 text-center text-3xl font-bold text-gray-900">Checkout</h2>
                </div>

                <main>
                    <form action="{{ route('tenant.subscription.process', $plan->id )}}" method="post" id="card-form">
                        @csrf


                            <!-- Card form -->
                                <div class="space-y-4">

                                    <input type="hidden" name="billing_plan_id" value="{{ $plan->id }}" />
                                    <input type="hidden" name="payment-method" id="payment-method"  value="" />
                                    <!-- Name on Card -->
                                    <div>
                                        <label class="block text-sm text-slate-500 font-medium mb-3" for="card-name">Name on Card<span class="text-rose-500">*</span></label>
                                        <input type="text" id="card-holder-name" name="card-holder-name" class="appearance-none block w-full px-3 py-2 border border-gray-100 shadow-md rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="John Doe" />
                                    </div>

                                    <!-- Card Number -->
                                    <label class="block text-sm text-slate-500 font-medium" for="card-name">Card Number<span class="text-rose-500">*</span></label>
                                    <div class="border border-gray-100 shadow-md" id="card-element"></div>

                                    <input type="hidden" name="plan" value="{{request('plan')}}"/>

                                </div>
                                <!-- Form footer -->
                                <div class="mt-6">
                                    <div class="mb-4">
                                        <button id="card-button" data-secret="{{$intent->client_secret}}" type="submit"
                                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white  bg-gradient-to-tr from-indigo-500 to-indigo-400  rounded-md hover:bg-indigo-500  focus:ring-indigo active:bg-indigo-900 transition duration-150 ease-in-out">Pay ${{number_format($plan->price / 100,2)}}</button>
                                    </div>
                                    <div class="text-xs text-slate-500 italic text-center">This is a secure checkout, your payment details don't touch our servers.</div>
                                </div>


                    </form>
                </main>
                </div>
            </div>

            <!-- end panel-left -->

        <div class="panel-right rounded-2xl mt-2 mb-2 mr-2 w-full md:w-1/3 shrink-0  bg-gradient-to-tr from-indigo-500 to-indigo-400 text-white rounded-md">
            <div class="p-10">
                <h2 class="font-bold text-xl mb-4">{{$plan->name}}</h2>
                <div class="mb-4">
                    <span class="text-2xl align-top">$</span>
                    <span class="text-4xl align-top">{{number_format($plan->price / 100,2)}}</span>
                    <span class="text-lg">/ {{$plan->slug}}</span>
                </div>
                <div class="italic w-3/4 leading-normal mb-8">
                    Automatically renews after 1 {{$plan->slug}}
                </div>
                <ul>
                    @foreach( $plan->details as $detail)
                    <li class="flex items-center py-1">
                        <svg class=" w-4 h-4 shrink-0 fill-current text-white mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm">{{$detail->name}}</div>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div> <!-- end panel -->

</div> <!-- end checkout -->

    <script src="https://js.stripe.com/v3/"></script>
    <script>

        const stripe = Stripe('{{ config('cashier.key') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('card-form')
        const cardButton = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardButton.disabled = true

            const {setupIntent, error} = await stripe.confirmCardSetup(
                cardButton.dataset.secret, {
                  payment_method: {
                      card: cardElement,
                      billing_details: {
                          name: cardHolderName.value
                      }
                  }
                }
            )
            if (error) {
                cardButton.disabled = false
            }else{
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)
                form.submit()
            }
        })
    </script>

<style>
    .StripeElement {
        background-color: white;
        padding: 10px 12px;
        border-radius: 4px;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>


