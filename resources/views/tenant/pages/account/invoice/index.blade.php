@extends('tenant.layouts.account.default')

@section('account.content')

    <div class="border-t border-gray-200">
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">

                                @if($invoices = tenant()->invoicesIncludingPending()->all())

                                @foreach ($invoices as $invoice)

                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">Issued on {{ $invoice->date()->toFormattedDateString() }} </span>
                                    <span class="ml-2 flex-1 w-0 truncate"> {{ $invoice->total() }} </span>
                                </div>
                                <div class="flex flex-shrink-0">

                                        @if($invoice->asStripeInvoice()->paid)
                                            <div class="ml-2 flex-shrink-0 flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Paid
                                </span>
                                            </div>
                                        @else
                                            <div class="ml-2 flex-shrink-0 flex items-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                    Pending
                                </span>
                                            </div
                                        @endif

                                    <a href="{{route('tenant.account.invoice', $invoice->id)}}" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs leading-4 font-medium rounded text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
                                        Download
                                    </a>

                                </div>

                            </li>
                            @endforeach
                                @endif
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>

@endsection
