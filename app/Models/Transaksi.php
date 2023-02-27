<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Bus;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $guarded = ['id_transaksi'];

    public function user(){
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
