<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperadorController extends Controller
{
    public function index()
    {
        $operadores = Operador::all();
        return view('operadores.index',compact('operadores'));
    }

    public function create()
    {
        $operador = new Operador;
        return view('operadores.createdit', compact('operador'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $operador = new Operador;
        $rules = $operador->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $operador->fill($data);
        if ($operador->save()) {
            return redirect()->route('operador.index')->with('success','El operador se creo correctamente');
        }else {
            return back()->with('error','No se pudo crear el operador, intentelo de nuevo');
        }
    }

    public function edit($id)
    {
        $operador = Operador::find($id);
        return view('operadores.createdit', compact('operador'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $operador = Operador::find($id);
        $rules = $operador->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $operador->fill($data);
        if ($operador->save()) {
            return redirect()->route('operador.index')->with('success','El operador se actualizo correctamente');
        }else {
            return back()->with('error','No se pudo actualizar el operador, intentelo de nuevo');
        }
    }

    public function destroy($id)
    {
        // //se obtiene el hotel
        // $operador = Operador::find($id);
        // //obtenemos las habitaciones del hotel
        // $rooms = $hotel->room;
        // //validamos si existen habitaciones asignadas al hotel, si es asi se eliminan
        // if (count($rooms)!=0) {
        //     foreach ($rooms as $room) {
        //         Room::destroy($room->id);
        //     }
        // }
        //Se intenta eliminar el hotel, si se elimina correctamente enviamos una respuesta con un mensaje.
        if (Operador::destroy($id)) {
            return redirect()->action([OperadorController::class,'index'])->with('success','Operador eliminado correctamente');
        }else {
            return redirect()->back()->with('error','No se pudo eliminar el operador, intentelo de nuevo');
        }
    }
}
