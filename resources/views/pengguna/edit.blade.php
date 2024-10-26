@extends('layoutadmin.template')

@section('content')
<div class="card mt-5 border-0 shadow-lg" style="border-radius: 15px;">
  <div class="card-header text-white" style="background: linear-gradient(45deg, #1d2b64, #f8cdda); border-radius: 15px 15px 0 0;">
    <h4>Edit Product</h4>
  </div>
  <div class="card-body p-4">

    <div class="d-flex justify-content-end mb-3">
      <a class="btn btn-outline-primary btn-sm" href="{{ route('products.index') }}">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $product->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Enter product name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:100px" 
                name="detail" 
                id="inputDetail" 
                placeholder="Enter product details">{{ $product->detail }}</textarea>
            @error('detail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="inputHarga" class="form-label"><strong>Harga:</strong></label>
            <input 
                type="text" 
                name="harga" 
                value="{{ $product->harga }}"
                class="form-control @error('harga') is-invalid @enderror" 
                id="inputHarga" 
                placeholder="Enter product price">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <div class="mt-2">
                <img src="/images/{{ $product->image }}" class="img-thumbnail" style="max-width: 100px;">
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">
            <i class="fa-solid fa-floppy-disk"></i> Update
        </button>
    </form>

  </div>
</div>
@endsection
