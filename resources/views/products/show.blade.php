@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="card">
            <div class="row ">
                <div class="col-md-4">
                    <img src="{{ url('/images/products/' . $product->imagePath ) }}" class="w-100">
                </div>
                <div class="col-md-8 py-3">
                    <div class="card-block px-3">
                                           
                        <h2 class="card-title">{{ $product->title }}</h2>
                        <div class="divideElement"></div>

                        <h4 class="mt-2 mb-2">Price: {{ $product->price }}</h4>                        
                        <div class="divideElement"></div>   
                        
                        <h4 class="mt-2 mb-2">Availability: 
                        @if($product->amount > 0)
                            <span class="badge badge-success badge-pill">Yes</span></h4>     
                        @else
                            <span class="badge badge-danger badge-pill">No</span></h4>
                        @endif
                                          
                        <div class="divideElement"></div>

                        <div class="row mt-2 mb-2">
                            <div class="col-sm-2 mt-1"><h4>Colors</h4></div>
                            <div class="col-sm-10"> 
                                <select class="target form-control" style="width: 7em">
                                    @foreach($colors as $color)
                                        @if(strcmp($currentColor, $color->name) == 0)
                                            <option value="{{ route('products.show', ['id' => $color->id]) }}" selected>{{ $color->name }}</option>
                                        @else
                                            <option value="{{ route('products.show', ['id' => $color->id]) }}">{{ $color->name }}</option>
                                        @endif
                                      @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="divideElement"></div>
                        
                        <div class="row mt-2 mb-2">
                                <div class="col-sm-2 mt-1"><h4>Size</h4></div>
                                <div class="col-sm-10"> 
                                    <select class="target form-control">
                                        @foreach($sizes as $size)
                                            @if($product->id == $size->id)
                                                <option value="{{ route('products.show', ['id' => $size->id]) }}" selected>{{ $size->name }}</option>
                                            @else
                                                <option value="{{ route('products.show', ['id' => $size->id]) }}">{{ $size->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                        </div> 

                        <div class="divideElement"></div>

                        <p class="card-text mt-2 mb-2">{{ $product->description }}</p>
                        <div class="divideElement"></div>

                        <div class="text-center">
                            @if($product->amount > 0)
                                <a href="/add-to-cart/{{ $product->id }}" class="btn btn-success mt-5" role="button">Add to Cart</a>   
                            @else
                                <a href="/add-to-cart/{{ $product->id }}" class="btn btn-success mt-5 disabled" role="button">Add to Cart</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection