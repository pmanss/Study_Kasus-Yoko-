@extends('layouts.app')

@section('title')
  Stok Masuk
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
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('produk.data') }}",
       "type" : "GET"
     },
     'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false
      }],
      'order': [1, 'asc']
   }); 
   
   $('#select-all').click(function(){
      $('input[type="checkbox"]').prop('checked', this.checked);
   });

  $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('produk.store') }}";
         else url = "produk/"+id;
         
         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
           dataType: 'JSON',
           success : function(data){
             if(data.msg=="error"){
                alert('Kode produk sudah digunakan!');
                $('#kode').focus().select();
             }else{
                $('#modal-form').modal('hide');
                table.ajax.reload();
             }            
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     }
   });
});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Tambah Produk');
   $('#kode').attr('readonly', false);
}




function deleteData(id){
  if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "produk/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}

function deleteAll(){
  if($('input:checked').length < 1){
    alert('Pilih data yang akan dihapus!');
  }else if(confirm("Apakah yakin akan menghapus semua data terpilih?")){
     $.ajax({
       url : "produk/hapus",
       type : "POST",
       data : $('#form-produk').serialize(),
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}
@endsection