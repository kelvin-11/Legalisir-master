<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    
    protected $table = 'jasa_kirim';
    protected $guarded = []; 

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'transaksi_id','id');
    }
}
