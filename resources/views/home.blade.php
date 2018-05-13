@extends('layouts.app')

@section('content')

{{-- Products --}}
<h1 class="text-center mt-5">Products</h1>
<hr>
<div class="row justify-content-center">
    <div class="col"></div>

    <div class="col-8 card">
        <div class="row justify-content-center mt-5 mb-5">
                <button type="button" class="btn btn-outline-primary active">All products</button>
                <button type="button" class="btn btn-outline-primary">Clothing</button>
                <button type="button" class="btn btn-outline-primary">Shoes</button>
                <button type="button" class="btn btn-outline-primary">Watches</button>
                <button type="button" class="btn btn-outline-primary">Accessories</button>
        </div>

        @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail card">
                    <img src="{{ $product->imagePath }}" alt="Book of Harry Potter" 
                      class="img-responsive mb-2">
                    <div class="caption">
                        <h3 class="font-weight-bold">{{ $product->title }}</h3>
                        <p class="description">{{ $product->description }}</p>
      
                          <div class="clearfix">
                            <div class="pull-left price">{{ $product->price }}</div>
                            {{-- <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right mr-3" role="button">Add to Cart</a> --}}
                            <a href="/add-to-cart/{{ $product->id }}" class="btn btn-success pull-right mr-3" role="button">Add to Cart</a>
                            
                        
                        </div>
                    </div>
                </div>
            </div>
            @endforeach  
        </div>
        @endforeach
    </div> 
    <div class="col"></div>
</div>

<!-- About us -->
<div class="container-fluid mt-5">
    <h1 class="text-center">Our team</h1>
    <hr>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="card person">
                <img src="{{url('/images/1.jpg')}}" alt="John" style="width:100%">
                <div class="text-center">
                <h1>Sam Smith</h1>
                <p class="title">UX/UI Designer</p>
                <p>Boston University</p>
                </div>
            </div>
        </div>
            
        <div class="col-md-4 col-lg-4">
            <div class="card person">
                <img src="{{url('/images/2.jpg')}}" alt="John" style="width:100%">
                <div class="text-center">
                <h1>John Doe</h1>
                <p class="title">CEO & Founder</p>
                <p>Harvard University</p>
                </div>
            </div>
        </div>
            
        <div class="col-md-4 col-lg-4">
            <div class="card person">
                <img src="{{url('/images/3.jpg')}}" alt="John" style="width:100%">
                <div class="text-center">
                <h1>Clara Nicolas</h1>
                <p class="title">Architect</p>
                <p>Mit University</p>
                </div>
            </div>
        </div>
  </div>
</div>

@endsection
