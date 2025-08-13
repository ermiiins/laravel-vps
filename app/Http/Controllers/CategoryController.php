<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children', 'parent')
            ->active()
            ->parents()
            ->orderBy('sort_order')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::active()->parents()->orderBy('name')->get();
        return view('categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => true
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::active()->parents()->where('id', '!=', $category->id)->orderBy('name')->get();
        return view('categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    // API endpoint for getting categories (for AJAX dropdown)
    public function getCategories()
    {
        $categories = Category::with('children')
            ->active()
            ->parents()
            ->orderBy('sort_order')
            ->get();

        return response()->json($categories);
    }
}