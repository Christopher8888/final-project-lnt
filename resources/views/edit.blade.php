@extends('layouts.main')

@section('title','Edit Data')

@section('content')
<div class="position">
<div class="container col-6 mt-6">
<form method="post" action="/update/{{$storage->id}}">

@csrf
@method('put')

<div class="form-group">
    <label for="kategori_barang">Kategori Barang</label>
    <input type="text" class="form-control @error('kategori_barang') is-invalid @enderror" id="kategori_barang" name="kategori_barang"  value ="{{ $storage->kategori_barang}}">
 
    @error('kategori_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="form-group">
    <label for="nama_barang">nama barang</label>
    <input type="text" class="form-control @error('naman_barang') is-invalid @enderror " id="naman_barang" name="nama_barang"  value ="{{ $storage->nama_barang}}">

    @error('naman_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 
  </div>

  <div class="form-group">
    <label for="harga_barang">harga barang</label>
    <input type="tel" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang"  value ="{{ $storage->harga_barang}}">
    @error('harga_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 
  </div>

  <div class="form-group">
    <label for="jumlah_barang">jumlah barang</label>
    <input type="tel" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang"  value ="{{ $storage-> jumlah_barang}}">
    @error('jumlah_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="form-group">
    <label for="foto_barang">foto barang</label>
    <input type="file" class="form-control @error('foto_barang') is-invalid @enderror" id="foto_barang" name="foto_barang"  value ="{{ $storage-> foto_barang}}">
    @error('foto_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  
  <button type="submit" class="btn btn-primary">submit</button>



</form>
</div>
</div>
@endsection