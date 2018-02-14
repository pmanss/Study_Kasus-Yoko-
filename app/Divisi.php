<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
	protected $primaryKey = 'id_divisi';
	
	public function santri(){
		return $this->hasMany('App\Santri', 'id_divisi');
	}
}
