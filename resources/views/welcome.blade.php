@extends('theme.base')

@section('content')

<style>
    .fondo{
        background: url("02.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .alto{
        height: 100vh;
    }
    </style>
<div class= "container-fluid fondo">
<div class= "row alto align-items-center justify-content-center text-center">
    <div class= "col-md 8">
<h1>Bienvenidos</h1>

<p class= "lead">Esta pa</p>
<a href="{{ route('client.index',['id'=>1]) }}" class="btn btn-primary">Clientes</a>
</div>
</div>
    
@endsection