<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Seleccion de todos los productos
        $productos = Producto::all();
        //Mostrar la vista del catalogo llevandole la vista de productos
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.new')->with('marcas', $marcas)->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //definir reglas
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'image'
        ];
        //mensajes personalizados
        $mensajes = [
            "required" => "Campo Obligatorio",
            "numeric" => "Permitido solo numeros",
            "alpha" => "Permitido solo letras",
            "min" => "Permitido minimo 10 letras",
            "max" => "Permitido maximo 50 letras",
            "image" => "Permitido solo imagen",
            "unique" => "El nombre ya existe"
        ];

        //crear el objeto
        $v = Validator::make($r->all(), $reglas, $mensajes);
        if($v->fails())
        {
            //validacion fallida
            //redireccionar al formulario
            return redirect('productos/create')->withErrors($v)->withInput();
        }
        else
        {
            //asignar a la variable nombre_archivo
            $nombre_archivo = $r->imagen->getClientOriginalName();
            $archivo = $r->imagen;

            //mover al archivo en la carpeta publica
            $ruta = public_path().'/img';
            $archivo->move($ruta, $nombre_archivo);

            //validacion correcta
            //creamos entidad producto
            $p = new Producto;
            //asignar valores atributos del nuevo producto
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;  
            $p->imagen = $nombre_archivo; 
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            //grabar el nuevo producto 
            $p->save();     
            //redireccionar a la ruta : create
            return redirect('productos/create')->with('mensaje', 'Producto registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        //seleccionar el producto con id
        $producto = Producto::find($producto);
        //mostrar vista de detalles llevandole el producto seleccionado
        return view('productos.details')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        //
        echo "aqui a ir el formulario de edicion del producto cuyo id es: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
