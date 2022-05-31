@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-grey-text text-lighten-3">Nuevo Producto</h1>
</div>
<div class="row">
    <form class='col s8' method="post" action="{{ url('productos') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre de Producto" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                <label for="nombre">Nombre del Producto</label>
                <span class="red-text">{{ $errors->first('nombre') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <textarea id="desc" name="desc" class="materialize-textarea">{{ old('desc') }}</textarea>
                <label for="desc">Descripción</label>
                <span class="red-text">{{ $errors->first('desc') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio" type="text" id="precio" name="precio" value="{{ old('precio') }}">
                <label for="precio">Precio del Producto</label>
                <span class="red-text">{{ $errors->first('precio') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca" value="{{ old('marca') }}">
                    <option value="">Seleccione la marca..</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                <label for="marca">Marca</label>
                <span class="red-text">{{ $errors->first('marca') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                <option value="">Seleccione la categoria..</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label for="categoria">Categoria</label>
                <span class="red-text">{{ $errors->first('categoria') }}</span>
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
                <span class="red-text">{{ $errors->first('imagen') }}</span>
            </div>
        </div>

        <div class="row"> 
            <button class="btn waves-effect waves-light cyan darken-2" type="submit" name="action">Guardar</button>
            @if(session('mensaje'))
            <div class="row">
                {{ session('mensaje') }}
            </div>
            @endif
        </div>
    </form>
</div>
@endsection