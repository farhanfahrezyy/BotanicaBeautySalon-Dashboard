<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query for Blog model
        $blogs = Blogs::query();
        $type_menu = 'blog';
        // Check if the 'search' parameter is present, and apply the search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $blogs->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('detail', 'like', '%' . $search . '%');
            });
        }

        // Check if 'news_date' parameter is present, and apply the date filter
        if ($request->filled('news_date')) {
            $blogs->whereDate('news_date', $request->input('news_date'));
        }

        // Pagination
        $blogs = $blogs->paginate(10);

        return view('pages.admin.blogs.index', compact('blogs', 'type_menu'));
    }


    public function detail($id)
    {
        // Cari blog berdasarkan ID

        $blog = Blogs::findOrFail($id);

        // Kirim data blog ke view
        return view('pages.main.blog.blog-detail', compact('blog'));
    }

    public function show(Blogs $blog)
    {

        $type_menu = 'blog';
        $blog = Blogs::orderBy('news_date', 'desc')->paginate(10);
        return view('pages.main.blog.blog', compact('blog', 'type_menu'));
    }

    public function create()
    {
        $type_menu = 'blog';
        return view('pages.admin.blogs.create', compact('type_menu')); // Form untuk membuat blog baru
    }

    public function store(Request $request)
    {
        // Validasi input yang diterima
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'detail' => 'required',
            'news_date' => 'required|date',
            // Validasi gambar dengan ukuran maksimal 100MB
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        try {
            // Cek apakah ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                // Validasi ukuran file dengan aturan tambahan
                if ($request->file('image')->getSize() > 102400000) { // 100MB in bytes
                    return redirect()->back()->withErrors(['image' => 'Ukuran gambar terlalu besar. Maksimum 100 MB.'])->withInput();
                }

                // Generate nama unik untuk gambar
                $imageName = time() . '.' . $request->image->extension();

                // Pindahkan file gambar ke folder public/images
                $request->image->move(public_path('images'), $imageName);

                // Simpan nama file ke dalam data yang akan disimpan di database
                $data['image'] = $imageName;
            }

            // Simpan data blog ke dalam database
            Blogs::create($data);

            // Jika berhasil, tambahkan session success
            return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil disimpan!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tambahkan session error
            return redirect()->route('blogs.create')->with('error', 'Gagal menyimpan blog. Terjadi kesalahan pada server.');
        }
    }




    public function edit(Blogs $blog)
    {
        $type_menu = 'blog';
        return view('pages.admin.blogs.edit', compact('blog', 'type_menu')); // Form untuk mengedit blog
    }

    public function update(Request $request, Blogs $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'detail' => 'required',
            'news_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                File::delete(public_path('images/' . $blog->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $blog->update($data); // Update blog

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blogs $blog)
    {
        if ($blog->image) {
            File::delete(public_path('images/' . $blog->image));
        }

        $blog->delete(); // Hapus blog
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
