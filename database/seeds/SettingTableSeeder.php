<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert(array(
        [
         'nama_perusahaan' => 'Pondok IT', 
         'alamat' => 'DI YOGYAKARTA',
         'telepon' => '083133113226',
         'logo' => 'logo.png',
         'kartu_member' => 'card.png',
         'diskon_member' => '10',
         'tipe_nota' => '0'
        ]
       ));
    }
}
