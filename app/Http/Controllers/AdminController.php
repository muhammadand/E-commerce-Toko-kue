<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;  // Import model Product

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil jumlah total produk dari database
        $totalProducts = Product::count();
        $products = Product::latest()->paginate(5);
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        $totalRevenue = Order::sum('total_price');
        $orders = Order::latest()->paginate(10);

        // Mengirimkan data total produk ke tampilan
        return view('admin.index', compact('orders','products','totalProducts','totalOrders','username','totalRevenue'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function orders()
    {
        $orders = Order::paginate(10); // Paginasi dengan 10 item per halaman
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        return view('admin.orders', compact('orders','totalProducts','totalOrders','username'));
    }
}
