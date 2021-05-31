@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == 'Admin')
                   
                   <h1> <a href="{{ url('product') }}">Kelola produk</a> <h1>
                  
                    



 <h1>Halo, {{Auth::user()->name}}</h1>
@elseif(Auth::user()->role == 'Member')
  <h1>Halo Member</h1>

  <h1> <a href="{{ url('product') }}">Kelola produk</a> <h1>
@endif



<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
