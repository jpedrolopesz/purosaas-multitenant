<?php

namespace App\Http\Controllers\Tenant\Account\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices= tenant()->invoices();
        return view('tenant.pages.account.invoice.index',
            compact('invoices'));
    }

    public function show(Request $request, $id)
    {
        return redirect(
            tenant()
            ->findInvoice($id)
            ->asStripeInvoice()
            ->invoice_pdf);
    }
}
