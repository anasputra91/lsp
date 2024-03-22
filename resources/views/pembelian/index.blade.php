@extends('adminlte::page')
@section('title', 'List Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">List Pembelian</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('pembelian.create')}}" class="btn btn-primary mb-2">Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead bgcolor = #699ed1>
                        <tr>
                            <th>No.</th>
                            <th>No Nota Beli</th>
                            <th>Tanggal Beli</th>
                            <th>Total Beli</th>
                            <th>Nama Distributor</th>
                            <th>Nama User</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $key => $sk)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$sk->nonota_beli}}</td>
                            <td>{{$sk->tgl_beli}}</td>
                            <td>{{$sk->total_beli}}</td>
                            <td>{{$sk->fdistributor->nama_distributor}}</td>
                            <td>{{$sk->fuser->name}}</td>
                            <td>
                                <a href="{{route('pembelian.edit', $sk)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('pembelian.destroy', $sk)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
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

function notificationBeforeDelete(event, el, dt) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus data pembelian ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush