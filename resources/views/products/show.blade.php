@extends('layoutadmin.template')

@section('content')
<div class="card mt-5 shadow-sm" style="border-radius: 10px;">
  <div class="card-header bg-primary text-white">
    <h4>Show Product</h4>
  </div>
  <div class="card-body p-4">

    <div class="d-flex justify-content-end mb-3">
      <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>

    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <h5 class="fw-bold">Nama kue</h5>
          <p class="fs-6">{{ $product->name }}</p>
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <h5 class="fw-bold">Details:</h5>
          <p class="fs-6">{{ $product->detail }}</p>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <h5 class="fw-bold">Image:</h5>
          <img src="/images/{{ $product->image }}" class="img-fluid rounded shadow-sm" style="max-width: 300px; height: auto;">
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
