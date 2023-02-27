<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak_User extends Model
{
    use HasFactory;

    protected $table = 'rak_user';
    protected $primaryKey = 'id_rak';
    protected $guarded = ['id_rak'];
    
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
