<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;

class AdminController extends Controller
{
    // Tampilkan daftar barang dan supplier
    public function index()
    {
        $barangs = Barang::with('supplier')->get();
        $suppliers = Supplier::all();
        return view('admin.index', compact('barangs', 'suppliers'));
    }

}
