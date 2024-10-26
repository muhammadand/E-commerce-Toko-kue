@extends('layout.template')

@section('content')
<div class="container mt-5 mb-5">
    <h2>Daftar Pesanan</h2>
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Daftar Pesanan Pelanggan</h2>
        <div class="row">
            @foreach ($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">Pesanan: {{ $order->product->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Nama Pembeli:</strong> {{ $order->fullname }}</p>
                        <p class="card-text"><strong>Jumlah:</strong> {{ $order->quantity }}</p>
                        <p class="card-text"><strong>Total Harga:</strong> ${{ number_format($order->total_price, 3) }}</p>
                        <p class="card-text"><strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $order->address }}</p>
                        <p class="card-text"><strong>Telepon:</strong> {{ $order->phone }}</p>
                    <a href="{{ route('pembayaran', $order->id) }}" class="btn btn-outline-success mb-2">Lakukan Pembayaran</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Batalkan Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $orders->links() }}
</div>
</div>
<style>
    /* CSS styling */
</style>
@endsection
