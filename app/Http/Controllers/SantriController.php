<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Divisi;
use DataTables;
use PDF;

class SantriController extends Controller
{
    public function index()
    {
       $divisi = Divisi::all();      
       return view('santri.index', compact('divisi'));
    }

    public function listData()
    {
    
      $santri = Santri::leftJoin('divisi', 'divisi.id_divisi', '=', 'santri.id_divisi')
      ->orderBy('santri.id_santri', 'desc')
      ->get();
        $no = 0;
        $data = array();
        foreach($santri as $list){
          $no ++;
          $row = array();
           $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_santri."'>";
          $row[] = $no;
          $row[] = $list->nama_santri;
          $row[] = $list->nama_divisi;
          $row[] = $list->alamat;
          $row[] = $list->phone;

          $row[] = "
            <div class='btn-group'>
                <a onclick='editForm(".$list->id_santri.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                <a onclick='deleteData(".$list->id_santri.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
            </div>";
          $data[] = $row;
        }
        
        return Datatables::of($data)->escapeColumns([])->make(true);
    }

    public function store(Request $request)
    {

            $santri = new Santri;
            $santri->nama_santri    = $request['nama'];
            $santri->id_divisi      = $request['divisi'];
            $santri->alamat      = $request['alamat'];
            $santri->phone     = $request['phone'];
            $santri->save();
    }

    public function edit($id)
    {
      $santri = Santri::find($id);
      echo json_encode($santri);
    }

    public function update(Request $request, $id)
    {
        $santri = Santri::find($id);
        $santri = new Santri;
        $santri->nama_santri    = $request['nama'];
        $santri->id_divisi      = $request['divisi'];
        $santri->alamat      = $request['alamat'];
        $santri->phone     = $request['phone'];
        $santri->update();
        echo json_encode(array('msg'=>'success'));
    }

    public function destroy($id)
    {
        $santri = Santri::find($id);
        $santri->delete();
    }

    public function deleteSelected(Request $request)
    {
        foreach($request['id'] as $id){
            $santri = Santri::find($id);
            $santri->delete();
        }
    }

}
