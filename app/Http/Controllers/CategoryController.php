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
}

