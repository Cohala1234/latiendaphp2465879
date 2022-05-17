@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-grey-text text-lighten-3">Nuevo Producto</h1>
</div>
<div class="row">
    <form class='col s8' method="post" action="{{ route('productos.store') }}">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre de Producto" type="text" id="nombre" name="nombre">
                <label for="nombre">Nombre del Producto</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <textarea id="desc" name="desc" class="materialize-textarea"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <input placeholder="precio" type="text" id="precio" name="precio">
                <label for="precio">Precio del Producto</label>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                <label for="marca">Marca</label>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label for="categoria">Categoria</label>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn cyan darken-2">
                    <span>Imagen del Producto</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>

        <div class="row"> 
            <button class="btn waves-effect waves-light cyan darken-2" type="submit" name="action">Guardar</button>
        </div>
    </form>
</div>
@endsection