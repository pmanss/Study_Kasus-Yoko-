<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class DivisiController extends Controller
{
   public function index()
   {
      return view('divisi.index'); 
   }

   public function listData()
   {
   
     $divisi = Divisi::orderBy('id_divisi', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($divisi as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->nama_divisi;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_divisi.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_divisi.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {
      $divisi = new Divisi;
      $divisi->nama_divisi = $request['nama'];
      $divisi->save();
   }

   public function edit($id)
   {
     $divisi = Divisi::find($id);
     echo json_encode($divisi);
   }

   public function update(Request $request, $id)
   {
      $divisi = Divisi::find($id);
      $divisi->nama_divisi = $request['nama'];
      $divisi->update();
   }

   public function destroy($id)
   {
      $divisi = Divisi::find($id);
      $divisi->delete();
   }
}
