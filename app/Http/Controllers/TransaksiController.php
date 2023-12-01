<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = DB::select("
            SELECT 
                transactions.id_transaksi,
                transactions.tanggal,
                transactions.jumlah,
                transactions.total_harga,
                products.name as product_name,
                users.nama as user_name
            FROM transactions
            LEFT JOIN products ON transactions.id_product = products.id
            LEFT JOIN users ON transactions.id_user = users.id
            WHERE transactions.isDeleted = 0
        ");

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = DB::select('SELECT * FROM products'); // Fetch all products
        $users = DB::select('SELECT * FROM users'); // Fetch all users
        return view('transactions.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required|exists:products,id',
            'id_user' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'total_harga' => 'required|numeric',
        ]);

        $sql = "
            INSERT INTO transactions (id_product, id_user, tanggal, jumlah, total_harga)
            VALUES (?, ?, ?, ?, ?)
        ";

        DB::insert($sql, [
            $request->id_product,
            $request->id_user,
            $request->tanggal,
            $request->jumlah,
            $request->total_harga,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id_transaksi)
    {
        $transaction = DB::select("SELECT * FROM transactions WHERE id_transaksi = :id", ['id' => $id_transaksi])[0];
        $products = DB::select("SELECT * FROM products");
        $users = DB::select("SELECT * FROM users");

        return view('transactions.edit', compact('transaction', 'products', 'users'));
    }

    public function update(Request $request, $id_transaksi)
    {
        DB::update("UPDATE transactions SET id_product = :id_product, id_user = :id_user, tanggal = :tanggal, jumlah = :jumlah, total_harga = :total_harga WHERE id_transaksi = :id",
            [
                'id_product' => $request->input('id_product'),
                'id_user' => $request->input('id_user'),
                'tanggal' => $request->input('tanggal'),
                'jumlah' => $request->input('jumlah'),
                'total_harga' => $request->input('total_harga'),
                'id' => $id_transaksi
            ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id_transaksi)
    {
        DB::delete("DELETE FROM transactions WHERE id_transaksi = :id", ['id' => $id_transaksi]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function softDelete($id_transaksi)
    {
        DB::update("UPDATE transactions SET isDeleted = 1 WHERE id_transaksi = :id", ['id' => $id_transaksi]);

        return redirect()->route('transactions.trash')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function restore($id_transaksi)
    {
        DB::update("UPDATE transactions SET isDeleted = 0 WHERE id_transaksi = :id", ['id' => $id_transaksi]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dipulihkan.');
    }

    public function trash()
    {
        $transactions = DB::select("SELECT * FROM transactions WHERE isDeleted = 1");

        return view('transactions.trash', compact('transactions'));
    }
}
