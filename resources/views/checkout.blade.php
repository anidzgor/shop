@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 offset-md-4 offset-sm-3">
        <h1>Checkout</h1>
        <h4>Your total: {{ $total }}</h4>
        <div id="charge-error" class="alert alert-danger" style="display: {{ !Session::has('error') ? 'none' : '' }}">
            {{ Session::get('error') }}
        </div>
        <form action="{{ route('checkout') }}" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" required name="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" required name="address">
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Buy now</button>
        </form>
            {{-- {{ csrf_field() }}
           <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_u0TcAzIsIzlWVXik1oR1Hs6P"
                data-amount="999"
                data-name="Test account"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="gbp">
            </script>
          </form> --}}
    </div>
</div>
@endsection