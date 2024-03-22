@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
 <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
 <form action="{{route('users.update', $user)}}" method="post">
 @method('PUT')
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <div class="form-group">
 <label for="exampleInputName">Nama</label>
 <input type="text" class="form-control
@error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{$user->name ?? old('name')}}">
 @error('name') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="exampleInputEmail">Email address</label>
 <input type="email" class="form-control
@error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$user->email ??old('email')}}">
 @error('email') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="exampleInputPassword">Password</label>
 <input type="password" class="form-control
@error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
 @error('password') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="exampleInputPassword">Konfirmasi Password</label>
 <input type="password" class="form-control" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
 </div>
 <div class="form-group">
 <label for="exampleInputlevel">Level</label>
 <select class="form-control @error('level') isinvalid @enderror" id="exampleInputlevel" name="level">
 <option value="apoteker" @if($user->level == 'apoteker' || old('level') == 'apoteker')selected @endif>Apoteker</option>
 <option value="gudang" @if($user->level == 'gudang' || old('level') == 'gudang')selected @endif>Gudang</option>
 <option value="kasir" @if($user->level =='kasir' || old('level') == 'kasir')selected @endif>Kasir</option>
 <option value="pemilik" @if($user->level =='pemilik' || old('level') == 'pemilik')selected @endif>Pemilik</option>
 </select>
 @error('level') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="exampleInputAktif">Aktif</label>
 <select class="form-control @error('aktif') isinvalid @enderror" id="exampleInputAktif" name="aktif">
 <option value="1" @if($user->aktif == '1' || old('aktif') == '1')selected @endif>Ya</option>
 <option value="0" @if($user->aktif == '0' || old('aktif') == '0')selected @endif>Tidak</option>
 </select>
@error('level') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 </div>
 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Simpan</button>
 <a href="{{route('users.index')}}" class="btn btn-danger">Batal</a>
 </div>
 </div>
 </div>
 </div>
@stop