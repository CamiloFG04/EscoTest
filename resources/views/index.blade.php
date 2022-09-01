@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="text-center text-muted mb-5">ESCO</h1>
                <div class="row">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No. Orden</th>
                                <th scope="col">F.Creación</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">F.Asignación</th>
                                <th scope="col">F.Ejecución</th>
                                <th scope="col">Operador</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">Valor</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordenes as $orden)
                                <tr>
                                  <th scope="row">{{$orden->ID_ORDEN}}</th>
                                  <td>{{$orden->FECHA_CREACION}}</td>
                                  <td>{{$orden->tipo->NOMBRE}}</td>
                                  <td>{{$orden->FECHA_ASIGNACION}}</td>
                                  <td>{{$orden->FECHA_EJECUCION}}</td>
                                  <td>{{$orden->operador->NOMBRE}}</td>
                                  <td>{{$orden->RESULTADO}}</td>
                                  <td>{{$orden->VALOR}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection