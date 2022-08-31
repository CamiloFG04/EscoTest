<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    use HasFactory;
    
    protected $table = 'OPERADORES';
    protected $primaryKey = 'ID_OPERADOR';
    protected $guarded = ['ID_OPERADOR'];
    public $timestamps = false;
    
    public function url()
    {
        return $this->ID_OPERADOR ? 'operador.update' : 'operador.store';
    }

    public function method()
    {
        return $this->ID_OPERADOR ? 'PUT' : 'POST'; 
    }

    public function getRules()
    {
        $rules = [
            'NOMBRE' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|max:80',
        ];
        $mensajes=[
            'NOMBRE.required' => 'El nombre del operador es obligatorio',
            'NOMBRE.regex' => 'El nombre del operador debe ser valido',
            'NOMBRE.max' => 'El nombre supera los caracteres permitidos (80)',
        ];
        return compact(['rules', 'mensajes']);
        
    }

}
