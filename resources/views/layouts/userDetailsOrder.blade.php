@extends('index')
@section('content')
    <div class="container margin-top">
        <div class="row">
            <div class="col-6 m-auto">

                <form action="{{ route('carts.userDetailsOrder')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}">
                    </div>
                        @error('firstName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ old('lastName') }}">
                    </div>
                        @error('lastName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                    </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}">
                    </div>
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div name="totalPrice" class="text-center alert fw-semibold alert-secondary">Total Price with 19% VAT: &nbsp;{{ $totalPrice }} €</div>
                    </div>
                    <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
