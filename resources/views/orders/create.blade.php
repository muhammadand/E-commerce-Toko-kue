@extends('layout.template')

@section('content')
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Buat Pesanan Kue</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <!-- Product Image Section -->
                <div class="col-md-6 text-center">
                    <img src="/images/{{ $product->image }}" alt="Product Image" class="img-fluid rounded">
                </div>
                <!-- Product Details and Order Form -->
                <div class="col-md-6">
                    <h3 class="mt-3">Nama kue {{ $product->jenis }}</h3>
                    <p>Details: {{ $product->detail }}</p>
                    <p class="font-weight-bold">Price: ${{ number_format($product->harga, 3) }}</p>
                    <form id="orderForm" action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" id="harga" name="harga" value="{{number_format($product->harga, 3)}}">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price:</label>
                            <input type="text" class="form-control" id="total_price" name="total_price" value="{{ $product->harga }}" readonly>
                        </div>
                        <hr>
                        <h4 class="mb-3">Alamat Pembeli</h4>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Lengkap:</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mt-3">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('quantity').addEventListener('input', function() {
    var quantity = parseFloat(this.value);
    var price = parseFloat(document.getElementById('harga').value);
    var totalPrice = quantity * price;
    var formattedPrice = totalPrice.toFixed(3);
    document.getElementById('total_price').value = formattedPrice;
});
</script>

<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 20px;
    }
    .btn-warning {
        background-color: #FFAA00;
        border: none;
    }
    .btn-warning:hover {
        background-color: #e69900;
    }
    .text-center {
        text-align: center;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .rounded {
        border-radius: 10px;
    }
    .form-label {
        font-weight: bold;
    }
</style>
@endsection
