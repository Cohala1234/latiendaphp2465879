@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1>Carrito de compras</h1>
    </div>
    @if(session('cart'))
    <div class="row">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $producto)
                        <tr>
                            <td>{{ $producto[0]["nombre"] }}</td>
                            <td>{{ $producto[0]["cantidad"] }}</td>
                            <td>{{ $producto[0]["precio"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <form method="post" action="{{ route('cart.destroy', 1 ) }}">
            @method('DELETE')
            @csrf
            <button class="btn waves-effect waves-light cyan darken-2" type="submit">Eliminar carrito</button>
        </form>
    </div>
    @else
    <strong>No hay productos agregados al carrito</strong>
    @endif
@endsection