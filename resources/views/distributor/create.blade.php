@extends('adminlte::page')
@section('title', 'Tambah Data Distributor')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Data Distributor</h1>
@stop
@section('content')
<form action="{{route('distributor.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_distributor">Nama Distributor</label>
                        <input type="text" class="form-control 
@error('nama_distributor') is-invalid @enderror" id="nama_distributor" placeholder="Nama Distributor" name="nama_distributor" value="{{old('nama_distributor')}}">
                        @error('nama_distributor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control 
@error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="notelepon">No Telepon</label>
                        <input type="text" class="form-control 
@error('notelepon') is-invalid @enderror" id="notelepon" placeholder="No Telepon" name="notelepon" value="{{old('notelepon')}}">
                        @error('notelepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('distributor.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop