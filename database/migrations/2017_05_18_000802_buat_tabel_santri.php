<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSantri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function(Blueprint $table){
            $table->increments('id_santri');                    
            $table->integer('id_divisi')->unsigned();           
            $table->string('nama_santri', 100);           
            $table->string('alamat', 50); 
            $table->string('phone', 50);             
                        
        
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
        Schema::drop('santri');
    }
}
