@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 offset-md-4 offset-sm-3">
        <h1>Checkout</h1>
        <h4>Your total: {{ $total }}</h4>
    </div>
</div>
@endsection
