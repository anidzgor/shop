@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center">User Profile</h1>
            <hr>
            <h2>My orders</h2>
            @foreach($orders as $order)
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)
                        <li class="list-group-item">
                            <span class="badge">$ {{ $item['price'] }}</span>
                            {{ $item['item']['title'] }} | {{ $item['qty']}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <strong>Total Price: {{ $order->cart->totalPrice }}</strong>
                </div>
            </div>
            @endforeach   
        </div>
    </div>
@endsection

@section('sidebar')
@endsection