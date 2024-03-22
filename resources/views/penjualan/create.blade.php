@extends('adminlte::page')
@section('title', 'Tambah Penjualan')
@section('content_header')<h1 class="m-0 text-dark">Tambah Penjualan</h1>
@stop
@section('content')
<form action="{{route('penjualan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nonota_jual">No Nota Jual</label>
                        <input type="text" class="form-control
@error('nonota_jual') is-invalid @enderror" id="nonota_jual" placeholder="No Nota Jual"
                            name="nonota_jual" value="{{old('nonota_jual')}}">
                        @error('nonota_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="tgl_jual">Tanggal Jual</label>
                        <input type="datetime-local" class="form-control 
@error('tgl_jual') is-invalid @enderror" id="tgl_jual" placeholder="Tanggal Jual" name="tgl_jual" value="{{date('Y-d-m H:i:s') ?? old('tgl_jual')}}">
                        @error('tgl_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_jual">Total Jual</label>
                        <input type="number" class="form-control 
@error('total_jual') is-invalid @enderror" id="total_jual" placeholder="Total Jual" name="total_jual" value="{{old('total_jual')}}">
                        @error('total_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_user">Nama User</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control
@error('name') is-invalid @enderror" placeholder="Nama User" id="name" name="name" value="{{old('name')}}" arialabel="Email" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                Cari Data Nama User</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Nama User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$user->name}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" 
                                        onclick="pilih('{{$user->id}}', '{{$user->name}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

    function pilih(id, name) {
        document.getElementById('id_user').value = id
        document.getElementById('name').value = name
    }
    </script>
    @endpush