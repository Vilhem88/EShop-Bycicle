@extends('index')

@section('content')
    <div class="container margin-top">
        <div class="row">
            <div class="col">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="d-flex justify-content-end">
                    <a class=" btn btn-success" href="{{ route('carts.placeOrder')}}">Order now</a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Frame size</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @if (Session::has('cartItems'))
                        <tbody>
                            @foreach (Session::get('cartItems') as $key => $item)
                                <tr>
                                    <td><img style="width:6rem" src="{{ asset('img/' . $item['image_path']) }}"
                                            alt=""></td>
                                    <td>{{ $item['brand'] }}</td>
                                    <td>{{ $item['model'] }}</td>
                                    <td>{{ $item['frame_size'] }}</td>
                                    <td>
                                        <form action="{{ route('carts.updateFromCart', $key) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select name="quantity" id="" value="{{ $item['quantity'] }}" onchange="this.form.submit()">
                                                @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}> {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </form>
                                        

                                        </td>
                                    <td>{{ $item['quantity'] * $item['price'] }} €</td>
                                    <td><a href="{{ route('carts.deleteFromCart', $key) }}"
                                            class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>

            </div>
        </div>
    </div>
@endsection
