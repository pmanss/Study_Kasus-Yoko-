@extends('layouts.app')

@section('title')
  Stok Keluar
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
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
        <!-- <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
        <a onclick="printBarcode()" class="btn btn-info"><i class="fa fa-barcode"></i> Cetak Barcode</a> -->
      </div>
      <div class="box-body">  

<form method="post">
{{ csrf_field() }}
<table class="table table-striped">
<thead>
   <tr>
      <th width="20"><input type="checkbox" value="1" id="select-all"></th>

      <th>Tanggal</th>
      <th>Catatan</th>
      <th>Jenis</th>
      <th>Aksi</th>

   </tr>
</thead>
<tbody></tbody>
</table>
</form>

      </div>
    </div>
  </div>
</div>
@include('inventori.form-masuk')
@endsection

@section('script')
<script type="text/javascript">
function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Tambah Produk');
   $('#kode').attr('readonly', false);
}

</script>
@endsection