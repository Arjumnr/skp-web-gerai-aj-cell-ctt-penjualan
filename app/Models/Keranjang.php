<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $fillable = [
        'barang_id',
        'jumlah',
        'total',
        'user_id',
    ];

    public function getBarang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
