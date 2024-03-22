@extends('adminlte::page')
@section('title', 'List Obat')
@section('content_header')
<h1 class="m-0 text-dark">List Obat</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('obat.create')}}" class="btn
btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead bgcolor = #699ed1>
                        <tr>
                            <th>No.</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Merk</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Golongan</th>
                            <th>Kemasan</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obat as $key => $bs)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$bs->kode_obat}}</td>
                            <td>{{$bs->nama_obat}}</td>
                            <td>{{$bs->merk}}</td>
                            <td>{{$bs->jenis}}</td>
                            <td>{{$bs->satuan}}</td>
                            <td>{{$bs->golongan}}</td>
                            <td>{{$bs->kemasan}}</td>
                            <td>{{$bs->harga_jual}}</td>
                            <td>{{$bs->stok}}</td>
                            <td>
                                <a href="{{route('obat.edit',
$bs)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('obat.destroy',
$bs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">Delete
                                </a>
                            </td>
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

function notificationBeforeDelete(event, el) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus data ? ')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush