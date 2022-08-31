<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use App\Models\OrdenTrab;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrdenTrabController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrab::all();
        return view('ordenes.index',compact('ordenes'));
    }

    public function show($id)
    {
        $orden = OrdenTrab::find($id);
        dd($orden->tipo);
    }

    public function create()
    {
        $orden = new OrdenTrab;
        $tipos = Tipo::all()->pluck('NOMBRE','ID_TIPO');
        $operadores = Operador::all()->pluck('NOMBRE','ID_OPERADOR');
        return view('ordenes.createdit', compact('orden','tipos','operadores'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $orden = new OrdenTrab;
        $rules = $orden->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $orden->fill($data);
        if ($orden->save()) {
            return redirect()->route('orden.index')->with('success','La orden se creo correctamente');
        }else {
            return back()->with('error','No se pudo crear la orden, intentelo de nuevo');
        }
    }

    public function edit($id)
    {
        $orden = OrdenTrab::find($id);
        $tipos = Tipo::all()->pluck('NOMBRE','ID_TIPO');
        $operadores = Operador::all()->pluck('NOMBRE','ID_OPERADOR');
        return view('ordenes.createdit', compact('orden','tipos','operadores'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $orden = OrdenTrab::find($id);
        $rules = $orden->getRules();
        $validate = Validator::make($request->all(), $rules['rules'],$rules['mensajes']);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }
        $orden->fill($data);
        if ($orden->save()) {
            return redirect()->route('orden.index')->with('success','La orden se actualizo correctamente');
        }else {
            return back()->with('error','No se pudo actualizar la orden, intentelo de nuevo');
        }
    }

    public function destroy($id)
    {
        if (OrdenTrab::destroy($id)) {
            return redirect()->action([OrdenTrabController::class,'index'])->with('success','Orden eliminada correctamente');
        }else {
            return redirect()->back()->with('error','No se pudo eliminar la orden, intentelo de nuevo');
        }
    }
}
