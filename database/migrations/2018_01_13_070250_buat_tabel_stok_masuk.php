<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelStokMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_masuk', function(Blueprint $table){
            $table->increments('id_stok_masuk');       
            $table->integer('id_produk')->unsigned();                
            $table->integer('jumlah')->unsigned();    
            $table->bigInteger('harga_beli')->unsigned();                                    
            $table->bigInteger('sub_total')->unsigned();     
            $table->timestamps();      
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stok_masuk');
    }
}
