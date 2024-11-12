<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

         // Mengambil 4 produk acak

    $blogs = Blogs::inRandomOrder()->take(4)->get();
    $products = Product::inRandomOrder()->take(4)->get();
    return view('pages.main.home',compact('products', 'blogs')); // Gantilah 'nama_view' dengan nama view yang Anda gunakan

    }
}
