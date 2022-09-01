<?php

namespace App\Imports;

use App\Models\OrdenTrab;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OrdenImport implements ToCollection, WithHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param Collection $row
    *
    */
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $row) {
            $data = [
                'FECHA_CREACION' => $row['fecha_creacion'],
                'FECHA_ASIGNACION' => $row['fecha_asignacion'],
                'FECHA_EJECUCION' => $row['fecha_ejecucion'],
                'ID_TIPO' => $row['id_tipo'],
                'ID_OPERADOR' => $row['id_operador'],
                'RESULTADO' => $row['resultado'],
                'VALOR' => $row['valor'],
            ];
            OrdenTrab::create($data);
        }
    }
    public function rules(): array
    {
        return [
            'fecha_creacion' => 'required|date',
            'fecha_asignacion' => 'required|date',
            'fecha_ejecucion' => 'required|date',
            'id_tipo' => 'required',
            'id_operador' => 'required',
            'resultado' => 'required|string',
            'valor' => 'required|numeric',
        ];
    }

    public function customValidationMessages()
{
    return [
        'fecha_creacion.required' => 'La fecha de creacion es requerida',
        'fecha_creacion.date' => 'La fecha de creacion debe ser una fecha valida',
        'fecha_asignacion.required' => 'La fecha de asignación es requerida',
        'fecha_asignacion.date' => 'La fecha de asignación debe ser una fecha valida',
        'fecha_ejecucion.required' => 'La fecha de ejecución es requerida',
        'fecha_ejecucion.date' => 'La fecha de ejecución debe ser un fecha valida',
        'id_tipo.required' => 'El tipo es requerido',
        'id_operador.required' => 'El operador es requerido',
        'resultado.required' => 'El resultado es requerido',
        'valor.required' => 'El valor es requerido',
        'valor.numeric' => 'El valor debe ser un valor numerico valido',
    ];
}
}
