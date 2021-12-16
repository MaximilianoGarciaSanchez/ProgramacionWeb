@extends('theme.base')

@section('content')

<div class= "container-fluid fondo">
<div class= "row alto align-items-center justify-content-center text-center">
    <div class= "col-md 8">
<h1>Bienvenidos</h1>

<p class= "lead">Aqui se registrara a las personas que tengan una deuda en esta tienda</p>
<a href="{{ route('client.index',['id'=>1]) }}" class="btn btn-primary">Clientes</a>
</div>
</div>
    
@endsection