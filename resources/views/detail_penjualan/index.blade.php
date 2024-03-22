@extends('adminlte::page')
@section('title', 'List Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">List Detail Penjualan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            @can('pemilik-only')
            <a href="/exportpdf2" class="btn btn-info mb-2">
                        Export Pdf
                    </a>
                    @endcan
                @can('kasir-only')
                <a href="{{route('detail_penjualan.create')}}" class="btn btn-primary mb-2">Tambah
                </a>@endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead bgcolor = #699ed1>
                        <tr>
                            <th>No.</th>
                            <th>Jumlah Jual</th>
                            <th>Harga Jual</th>
                            <th>Sub Total Jual</th>
                            <th>No. Penjualan</th>
                            <th>Nama Obat</th>
                            @can('kasir-only')<th>Opsi</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_penjualan as $key => $sk)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$sk->jumlah_jual}}</td>
                            <td>{{$sk->harga_jual}}</td>
                            <td>{{$sk->sub_total_jual}}</td>
                            <td>{{$sk->fpenjualan->nonota_jual}}</td>
                            <td>{{$sk->fobat->nama_obat}}</td>
                            @can('kasir-only')<td>
                                <a href="{{route('detail_penjualan.edit', $sk)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('detail_penjualan.destroy', $sk)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>@endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
$('#example2').DataTable({
    "responsive": true,
});

function notificationBeforeDelete(event, el, dt) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus data detail penjualan ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush