<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'gambar',
        'harga',
        'kategori',
        'provider_id'
    ];

    public function get_provider(){
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
