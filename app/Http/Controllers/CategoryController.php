<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::select("SELECT * FROM categories WHERE isDeleted = 0");
        return view('categories.index', compact('categories'));
    }
    

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $sql = "
            INSERT INTO categories (name)
            VALUES (?)
        ";

        DB::insert($sql, [
            $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $categories = DB::select("SELECT * FROM categories WHERE id_kategori = :id_kategori", ['id_kategori' => $id])[0];
        return view('categories.edit', compact('categories'));
    }


    public function update(Request $request, $id)
    {
        DB::update("UPDATE categories SET name = :name WHERE id_kategori = :id_kategori",
            [
                'name' => $request->input('name'),
            ]);

        return redirect()->route('categories.index')->with('success', 'kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM categories WHERE id_kategori = :id_kategori", ['id_kategori' => $id]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function softdelete($id)
{
    DB::update("UPDATE categories SET isDeleted = 1 WHERE id_kategori = :id_kategori", ['id_kategori' => $id]);
    
    return redirect()->route('categories.trash')->with('success', 'Kategori berhasil dihapus.');
}

public function restore($id)
{
    DB::update("UPDATE categories SET isDeleted = 0 WHERE id_kategori = :id_kategori", ['id_kategori' => $id]);
    return redirect()->route('categories.index')->with('success', 'Kategori berhasil dipulihkan.');
}
public function trash()
{
    $categories = DB::select("SELECT * FROM categories WHERE isDeleted = 1");
    return view('categories.trash', compact('categories'));
}
public function search(Request $request)
{
    $sql = "SELECT * FROM categories WHERE isDeleted = 0";

    // Check if a search term is provided
    if ($request->has('search')) {
        $searchTerm = $request->input('search');

        // Append the search conditions to the SQL query
        $sql .= " AND (name LIKE '%$searchTerm%')";
    }

    // Execute the raw SQL query
    $categories = DB::select($sql);

    return view('categories.index', compact('categories'));
}


}

