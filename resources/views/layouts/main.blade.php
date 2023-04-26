@extends('index')

@section('content')
    <div class="container margin-top">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-1">
            @foreach ($bicycles as $bicycle)
                <?php $gender = strtolower($bicycle->gender->gender_type); ?>
                <ul class="col mb-5 {{ $gender }}">
                    <div class="" style="width: 18rem;">
                        <li class="list-group-item"><a href="{{ route('bicycles.show', $bicycle->id) }}"><img
                                    style="height: 12rem;" src="{{ asset('img/' . $bicycle->image_path) }}"
                                    class="card-img-top" alt="..."></a></li>
                        <li class="list-group-item card-body">


                            <form action="{{ route('carts.addToCart') }}" method="post" class="addToCart"
                                data-available-quantity="{{ $bicycle->quantity }}">
                                @csrf
                        <li class="list-group-item"><a class="list-group-item"
                                href="{{ route('bicycles.show', $bicycle->id) }}">
                                <h5>{{ $bicycle->brand }} {{ $bicycle->model }}</h5>
                            </a></li>
                        <input type="hidden" name="id" value="{{ $bicycle->id }}">
                        <input type="hidden" name="brand" value="{{ $bicycle->brand }}">
                        <input type="hidden" name="model" value="{{ $bicycle->model }}">

                        <li class="card-text">Type: {{ $bicycle->type->type }}</li>
                        <input type="hidden" name="type" value="{{ $bicycle->type->type }}">

                        <li class="card-text">Frame size: {{ $bicycle->frame_size }}</li>
                        <input type="hidden" name="frame_size" value="{{ $bicycle->frame_size }}">

                        <li class="card-text">Model year: {{ $bicycle->year }}</li>
                        <input type="hidden" name="year" value="{{ $bicycle->year }}">

                        <li class="card-text">Price: {{ $bicycle->price }} €</li>
                        <input type="hidden" name="price" value="{{ $bicycle->price }}">



                        @if ($bicycle->quantity > 0)
                            <li class="card-text text-success">avaiable</li>
                            <div class="quantityPossition">
                                <span class="h6">Quantity: </span>
                                <select id="quantityId" name="quantity" class="quantity" value="{{ $bicycle->quantity }}">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}"
                                            {{ $bicycle->quantity == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <li class="list-group-item"><button id="btnAddtoCart" class="btn btn-success possition">add to
                                    cart</button></li>
                        @else
                            <li class="list-group-item"><span class="text-danger possition"> not avaiable </span></li>
                        @endif

                        </form>

                        </li>
                    </div>
                </ul>
            @endforeach
        </div>
    </div>
@endsection


{{-- <ul id="products"> 
    <li class="product">
        <img src="">
        <h2><a href="">Polar Bear</a></h2>
        <form action="add-to-cart" method="POST" data-available-quantity="8" class="addToCart">
            <input type="hidden" name="product" value="1" />
            <input type="hidden" name="quantity" value="1" />
            <button type="submit">add to cart</button>
        </form>
    </li>
    <li class="product">
        <img src="">
        <h2><a href="">Polar Bear</a></h2>
        <form action="add-to-cart" method="POST" data-available-quantity="8" class="addToCart">
            <input type="hidden" name="product" value="2" />
            <input type="hidden" name="quantity" value="1" />
            <button type="submit">add to cart</button>
        </form>
    </li>
    <li class="product">
        <img src="">
        <h2><a href="">Polar Bear</a></h2>
        <form action="add-to-cart" method="POST" data-available-quantity="8" class="addToCart">
            <input type="hidden" name="product" value="3" />
            <input type="hidden" name="quantity" value="1" />
            <button type="submit">add to cart</button>
        </form>
    </li>

</ul> --}}
