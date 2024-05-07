@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                    @if ($product->image)
                        <p><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid"></p>
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
