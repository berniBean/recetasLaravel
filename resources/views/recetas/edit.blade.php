@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Regresar</a>
@endsection

@section( 'content')

<h2 class="text-center mb-5">Editar receta: {{$receta->titulo}}</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.update',['receta'=>$receta->id])}}" enctype="multipart/form-data" novalidate>
                @csrf

                @method('PUT')            
                <div class="form-group">
                    <label for="titulo">Titulo receta</label>

                    <input type="text" 
                           name="titulo" 
                           class="form-control @error('titulo') is-invalid @enderror"
                           id="titulo"
                           placeholder="titulo receta"
                           value="{{$receta->titulo}}"
                           >

                           @error('titulo')
                               <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                               </span>
                           @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>

                    <select 
                        name="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror"
                        id="categoria"
                        >
                        <option value="">---Seleccione---</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" 
                            {{$receta->categoria_id  ==$categoria->id?'selected':''}}
                            >{{$categoria->nombre}}</option>    
                        @endforeach
                        
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                        
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">ingredientes</label>
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{$receta->ingredientes}}">
                    <trix-editor
                        input="ingredientes"
                        class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                        
                    @enderror                    
                </div>
                                
                <div class="form-group mt-3">
                    <label for="preparacion">Preparacion</label>
                    <input id="preparacion" 
                           type="hidden" name="preparacion" 
                           value="{{$receta->preparacion}}">
                    <trix-editor
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                        
                    @enderror                       
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">Elige la imagen</label>
                    
                    <input id="imagen" 
                           type="file" 
                           class="form-control @error('imagen') is-invalid @enderror" 
                           name="imagen">

                           <div class="mt-4">
                                <p>Imagen actual:</p>
                                <img src="/storage/{{$receta->imagen}}" style="width:300px">
                           </div>

                        @error('imagen')
                           <span class="invalid-feedback d-block" role="alert">
                               <strong>{{$message}}</strong>
                           </span>                        
                       @enderror                            
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar receta">
                
                </div>
            </form>
        </div>
        

    </div>
 
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" 
    integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" 
    crossorigin="anonymous" defer></script>
@endsection