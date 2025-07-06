<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'alamat', 'kota', 'telepon'];
    public $incrementing = false; // Non-incremental ID
    protected $keyType = 'string'; // ID berupa string
}
