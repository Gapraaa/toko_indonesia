<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // Menampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index', compact('suppliers'));
    }

    // Tambah supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'telepon' => 'required|string',
        ]);

        // Mendapatkan ID terakhir yang ada di database
        $lastSupplier = Supplier::orderBy('id', 'desc')->first();

        if ($lastSupplier) {
            // Jika ada data, ambil angka terakhir dan tambah 1
            $lastNumber = intval(substr($lastSupplier->id, 2));
            $newId = 'SP' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada data sama sekali, mulai dari SP001
            $newId = 'SP001';
        }

        // Membuat supplier baru dengan ID yang telah dibuat
        Supplier::create([
            'id' => $newId,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Hapus supplier
    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
