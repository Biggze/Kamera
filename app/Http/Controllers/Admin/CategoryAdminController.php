<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryAdminController extends Controller
{
      public function index()
    {
       $categories = Category::orderBy('name')->get();
        return view('admin.category.index', compact('categories'));
    }
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'color' => 'nullable|string|max:20',
            'display_order' => 'nullable|integer|min:0',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'is_active' => $request->is_active ?? false,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'color' => $request->color,
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan!');
    }
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus!');
    }
}

