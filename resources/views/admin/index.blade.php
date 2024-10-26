@extends('layoutadmin.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Total Products Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 py-2 rounded">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hamburger fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 py-2 rounded">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendapatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ $totalRevenue }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 py-2 rounded">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pembelian</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="totalOrders">{{$totalOrders}}</div>
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" id="progressBar"
                                        aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End of Main Content -->


    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Daftar Pesanan Pelanggan</h2>
        <div class="row">
            @foreach ($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Pesanan: {{ $order->product->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Nama Pembeli:</strong> {{ $order->fullname }}</p>
                        <p class="card-text"><strong>Jumlah:</strong> {{ $order->quantity }}</p>
                        <p class="card-text"><strong>Total Harga:</strong> ${{ number_format($order->total_price, 3) }}</p>
                        <p class="card-text"><strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d/m/Y H:i:s') }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $order->address }}</p>
                        <p class="card-text"><strong>Telepon:</strong> {{ $order->phone }}</p>
                        <a href="" class="btn btn-success btn-block mt-3">Proses sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
    
@endsection
