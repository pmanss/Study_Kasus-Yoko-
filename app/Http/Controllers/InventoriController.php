<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoriController extends Controller
{
    public function index()
   {
      return view('inventori.kartu-stok'); 
   }

    public function stokmasuk()
   {
      return view('inventori.stok-masuk'); 
   }
   
    public function stokkeluar()
   {
      return view('inventori.stok-keluar');
   }

}
