@extends('tenant.layouts.app')

@section('content')

    <div  class="flex px-8 mx-auto my-6 max-w-7xl xl:px-5">
        <!-- Navitation-->
        @include('tenant.layouts.account.navigation')
        <!-- Header form -->
        @include('tenant.layouts.account.header-form')
    </div>

@endsection




