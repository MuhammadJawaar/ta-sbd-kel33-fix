<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; // Import the Controller class
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::select("
            SELECT 
                products.id,
                products.name,
                products.price,
                products.description,
                products.stock,
                categories.name as category
            FROM products
            LEFT JOIN categories ON products.id_kategori = categories.id_kategori
            WHERE products.isDeleted = 0
        ");

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::select('SELECT * FROM categories'); // Ambil semua kategori
        return view('products.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'category' => 'required|exists:categories,id_kategori',
        ]);

        $sql = "
            INSERT INTO products (name, price, description, stock, id_kategori)
            VALUES (?, ?, ?, ?, ?)
        ";

        DB::insert($sql, [
            $request->name,
            $request->price,
            $request->description,
            $request->stock,
            $request->category,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }
    public function edit($id)
    {
        $product = DB::select("SELECT * FROM products WHERE id = :id", ['id' => $id])[0];
        $categories = DB::select("SELECT * FROM categories");

        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        DB::update("UPDATE products SET name = :name, price = :price, description = :description, stock = :stock, id_kategori = :category WHERE id = :id",
            [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'stock' => $request->input('stock'),
                'category' => $request->input('category'),
                'id' => $id
            ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM products WHERE id = :id", ['id' => $id]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function softdelete($id)
    {
        DB::update("UPDATE products SET isDeleted = 1 WHERE id = :id", ['id' => $id]);
    
        return redirect()->route('products.trash')->with('success', 'Produk berhasil dihapus.');
    }
    
    public function restore($id)
    {
        DB::update("UPDATE products SET isDeleted = 0 WHERE id = :id", ['id' => $id]);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil dipulihkan.');
    }
    public function trash()
    {
        $products = DB::select("SELECT * FROM products WHERE isDeleted = 1");
        
    return view('products.trash', compact('products'));
    }
    public function search(Request $request)
{
    // Base SQL query
    $sql = "
        SELECT products.*, categories.name as category
        FROM products
        INNER JOIN categories ON products.id_kategori = categories.id_kategori
        WHERE products.isDeleted = 0
    ";

    // Check if a search term is provided
    if ($request->has('search')) {
        $searchTerm = $request->input('search');

        // Append the search conditions to the SQL query
        $sql .= "
            AND (
                products.name LIKE '%$searchTerm%'
                OR products.description LIKE '%$searchTerm%'
                OR categories.name LIKE '%$searchTerm%'
            )
        ";
    }

    // Execute the raw SQL query
    $results = DB::select($sql);

    // Transform the results into a collection of stdClass objects
    $products = collect($results);

    return view('products.index', compact('products'));
}


    

}
