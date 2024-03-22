<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #87CBB9;
  color: white;
}
</style>
</head>
<body>

<h1 style="text-align: center;">Data Detail Penjualan</h1>

<table class="table table-hover table-bordered table-stripped" id="customers">
<tr>
<th>No.</th>
                            <th>Jumlah Jual</th>
                            <th>Harga Jual</th>
                            <th>Sub Total Jual</th>
                            <th>No. Penjualan</th>
                            <th>Nama Obat</th>
                            </tr>
  @php
  $no=1;
  @endphp   
  @foreach($data as $key => $sk)
  <tr>
  <td>{{$key+1}}</td>
                            <td>{{$sk->jumlah_jual}}</td>
                            <td>{{$sk->harga_jual}}</td>
                            <td>{{$sk->sub_total_jual}}</td>
                            <td>{{$sk->fpenjualan->nonota_jual}}</td>
                            <td>{{$sk->fobat->nama_obat}}</td>
</tr>
                            
                          
  @endforeach

  
</table>

</body>
</html>


