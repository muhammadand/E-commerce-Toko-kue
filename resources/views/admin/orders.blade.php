@extends('layoutadmin.template')

@section('content')
<div class="container mt-5">
    <h2>Daftar Pesanan</h2>
    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Nama pembeli</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Pesan</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->product->name }}</td>
                    <td>{{$order->fullname}}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{$order->address}}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $orders->links() }}
</div>
@endsection
