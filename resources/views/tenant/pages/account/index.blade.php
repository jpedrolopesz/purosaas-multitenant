@extends('tenant.layouts.account.default')

@section('account.content')
    <div> <a href="{{tenant()->billingPortalUrl(route('tenant.account.index')) }}">
            No Click Here</a></div>

@endsection



