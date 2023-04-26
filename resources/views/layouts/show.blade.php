@extends('index')
@section('content')
    <div class="container margin-top">
        <div class="row">
            <div class="d-flex">
                <img class="imageSize" src="{{asset('img/'.$bicycle->image_path) }}" alt="">
                <div class="d-flex margin-left">
                    <span class="h3">{{ $bicycle->brand}}&nbsp</span>
                    <span class="h3">{{ $bicycle->model}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
