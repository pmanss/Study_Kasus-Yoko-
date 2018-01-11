<!DOCTYPE html>
<html>
<head>  
  <title>Produk PDF</title>
  <style type="text/css">
      table td{font: arial 12px;}
      table.data td,
      table.data th{
         border: 1px solid #ccc;
         padding: 5px;
      }
      table.data th{
         text-align: center;
      }
      table.data{ border-collapse: collapse }
   </style>
  </style>
</head>
<body>
 
<h3 class="text-center">Laporan Pendapatan</h3>
<h4 class="text-center">Tanggal  {{ tanggal_indonesia($tanggal_awal) }} s/d {{ tanggal_indonesia($tanggal_akhir) }} </h4>

         
<table class="data">
<thead>
   <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Penjualan</th>
    <th>Pembelian</th>
    <th>Pendapatan</th>
   </tr>

   <tbody>
    @foreach($data as $row)    
    <tr>
    @foreach($row as $col)
     <td>{{ $col }}</td>
    @endforeach
    </tr>
    @endforeach
   </tbody>
</table>

</body>
</html>