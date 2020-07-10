<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //campos que se agregarán
    protected $fillable = [
        'titulo', 
        'preparacion', 
        'ingredientes', 
        'imagen', 
        'categoria_id'
    ];
    //obtiene la categoria de la receta via llave foranea
    public function categoria()
    {
        return $this -> belongsTo(CategoriaReceta::class);
    }

    //obtiene la informacion del usuario via FK
    public function autor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
