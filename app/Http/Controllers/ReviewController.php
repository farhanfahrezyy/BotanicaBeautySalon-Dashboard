<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Display all reviews for a specific product
    // Admin

    public function index()
    {
        $type_menu = 'review';
        $reviews = Review::with('product')->get();

        return view('pages.admin.reviews.index', compact( 'type_menu'));
    }

    public function show($product_id)
    {
        $type_menu = 'review';
        $product = Product::with('reviews')
            ->whereHas('reviews') // Hanya produk yang memiliki review
            ->findOrFail($product_id); // Mengambil produk berdasarkan ID

        // Mengambil review yang hanya terkait dengan produk yang dipilih
        $reviews = Review::where('product_id', $product_id)->get();

        // Menampilkan data produk dan review terkait di view
        return view('pages.admin.reviews.show', compact('product', 'reviews','type_menu'));
    }

    public function showReview($product_id)
    {

        $product = Product::with('reviews')->findOrFail($product_id);

        // Show product details and associated reviews in the view
        return view('pages.main.product.product-detail', compact('product'));
    }

    // Store a new review for a specific product
    public function store(Request $request, $id)
    {
        // Validasi input form review
        $request->validate([
            'name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string'
        ], [
            'name.required' => 'Nama diperlukan untuk memberikan ulasan.',
            'rating.required' => 'Anda harus memberikan rating pada produk ini.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal adalah 1.',
            'rating.max' => 'Rating maksimal adalah 5.'
        ]);

        // Mencari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Cegah review duplikat berdasarkan kombinasi nama dan ID produk
        $existingReview = $product->reviews()->where('name', $request->input('name'))->exists();
        if ($existingReview) {
            return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk produk ini.');
        }

        // Membuat dan menyimpan review terkait produk
        $review = $product->reviews()->create([
            'name' => $request->input('name'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review')
        ]);

        // Redirect kembali ke halaman yang sama dengan pesan sukses dan fragment #reviews
        return response()->json($review);

        // return redirect()->route('product.details', ['id' => $id])
        //     ->with('success', 'Review berhasil ditambahkan!')
        //     ->withFragment('reviews');
    }



    // Delete a review for a specific product
    public function destroy($product_id, $review_id)
    {
        // Find the review by ID and delete it
        $review = Review::where('id', $review_id)->where('product_id', $product_id)->firstOrFail();
        $review->delete();

        // Redirect back to the reviews page with a success message
        return redirect()->route('admin.reviews.show', $product_id)->with('success', 'Review berhasil dihapus.');
    }


}
