<?php

namespace App\Models;

use App\Models\Ijasah;
use App\Models\Pengiriman;
use App\Models\Pengambilan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $guarded = [];  

    public function ijasah(){
        return $this->belongsTo(Ijasah::class, 'ijasah_id','id');
    }
    
    public function jasa(){
        return $this->hasMany(Jasa::class,'id');
    }
}
