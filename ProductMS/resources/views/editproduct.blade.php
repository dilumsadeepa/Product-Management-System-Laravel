@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="10" name="description">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="current_image">Current Image</label>
                            @if ($product->image)
                                <br>
                                <img src="{{ asset($product->image) }}" alt="Current Image" style="max-width: 200px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">New Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
