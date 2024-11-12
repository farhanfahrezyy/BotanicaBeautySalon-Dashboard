<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index(Request $request)
    {
        $type_menu = 'product';

        // Fetch products with filtering, sorting, and price range applied
        $products = Product::with('category')
            ->when($request->input('name'), function ($query, $searchTerm) {
                return $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('category', 'like', '%' . $searchTerm . '%');
                    });
            })
            ->when($request->input('sort'), function ($query, $sort) {
                return $query->orderBy('price', $sort);
            })
            ->when($request->input('min_price'), function ($query, $minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($request->input('max_price'), function ($query, $maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->paginate($request->input('pagination', 10)); // Default pagination to 10 items per page

        return view('pages.admin.products.index', compact('products', 'type_menu'));
    }




    public function search(Request $request)
    {
        $query = $request->input('query');
        $sort = $request->input('sort');

        $productsQuery = Product::where('name', 'LIKE', '%' . $query . '%');

        // Sorting logic
        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'popular':
                // Assuming you have a views or popularity column
                $productsQuery->orderBy('views', 'desc');
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $products = $productsQuery->paginate(12)->appends([
            'query' => $query,
            'sort' => $sort
        ]);

        $categories = Category::all();

        return view('pages.main.product.product', compact('products', 'categories'));
    }

    public function category($categoryName)
    {
        $sort = request('sort');

        // Get the category by name since your table uses 'category' field
        $category = Category::where('category', $categoryName)->firstOrFail();

        // Use category_id to get products since that's the foreign key in products table
        $productsQuery = Product::where('category_id', $category->id);

        // Sorting logic
        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'popular':
                $productsQuery->latest();  // Changed to latest since there's no views column
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $products = $productsQuery->paginate(12)->appends(['sort' => $sort]);
        $categories = Category::all();

        return view('pages.main.product.product', compact('products', 'categories', 'category'));
    }



    public function catalog(Request $request)
    {

        $sort = $request->input('sort', 'popular');
        $query = Product::with(['reviews'])->withAvg('reviews', 'rating');

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('reviews_avg_rating', 'desc');
                break;
        }

        // Menggunakan paginate(12) untuk pagination, bukan get()
        $products = $query->paginate(12);

        return view('pages.main.product.product', compact('products'));
    }

    public function detail($id)
    {
        // Mencari produk berdasarkan ID

        $product = Product::with('reviews')->findOrFail($id);

        // Menyimpan data produk ke view
        return view('pages.main.product.product-detail', compact('product'));
    }
    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        // Mengambil semua kategori untuk dropdown
        $type_menu = 'product';
        $categories = Category::all();
        return view('pages.admin.products.create', compact('categories', 'type_menu'));
    }

    // Menyimpan produk baru


    public function store(Request $request)
    {
        // Validate input data including category_id and description
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category,id', // Ensure the table name matches your database
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048',
            'product_link' => 'required|string|max:500',
        ]);

        // Process image upload if there is one
        if ($request->hasFile('image')) {
            // Ensure the 'public/images' directory exists
            if (!File::exists(public_path('images'))) {
                File::makeDirectory(public_path('images'), 0755, true); // Create directory with permissions
            }

            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // Save image in 'public/images' directory
            $data['image'] = $imageName;
        }

        // Save the product data to the database
        Product::create($data);

        // Redirect to product index with success message
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit produk yang ada
    public function edit(Product $product)
    {
        // Mengambil semua data kategori untuk ditampilkan di dropdown
        $type_menu = 'product';
        $categories = Category::all();
        return view('pages.admin.products.edit', compact('categories', 'product', 'type_menu'));
    }


    // Memperbarui produk yang ada


    public function update(Request $request, Product $product)
    {
        // Validate input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category,id', // Corrected table name if necessary
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // max:20480 for a 20MB limit
            'product_link' => 'required|string|max:500',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image && File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // Moves the image to the public/images directory
            $data['image'] = $imageName;
        }

        // Update product data
        $product->update($data);

        // Redirect or return a response
        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    // Menghapus produk yang ada
    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image) {
            File::delete(public_path('images/' . $product->image));
        }
        // Hapus produk dari database
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }



    public function productListWithReviews(Request $request)
{
    $type_menu = 'review';

    // Get products with reviews, calculate average rating, and apply filters if needed
    $productsWithReviews = Product::whereHas('reviews')
        ->withAvg('reviews', 'rating') // Calculate the average rating for each product
        ->when($request->input('name'), function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(10); // Paginate the results, 10 products per page

    return view('pages.admin.reviews.index', compact('productsWithReviews', 'type_menu'));
}

}
