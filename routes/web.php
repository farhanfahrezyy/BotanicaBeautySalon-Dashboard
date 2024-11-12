<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#Dashboard
Route::get('/dashboard', function () {
    $type_menu = 'dashboard';
    return view('pages.admin.dashboard',compact('type_menu'));
})->middleware('auth')->name('dashboard');

#PHP Info Route (if needed for debugging purposes)
Route::get('/php', function () {
    dd(phpinfo());
});

#Products Admin

# Product Management - Admin Panel
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');                // List all products
    Route::get('/create', [ProductController::class, 'create'])->name('create');        // Show form to create new product
    Route::post('/', [ProductController::class, 'store'])->name('store');               // Store new product
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');    // Show form to edit product
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');     // Update existing product
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy'); // Delete a product
});

# Blog Management - Admin Panel
Route::prefix('admin/blogs')->name('admin.blogs.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');                // List all blogs
    Route::get('/create', [BlogController::class, 'create'])->name('create');        // Show form to create new blog
    Route::post('/', [BlogController::class, 'store'])->name('store');               // Store new blog
    Route::get('/{blog}', [BlogController::class, 'show'])->name('show');            // Show blog details
    Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');       // Show form to edit blog
    Route::put('/{blog}', [BlogController::class, 'update'])->name('update');        // Update existing blog
    Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');   // Delete a blog
});

# User Management - Admin Panel
Route::prefix('admin/user')->name('admin.user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');            // List all users
    Route::get('/create', [UserController::class, 'create'])->name('create');    // Show form to create a new user
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');             // Store new user
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');     // Show form to edit a user
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy'); // Delete a user
});

# Service Management - Admin Panel
Route::prefix('admin/service')->name('admin.service.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
           // List all services
    Route::get('/create', [ServiceController::class, 'create'])->name('create');       // Show form to create a new service
    Route::post('/store', [ServiceController::class, 'store'])->name('store');         // Store new service
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');   // Show form to edit an existing service
    Route::put('/{service}', [ServiceController::class, 'update'])->name('update');    // Update an existing service
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy'); // Delete an existing service
});

# Review Management - Admin Panel
Route::prefix('admin/reviews')->name('admin.reviews.')->group(function () {
    Route::get('/{product_id}', [ReviewController::class, 'show'])->name('show');       // Show reviews for a specific product
    Route::put('/{product_id}/reviews/{review_id}', [ReviewController::class, 'update'])->name('update'); // Update a specific review
    Route::delete('/admin/reviews/{product_id}/reviews/{review_id}', [ReviewController::class, 'destroy'])->name('destroy'); // Delete a specific review
});

# Blog Management
// (Pastikan untuk menambahkan rute Blog jika diperlukan)

# Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('pages.admin.auth.auth-login');
    })->name('login');  // Login form

    Route::get('/register', function () {
        return view('pages.admin.auth.auth-register');
    })->name('register');  // Register form

    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');  // Process login
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register');  // Process registration
});

Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware('auth'); // Logout route

# Home
Route::prefix('/')->name('home')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

});
# Product Catalog - Public
Route::prefix('/shop')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'catalog'])->name('catalog');            // View product catalog
    Route::get('/shop-detail/{id}', [ProductController::class, 'detail'])->name('details'); // View product details
    Route::post('/shop-detail/{id}/addReview', [ReviewController::class, 'store'])->name('review.store'); // Add review to product
    Route::get('/{product_id}/reviews', [ReviewController::class, 'showReview'])->name('showReview'); // Show reviews for product
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/category/{category}', [ProductController::class, 'category'])->name('category');
});

# Blog - Public
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'show'])->name('show');  //
    Route::get('/blog-detail/{id}', [BlogController::class, 'detail'])->name('detail');
});

Route::prefix('/contact')->name('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
});

Route::prefix('/gallery')->name('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index']);
});

Route::prefix('/ourservices')->name('service')->group(function () {
    Route::get('/', [ServiceController::class, 'show']);
});

# Admin - Products with Reviews
Route::get('/admin/products-with-reviews', [ProductController::class, 'productListWithReviews'])->name('admin.products.reviews'); // List products with reviews
