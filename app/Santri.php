<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
   protected $table = 'santri';
   protected $primaryKey = 'id_santri';
   
   public function divisi(){
      return $this->belongsTo('App\Divisi');
   }
}
