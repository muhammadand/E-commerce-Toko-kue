@extends('layoutadmin.template')

@section('content')
<div class="card mt-5 border-0 shadow-lg" style="border-radius: 15px;">
  <div class="card-header text-white" style="background: linear-gradient(45deg, #1d2b64, #f8cdda); border-radius: 15px 15px 0 0;">
    <h4>Halaman Input Produk</h4>
  </div>
  <div class="card-body p-4">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
      <a class="btn btn-outline-primary btn-sm" href="{{ route('products.create') }}"> 
        <i class="fa fa-plus"></i> Input Produk
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-hover table-striped table-sm">
        <thead class="table-dark">
          <tr>
            <th width="50px">No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th>Harga</th>
            <th width="200px">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)
          <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->image }}" width="80px" class="img-thumbnail"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->harga }}</td>
            <td>
              <div class="d-flex">
                <a class="btn btn-info btn-sm me-1" href="{{ route('products.show', $product->id) }}">
                  <i class="fa fa-eye"></i> Show
                </a>
                <a class="btn btn-warning btn-sm me-1" href="{{ route('products.edit', $product->id) }}">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">There are no data.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
      {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
  </div>
</div>
@endsection
