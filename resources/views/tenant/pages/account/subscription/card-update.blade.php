@extends('tenant.layouts.account.default')

@section('account.content')


        <div class="lg:relative lg:flex">
            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                <div class="space-y-2">
                    <label class="relative block cursor-pointer text-left w-full">
                        <input type="radio" name="radio-buttons" class="peer sr-only" checked />
                        <div class="p-4 rounded border border-slate-200 hover:border-slate-300 shadow-sm duration-150 ease-in-out">
                            <div class="grid grid-cols-12 items-center gap-x-2">
                                <!-- Card -->
                                <div class="col-span-6 order-1 sm:order-none sm:col-span-3 flex items-center space-x-4 lg:sidebar-expanded:col-span-6 xl:sidebar-expanded:col-span-3">
                                    <div>
                                        @if(tenant()->hasDefaultPaymentMethod())

                                        <div class="text-sm font-medium text-slate-800">{{ ucfirst(tenant()->defaultPaymentMethod()->asStripePaymentMethod()->card->brand) }}
                                             **{{ tenant()->defaultPaymentMethod()->asStripePaymentMethod()->card->last4 }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-span-6 order-2 sm:order-none sm:col-span-3 text-left sm:text-center lg:sidebar-expanded:hidden xl:sidebar-expanded:block">
                                    <div class="text-sm font-medium text-slate-800 truncate">{{tenant('created_at')}}</div>
                                </div>
                                <div class="col-span-6 order-2 sm:order-none sm:col-span-3 text-left sm:text-center lg:sidebar-expanded:hidden xl:sidebar-expanded:block">
                                    <div class="text-sm font-medium text-slate-800 truncate">{{tenant('name')}}</div>
                                </div>

                                <div class="col-span-6 order-2 sm:order-none sm:col-span-2 text-right lg:sidebar-expanded:hidden xl:sidebar-expanded:block">
                                    <div class="text-xs inline-flex font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-1">Active</div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-0 border-2 border-transparent peer-checked:border-indigo-400 rounded pointer-events-none" aria-hidden="true"></div>
                    </label>

                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="lg:sticky lg:top-16 bg-slate-50 no-scrollbar lg:shrink-0 border-t lg:border-t-0 lg:border-l border-slate-200 lg:w-[390px] lg:h-[calc(80vh-64px)]">
                    <div class="py-4 px-4 lg:px-8">
                        <div class="max-w-sm mx-auto lg:max-w-none">


                                <form action="{{route('tenant.account.card-update')}}" method="post" id="card-form">
                                    @csrf
                                    <!-- Card form -->
                                    <div class="space-y-4">
                                        <!-- Name on Card -->
                                        <div>
                                            <label for="card-holder-name" class="block text-sm text-slate-500 font-medium">Update Card <span class="text-rose-500">*</span></label>
                                            <input type="text" id="card-holder-name" name="name" class="appearance-none block w-full px-3 py-2 border border-gray-100 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"  placeholder="John Doe" />
                                        </div>

                                        <!-- Card Number -->
                                        <label class="block text-sm text-slate-500 font-medium" for="card-name">Card Number<span class="text-rose-500">*</span></label>
                                        <div class="border border-gray-100 shadow-md"  id="card-element"></div>

                                        <input type="hidden" name="plan" value="{{request('plan')}}"/>

                                        <button id="card-button" data-secret="{{$intent->client_secret}}" type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Update</button>

                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--include('sweetalert::alert') -->

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

@endsection
<style>
    .StripeElement {
        background-color: white;
        padding: 10px 12px;
        border-radius: 4px;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

