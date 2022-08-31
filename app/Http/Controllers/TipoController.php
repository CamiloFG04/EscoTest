<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index',compact('tipos'));
    }

    public function create()
    {
        $tipo = new Tipo;
        return view('tipos.createdit', compact('tipo'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $tipo = new Tipo;
        $rules = $tipo->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $tipo->fill($data);
        if ($tipo->save()) {
            return redirect()->route('tipo.index')->with('success','El tipo se creo correctamente');
        }else {
            return back()->with('error','No se pudo crear el tipo, intentelo de nuevo');
        }
    }

    public function edit($id)
    {
        $tipo = Tipo::find($id);
        return view('tipos.createdit', compact('tipo'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $tipo = Tipo::find($id);
        $rules = $tipo->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $tipo->fill($data);
        if ($tipo->save()) {
            return redirect()->route('tipo.index')->with('success','El tipo se actualizo correctamente');
        }else {
            return back()->with('error','No se pudo actualizar el tipo, intentelo de nuevo');
        }
    }

    public function destroy($id)
    {
        if (Tipo::destroy($id)) {
            return redirect()->action([TipoController::class,'index'])->with('success','Tipo eliminado correctamente');
        }else {
            return redirect()->back()->with('error','No se pudo eliminar el Tipo, intentelo de nuevo');
        }
    }
}
