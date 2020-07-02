<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class recetasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
       $recetas=['receta pizza','tacos','hamburgesa']; 
       $categorias =['mexicana','Argentima','postres'];
       
       return view('recetas.index')->with('recetas',$recetas)
                                   ->with('categorias',$categorias);
    }
}
