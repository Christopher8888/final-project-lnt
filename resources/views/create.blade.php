@extends('layouts.main')

@section('title','Create books')

@section('content')

<div class="position">
<div class="container col-6 ">
<form method="post" action="{{route('uploaddata')}}" enctype="multipart/form-data">

@csrf

<div class="form-group">
    <label for="kategori_barang">Kategori Barang</label>
    <input type="text" class="form-control @error('kategori_barang') is-invalid @enderror" id="" name="kategori_barang" placeholder="masukan kategori barang " value ="{{ old( 'kategori_barang')}}">
 
    @error('kategori_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="form-group">
    <label for="nama_barang">Nama Barang</label>
    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror " id="" name="nama_barang" placeholder="masukan nama barang" value ="{{ old( 'nama_barang')}}">

    @error('nama_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 
  </div>

  <div class="form-group">
    <label for="harga_barang">Harga Barang</label>
    <input type="tel" class="form-control @error('harga_barang') is-invalid @enderror" id="" name="harga_barang" placeholder="Rp." value ="{{ old( 'harga_barang')}}">
    @error('harga_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 
  </div>

  <div class="form-group">
    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="tel" class="form-control @error('jumlah_barang') is-invalid @enderror" id="" name="jumlah_barang" placeholder="masukan jumlah barang" value ="{{ old('jumlah_barang')}}">
    @error('jumlah_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="form-group">
						<b>Foto Barang</b><br/>
            
						<input type="file" name="foto_barang">
 
    @error('foto_barang')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  
  <button type="submit" class="btn btn-primary">  submit</button>



</form>
</div>
</div>
@endsection