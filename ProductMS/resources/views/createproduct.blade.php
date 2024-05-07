@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

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

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="10" name="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
