<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrab extends Model
{
    use HasFactory;

    protected $table = 'ORDENTRAB';
    protected $primaryKey = 'ID_ORDEN';
    protected $guarded = ['ID_ORDEN'];
    const CREATED_AT = 'FECHA_CREACION';
    const UPDATED_AT = null;

    public function operador()
    {
        return $this->belongsTo(Operador::class,'ID_OPERADOR');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class,'ID_TIPO');
    }

    public function url()
    {
        return $this->ID_ORDEN ? 'orden.update' : 'orden.store';
    }

    public function method()
    {
        return $this->ID_ORDEN ? 'PUT' : 'POST'; 
    }

    public function getRules()
    {
        $rules = [
            'FECHA_ASIGNACION' => 'required|date',
            'FECHA_EJECUCION' => 'required|date|before_or_equal:FECHA_ASIGNACION',
            'ID_TIPO' => 'required',
            'ID_OPERADOR' => 'required',
            'RESULTADO' => 'required|string',
            'VALOR' => 'required|numeric',
        ];
        $mensajes=[
            'FECHA_ASIGNACION.required' => 'La fecha de asignación es requerida',
            'FECHA_ASIGNACION.date' => 'La fecha de asignación debe ser una fecha valida',
            'FECHA_EJECUCION.required' => 'La fecha de ejecución es requerida',
            'FECHA_EJECUCION.date' => 'La fecha de ejecución debe ser un fecha valida',
            'FECHA_EJECUCION.before_or_equal' => 'La fecha de ejecución debe ser menor a la fecha de asignación',
            'ID_TIPO.required' => 'El tipo es requerido',
            'ID_OPERADOR.required' => 'El operador es requerido',
            'RESULTADO.required' => 'El resultado es requerido',
            'VALOR.required' => 'El valor es requerido',
            'VALOR.numeric' => 'El valor debe ser un valor numerico valido',
        ];
        return compact(['rules', 'mensajes']);
        
    }
}
