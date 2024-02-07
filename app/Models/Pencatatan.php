<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    use HasFactory;
    protected $table = 'pencatatans';
    protected $fillable = [
        'barang_id',
    ];

    public function get_barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
