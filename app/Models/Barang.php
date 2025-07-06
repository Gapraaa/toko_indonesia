<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'kategori', 'nama_barang', 'harga', 'stok', 'supplier_id'];
    public $incrementing = false; // Non-incremental ID
    
    protected $table = 'barangs';
    protected $keyType = 'string'; // ID berupa string

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
