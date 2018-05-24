@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 offset-md-4 offset-sm-3">
        <h1 class="text-center">Checkout</h1>
        <hr style="width: 50%">
        <h4>Your total: {{ $total }}</h4>
        <div id="charge-error" class="alert alert-danger" style="display: {{ !Session::has('error') ? 'none' : '' }}">
            {{ Session::get('error') }}
        </div>
        <form action="{{ route('checkout') }}" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" required >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" name="address" required>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
    </div>
</div>
@endsection