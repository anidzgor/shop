@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge badge-warning badge-pill pull-right">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="badge badge-success">{{ $product['price'] }}</span>
                            <div class="btn-group" role="group">
                                <button class="btn btn-info dropdown-toggle ml-2" type="button" data-toggle="dropdown">Action<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                    <li><a class="dropdown-item" href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3">
                    <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
                </div>
            </div>
    @else
    <div class="row">
            <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3">
                <h2>No items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection