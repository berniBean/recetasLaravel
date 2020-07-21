@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section( 'content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>
    
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole='col'>Titulo</th>
                    <th scole='col'>Categorias</th>
                    <th scole='col'>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria->nombre}}</td>
                        <td>

                            <eliminar-receta 
                            receta-id={{$receta->id}}>
                                
                            </eliminar-receta>
                            {{-- <form action="{{route('recetas.destroy',['receta'=>$receta->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger mr-1 w-100 mb-2" value="Eliminar &times;">
                            </form> --}}
                            <a href="{{route('recetas.edit',['receta'=> $receta->id])}}" class="btn btn-dark mr-1 d-block mb-2">Editar</a>
                            <a href="{{route('recetas.show',['receta' => $receta->id])}} " class="btn btn-success mr-1 d-block mb-2">Ver</a>
                        </td>
                    </tr>                    
                @endforeach

            </tbody>
        </table>
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{$recetas->links()}}
        </div>
        
        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            <ul class = "list-group">
                @if (count($usuario->meGusta)>0)
                @foreach($usuario->meGusta as $receta)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        
                        <p>{{$receta->titulo}}</p>

                        <a class="btn btn-outline-success text-uppercase font-weight-bold" 
                            href="{{route('recetas.show',['receta' => $receta->id])}}">Ver</a>
                    </li>
                    
                @endforeach
                    
                @else
                    <p class="text-center">Aún no tienes recetas guardadas 
                       <br><small>
                        dale me gusta a las recetas y aparecerán aquí
                           </small>  </p>
                @endif
            </ul>
        </div>
    </div>
@endsection