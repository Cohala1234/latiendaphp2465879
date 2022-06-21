<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar la variable de session que se llama 'cart'
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $producto = [
        [
        "nombre" => $request->prod_nom,
        "id" => $request->prod_id,
        "cantidad" => $request->cantidad,
        "precio" => $request->precio
        ]];
       if(!session('cart'))
       {
            //en caso de que no exista la variable
            //crear estado de session 'cart'
            $auxiliar[] = $producto;
            session(['cart' => $auxiliar]);
       }
       else
       {
            //en caso de que exista la variable se extrae el contenido de session 'cart'
            $auxiliar = session('cart');
            //agregar al nuevo item del arreglo
            $auxiliar[] = $producto;
            //
            session(['cart' => $auxiliar]);
       }

       return redirect('productos')->with('mensajito', 'Producto añadido en el carrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar la session 'cart'
        session()->forget('cart');
        return redirect('cart')->with('mensajito', 'Carrito eliminado');
    }
}
