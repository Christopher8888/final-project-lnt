@extends('layouts.main')

@section('title','Home')


@section('content')

<div class="container">
  
<h1> storage management</h1>

<a href="/create " class="btn btn-primary my-3"> Tambah Barang</a>

<!-- Notifikasi -->
@if (session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
 @endif
  <!-- --- -->
  @if(Auth::user()->role == 'Admin')

<table class="table table-hover container bg-light ">
  <thead>
    <tr class="title">
      <th scope="col">No</th>
      <th scope="col">Kategori Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Barang</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Foto Barang</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody> 

    @foreach($products as $product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$product->kategori_barang}}</td>
      <td>{{$product->nama_barang}}</td>
      <td>{{$product->harga_barang}}</td>
      <td>{{$product->jumlah_barang}}</td>
      <td><img width= "100px" heigth="100px" src="{{ asset('storage/images/'.$product->foto_barang) }}" alt="{{ $product->nama_barang }}"></td>

      <td><a href="/edit/{{ $product->id}}"><button type="button" class="btn btn-warning">Edit</button></a>
            <a href="/delete/{{$product->id}}"><button type="button" class="btn btn-danger">Delete</button</a>
      </td>
    </tr>
  </tbody>

  @endforeach
 @endif
  
  @if(Auth::user()->role == 'Member')

  @foreach($products as $product)
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('storage/images/'.$product->foto_barang) }}" alt="{{ $product->nama_barang }}">
  <div class="card-body">
    <h5 class="card-title">Nama Barang {{$product->nama_barang}} </h5>
    <p class="card-text"> Kategori Barang : {{$product->kategori_barang}}</p>
    <p class="card-text"> Harga Barang:{{$product->harga_barang}}</p>
    <p class="card-text"> Jumlah Barang : {{$product->jumlah_barang}}</p>
   
  </div>
</div>

@endforeach

@endif

</table>

</div>




    




@endsection