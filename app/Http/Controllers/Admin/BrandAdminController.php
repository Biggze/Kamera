<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandAdminController extends Controller
{
    public function index()
    {   
    $brands = Brand::latest()->get();
    return view('admin.brand.index', compact('brands'));
    }


    public function store(Request $request)
{
   $request->validate([
    'name' => 'required|string|max:255',
    'slug' => 'required|string|max:255|unique:brands,slug',
    'description' => 'nullable|string',
    'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
]);

    // Handle logo upload
   $logoPath = null;
if ($request->hasFile('logo')) {
    $logoPath = $request->file('logo')->store('brands', 'public');
}
Brand::create([
    'name' => $request->name,
    'slug' => $request->slug,
    'description' => $request->description,
    'logo_path' => $logoPath,
]);

    return redirect()->route('admin.brand')->with('success', 'Brand berhasil ditambahkan!');
}

    public function create(){
        return view('admin.brand.create');
    }

    public function edit($id)
{
    $brand = Brand::findOrFail($id);
    return view('admin.brand.update', compact('brand'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:brands,slug,'.$id,
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $brand = Brand::findOrFail($id);

    $logoPath = $brand->logo_path;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('brands', 'public');
    }

    $brand->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'logo_path' => $logoPath,
    ]);

    return redirect()->route('admin.brand')->with('success', 'Brand berhasil diupdate!');
}

public function destroy($id)
{
    $brand = Brand::findOrFail($id);

    if ($brand->logo_path && \Storage::disk('public')->exists($brand->logo_path)) {
        \Storage::disk('public')->delete($brand->logo_path);
    }

    $brand->delete();

    return redirect()->route('admin.brand')->with('success', 'Brand berhasil dihapus!');
}

}
