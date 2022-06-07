@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1>{{ $producto->nombre }}</h1>
    </div>
    <div class="row">
        <div class="col s8">
            <div class="card">
                <div class="card-image">
                    <style>
                        .card
                        {
                            width: 60%;
                        }
                    </style>
                    @if($producto->imagen === null)
                        <img src="{{ asset('img/producto-no-disponible.jpg') }}" alt="">
                    @else
                        <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
                    @endif
                </div> 
            </div>
            <h3>Marcas: {{ $producto->marca->nombre }}</h3>
            <ul>
                <li>Precio: US {{ $producto->precio }}</li>
                <li>Descripcion: {{ $producto->desc }}</li>
            </ul>
        </div>
        <div class="col s4">
            <div class="row">
                <h3>Añadir al carrito<h3>
            </div>
            <div class="row">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $producto->id }}">
                    <div class="row">
                        <div class="col s4 input-field">
                            <select name="cantidad" id="cantidad">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <label for="Cantidad">Cantidad</label>
                        </div>
                        <div class="row"> 
                            <button class="btn waves-effect waves-light cyan darken-2" type="submit" name="action">Añadir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection