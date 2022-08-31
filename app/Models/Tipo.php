<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'TIPOORDEN';
    protected $primaryKey = 'ID_TIPO';
    protected $guarded = ['ID_TIPO'];
    public $timestamps = false;

    public function url()
    {
        return $this->ID_TIPO ? 'tipo.update' : 'tipo.store';
    }

    public function method()
    {
        return $this->ID_TIPO ? 'PUT' : 'POST'; 
    }

    public function getRules()
    {
        $rules = [
            'NOMBRE' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|max:30',
        ];
        $mensajes=[
            'NOMBRE.required' => 'El nombre del tipo es obligatorio',
            'NOMBRE.regex' => 'El nombre del tipo debe ser valido',
            'NOMBRE.max' => 'El nombre supera los caracteres permitidos (30)',
        ];
        return compact(['rules', 'mensajes']);
        
    }

}
