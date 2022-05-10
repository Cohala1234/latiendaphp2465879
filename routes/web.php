<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta de paises
Route::get('paises', function()
{
    $paises=[
        "Colombia" => [
            "Capital" => "Bogotá",
            "Moneda" => "Peso",
            "Población" => 51.6,
            "Ciudades" => [
                "Medellín",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" => [
            "Capital" => "Lima",
            "Moneda" => "Sol",
            "Población" => 32.97,
            "Ciudades" => [
                "Lima",
                "Cusco",
                "Arequipa"
            ]
        ],
        "Paraguay" =>[
            "Capital" => "Asuncion",
            "Moneda" => "Guarani paraguayo",
            "Población" => 7.133,
            "Ciudades" => [
                "Ciudad de este",
                "Luque",
                "Encarnacion"
            ]
        ]
    ];

    //echo"<pre>";
    //var_dump($paises);
    //echo"</pre>";

    //vista de paises
    return view('paises')->with("paises" , $paises);

});

Route::get('prueba', function()
{
    return view('productos.new');
});