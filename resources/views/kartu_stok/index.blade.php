@extends('layouts.app')

@section('title')
  Kartu Stok
@endsection

@section('breadcrumb')
   @parent
   <li>produk</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
    
      </div>
      <div class="box-body">  

<form method="post" id="form-produk">
{{ csrf_field() }}
<table class="table table-striped">
<thead>
   <tr>
      <!-- <th width="20"><input type="checkbox" value="1" id="select-all"></th> -->
      <!-- <th width="20">No</th> -->
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <!-- <th>Merk</th> -->
      <th>Harga Beli</th>
      <th>Harga Jual</th>
      <!-- <th>Diskon</th> -->
      <th>Stok</th>
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

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('kartu-stok.data') }}",
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


});

</script>
@endsection