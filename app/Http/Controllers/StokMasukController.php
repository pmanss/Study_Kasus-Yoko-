<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokMasuk;
use App\Produk;
use DataTables;
use PDF;

class StokMasukController extends Controller
{
    public function index()
    {
       $produk = Produk::all();      
       return view('stok_masuk.index', compact('produk'));
    }

    public function listData()
    {
    
      $stok_masuk = StokMasuk::leftJoin('produk', 'produk.id_kategori', '=', 'stok_masuk.id_produk')
      ->orderBy('stok_masuk.id_stok_masuk', 'desc')
      ->get();
        $no = 0;
        $data = array();
        foreach($stok_masuk as $list){
          $no ++;
          $row = array();
           $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_stok_masuk."'>";
          $row[] = $no;
          $row[] = $list->nama_produk;
          $row[] = $list->jumlah;
          $row[] = "Rp. ".format_uang($list->harga_beli);
          $data[] = $row;
        }
        
        return Datatables::of($data)->escapeColumns([])->make(true);
    }

    public function store(Request $request)
    {
       $stok_masuk = new StokMasuk;
       $stok_masuk->id_produk = $request['nama_produk'];
       $stok_masuk->jumlah = $request['jumlah'];
       $stok_masuk->harga_beli = $request['harga'];
       
       $stok_masuk->save();
    }

    public function edit($id)
    {
      $stok_masuk = StokMasuk::find($id);
      echo json_encode($stok_masuk);
    }

    public function update(Request $request, $id)
    {
        $stok_masuk = StokMasuk::find($id);
        $stok_masuk->id_produk     = $request['nama_produk'];
        $stok_masuk->jumlah          = $request['jumlah'];
        $stok_masuk->harga_beli      = $request['harga_beli'];
        $produk->update();
        echo json_encode(array('msg'=>'success'));
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
    }

    public function deleteSelected(Request $request)
    {
        foreach($request['id'] as $id){
            $produk = Produk::find($id);
            $produk->delete();
        }
    }

    public function printBarcode(Request $request)
    {
        $dataproduk = array();
        foreach($request['id'] as $id){
            $produk = Produk::find($id);
            $dataproduk[] = $produk;
        }
        $no = 1;
        $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
        $pdf->setPaper('a4', 'potrait');      
        return $pdf->stream();
    }
}
