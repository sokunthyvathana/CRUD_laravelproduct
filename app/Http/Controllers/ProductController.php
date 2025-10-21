<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function show($id)
    {
        $product = Product::where('ProductID', $id)->with('category')->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function getByID($proID)
    {
        return view('product', ['proID' => $proID]);
    }
    
    public function create(){
        $categories=Category::all();
        return view('product', compact('categories'));
    }

    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'ProductName' => 'required|string|max:255|unique:products',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0', // fixed typo
            'description' => 'nullable|string',
            'categoryID' => 'required|exists:categories,categoryID',
        ]);

        Product::create($ValidatedData);
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');

    }

   public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all(); // Get all categories
        
        return view('products.index', compact('products', 'categories'));
    }

    // Add these two methods:

    public function edit($id)
    {
        $product = Product::where('ProductID', $id)->firstOrFail();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ProductName' => 'required|string|max:255|unique:products,ProductName,' . $id . ',ProductID',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'categoryID' => 'required|exists:categories,categoryID',
        ]);

        $product = Product::where('ProductID', $id)->firstOrFail();
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::where('ProductID', $id)->firstOrFail();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }



    
}
