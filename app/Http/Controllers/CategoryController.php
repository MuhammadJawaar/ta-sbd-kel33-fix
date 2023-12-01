<?php

// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::select('SELECT * FROM categories');
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

}

