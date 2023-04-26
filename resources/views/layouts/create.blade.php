@extends('index')

@section('content')
    <div class="container margin-top">
        <div class="row">
            <div class="col-6 offset-2">
                <h3 class="text-center">Create a new bicycle</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <form method="POST" action="{{ route('bicycles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control  @error('type') is-invalid
                        @enderror"
                            name="type" value="{{ old('type') }}" id="type">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text"
                            class="form-control  @error('brand') is-invalid
                        @enderror"
                            name="brand" value="{{ old('brand') }}" id="brand">
                    </div>
                    @error('brand')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text"
                            class="form-control  @error('model') is-invalid
                        @enderror"
                            name="model" value="{{ old('model') }}" id="model">
                    </div>
                    @error('model')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="frame_size" class="form-label">Frame size</label>
                        <input type="text"
                            class="form-control  @error('frame_size') is-invalid
                        @enderror"
                            name="frame_size" value="{{ old('frame_size') }}" id="frame_size">
                    </div>
                    @error('frame_size')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="gender_type" class="form-label">Gender type</label>
                        <select class="form-control  @error('gender_type') is-invalid
                            @enderror"
                            value="{{ old('gender_type') }}" name="gender_type" id="gender_type">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->gender_type }}</option>
                            @endforeach
                        </select>
                        @error('gender_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number"
                            class="form-control  @error('year') is-invalid
                        @enderror" name="year"
                            value="{{ old('year') }}" id="year">
                    </div>
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number"
                            class="form-control  @error('price') is-invalid
                        @enderror"
                            name="price" value="{{ old('price') }}" id="price">
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number"
                            class="form-control @error('quantity') is-invalid
                        @enderror"
                            name="quantity" value="{{ old('quantity') }}" id="quantity">
                    </div>
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="on_sale" class="form-label">On sale</label>
                        <input type="number"
                            class="form-control @error('on_sale') is-invalid
                        @enderror"
                            name="on_sale" value="{{ old('on_sale') }}" id="on_sale">
                    </div>
                    @error('on_sale')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file"
                            class="form-control  @error('image') is-invalid
                        @enderror"
                            name="image" value="{{ old('image') }}" id="image">
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
