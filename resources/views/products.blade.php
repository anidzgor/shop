@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Sukienki</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Koszulki</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Spodnie</a>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    @foreach($dresses as $dress)
                        <div class="row-products card">
                            <a href="{{ route('products.show', ['id' => $dress->id]) }}"><img src="{{ url('/images/products/' . $dress->imagePath ) }}"
                                class="card-img-top zoom img-responsive mb-2"></a>
                            <div class="caption text-center">
                                <h4 class="custom-font">{{ $dress->title }}</h4>
                                <div class="price">{{ $dress->price }} PLN</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            @foreach($shirts as $shirt)
                                <div class="row-products card">
                                    <a href="{{ route('products.show', ['id' => $shirt->id]) }}"><img src="{{ url('/images/products/' . $shirt->imagePath ) }}"
                                        class="card-img-top zoom img-responsive mb-2"></a>
                                    <div class="caption text-center">
                                        <h4 class="custom-font">{{ $shirt->title }}</h4>
                                        <div class="price">{{ $shirt->price }} PLN</div>
                                    </div>
                                </div>
                            @endforeach
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        @foreach($jeans as $jean)
                        <div class="row-products card">
                            <a href="{{ route('products.show', ['id' => $jean->id]) }}"><img src="{{ url('/images/products/' . $jean->imagePath ) }}"
                                class="card-img-top zoom img-responsive mb-2"></a>
                            <div class="caption text-center">
                                <h4 class="custom-font">{{ $jean->title }}</h4>
                                <div class="price">{{ $jean->price }} PLN</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection