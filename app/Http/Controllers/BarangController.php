<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;

class BarangController extends Controller
{
    // Tampilkan daftar barang dan supplier
    public function index()
    {
        $barang = Barang::with('supplier')->get();
        $suppliers = Supplier::all();
        return view('admin.barang.index', compact('barang', 'suppliers'));
    }

    // Tambah barang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|string',
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'supplier_id' => 'required|string|exists:suppliers,id',
        ]);

        // Ambil supplier yang dipilih
        $supplier = Supplier::findOrFail($request->supplier_id);

        // Ambil angka dari ID supplier (menghapus 'SP' dan mengonversi ke integer)
        $supplierNumber = (int) substr($supplier->id, 2);

        // Ambil barang terakhir untuk supplier ini
        $lastBarang = Barang::where('id', 'like', 'BRG' . $supplierNumber . '%')
            ->orderBy('id', 'desc')
            ->first();

        // Ambil angka urut terakhir dari ID barang sebelumnya
        $lastNumber = $lastBarang ? (int) substr($lastBarang->id, strlen('BRG' . $supplierNumber)) : 0;

        // Buat ID barang baru (format: BRG + angka supplier + urutan)
        $newId = 'BRG' . $supplierNumber . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);

        // Simpan barang baru
        Barang::create([
            'id' => $newId,
            'kategori' => $request->kategori,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $suppliers = Supplier::all();
        return view('edit', compact('barang', 'suppliers'));
    }

    // Update barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'supplier_id' => 'required|string|exists:suppliers,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'kategori' => $request->kategori,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('admin.index')->with('success', 'Barang berhasil dihapus.');
    }
}
