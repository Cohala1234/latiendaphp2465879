@extends('layouts.menu')

@section('contenido')
@if(session('mensajito'))
    <div class="row">
        <strong>
            {{ session('mensajito') }}
            <a href="{{ route('cart.index') }}">Ir al carrito</a>
        </strong>
    </div>
@endif
    <div class="row">
        <style>
            .row
            {
                margin-left: 24%;
            }
        </style>
        <h1>Catalogo de Productos</h1>
    </div>
    @foreach($productos as $producto)
        <div class="row">
            <div class="col s8">
                <div class="card">
                    <style>
                        .card
                        {
                            display: flex;
                            width: 60%;
                        }
                    </style>
                    <div class="card-image">
                        @if($producto->imagen === null)
                            <img src="{{ asset('img/producto-no-disponible.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
                        @endif
                        <span class="card-title">{{ $producto->nombre }}</span>
                    </div>
                    <div class="card-content">
                        <p>{{ $producto->desc }}</p>
                    </div>
                    <div class="card-action">
                        <a href="{{ route('productos.show', $producto->id) }}">Ver detalles</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection