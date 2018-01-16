<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokMasuk extends Model
{
   protected $table = 'stok_masuk';
   protected $primaryKey = 'id_stok_masuk';
   
   public function produk(){
      return $this->belongsTo('App\Produk');
   }
}
