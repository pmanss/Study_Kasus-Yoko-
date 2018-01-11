@extends('layouts.app')

@section('title')
  Kartu Stok
@endsection

@section('breadcrumb')
   @parent
   <li>Kartu stok</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <!-- <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
        <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
        <a onclick="printBarcode()" class="btn btn-info"><i class="fa fa-barcode"></i> Cetak Barcode</a> -->
      </div>
      <div class="box-body">  

<form method="post">
{{ csrf_field() }}
<table class="table table-striped">
<thead>
   <tr>
      <th width="20"><input type="checkbox" value="1" id="select-all"></th>

      <th>Produk</th>
      <th>Kategori</th>
      <th>Stok Awal</th>
      <th>Stok Masuk</th>
      <th>Stok Keluar</th>
      <th>Penjualan</th>
      <th>Transfer</th>
      <th>Penyesuaian</th>
      <th>Stok Akhir</th>
   </tr>
</thead>
<tbody></tbody>
</table>
</form>

      </div>
    </div>
  </div>
</div>

@endsection