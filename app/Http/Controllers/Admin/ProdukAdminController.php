<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukAdminController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            'totalProducts' => Product::count(),
            'activeProducts' => Product::where('status', 'published')->count(),
            'draftProducts' => Product::where('status', 'draft')->count(),
            'lowStockProducts' => Product::where('stock', '<', 5)->count()
        ];

        $products = Product::when($request->search, function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%')
                      ->orWhere('sku', 'like', '%'.$request->search.'%')
                      ->orWhere('category', 'like', '%'.$request->search.'%')
                      ->orWhere('description', 'like', '%'.$request->search.'%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.produk.index', array_merge(['products' => $products], $stats));
    }

    public function create()
    {
        $categories = [
            'DSLR Camera',
            'Mirrorless Camera',
            'Action Camera',
            'Lensa Kamera',
            'Instant Camera',
            'Aksesoris'
        ];
        
        return view('admin.produk.create', compact('categories'));
    }

    public function edit(Product $product)
{
    $categories = [
        'DSLR Camera',
        'Mirrorless Camera',
        'Action Camera',
        'Lensa Kamera',
        'Instant Camera',
        'Aksesoris'
    ];
    return view('admin.produk.edit', compact('product', 'categories'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'sku' => 'required|unique:products,sku',
            'category' => 'required|in:DSLR Camera,Mirrorless Camera,Action Camera,Lensa Kamera,Instant Camera,Aksesoris',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:draft,published,archived',
            'description' => 'required|string|min:20|max:1000',
            'featured' => 'boolean',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ], [
            'description.min' => 'Deskripsi minimal 20 karakter',
            'image.max' => 'Gambar utama maksimal 2MB',
            'gallery.*.max' => 'Setiap gambar gallery maksimal 2MB'
        ]);

        try {
            // Upload gambar utama
            $validated['image'] = $request->file('image')->store('products', 'public');
            
            // Generate slug from product name
            $validated['slug'] = Str::slug($validated['name']); 

            // Set featured default false jika tidak dicentang
            $validated['featured'] = $request->has('featured');

            Product::create($validated);

            return redirect()->route('admin.product')
                ->with('success', 'Produk kamera berhasil ditambahkan!');

        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika ada error
            if (isset($validated['image'])) {
                Storage::disk('public')->delete($validated['image']);
            }
            if (isset($galleryPaths)) {
                foreach ($galleryPaths as $path) {
                    Storage::disk('public')->delete($path);
                }
            }

            return back()->withInput()
                ->with('error', 'Gagal menambahkan produk: '.$e->getMessage());
        }
    }
    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'sku' => 'required|unique:products,sku,'.$product->id,
        'category' => 'required|in:DSLR Camera,Mirrorless Camera,Action Camera,Lensa Kamera,Instant Camera,Aksesoris',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'status' => 'required|in:draft,published,archived',
        'description' => 'required|string|min:20|max:1000',
        'featured' => 'boolean',
        'image' => 'nullable|image|mimes:jpeg,png|max:2048',
        'remove_image' => 'boolean'
    ], [
        'description.min' => 'Deskripsi minimal 20 karakter',
        'image.max' => 'Gambar utama maksimal 2MB'
    ]);

    try {
        // Handle main image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } elseif ($request->remove_image) {
            // Remove existing image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
                $validated['image'] = null;
            }
        } else {
            $validated['image'] = $product->image;
        }

        $validated['featured'] = $request->has('featured');

        $product->update($validated);

        return redirect()->route('admin.product')
            ->with('success', 'Produk kamera berhasil diperbarui!');

    } catch (\Exception $e) {
        return back()->withInput()
            ->with('error', 'Gagal memperbarui produk: '.$e->getMessage());
    }
}

public function destroy(Product $product)
{
    try {
        // Hapus gambar utama jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.product')
            ->with('success', 'Produk berhasil dihapus!');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus produk: '.$e->getMessage());
    }
}
}