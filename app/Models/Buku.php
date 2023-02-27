<?php

namespace App\Models;

use App\Http\Controllers\KategoriController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $guarded = [
        'id_buku'
    ];

    public function kategori_buku(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
