@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="text-center text-muted mb-5">Ordenes</h1>
                <div class="d-grid gap-2 mb-4">
                    <a href="{{route('orden.create')}}" class="btn btn-success"><i class="bi bi-plus-circle"></i>Agrega una orden</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#excelImport">Importar desde excel</button>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @foreach ($ordenes as $orden)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-title text-center mb-3">Ejecucion / Asignacion</p>
                                    <h5 class="card-title text-center mb-3">{{$orden->FECHA_EJECUCION}} / {{$orden->FECHA_ASIGNACION}}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Fecha de creación: {{$orden->FECHA_CREACION->todatestring()}}</li>
                                    <li class="list-group-item">Tipo: {{$orden->tipo->NOMBRE}}</li>
                                    <li class="list-group-item">Operador: {{$orden->operador->NOMBRE}}</li>
                                    <li class="list-group-item">Resultado: {{$orden->RESULTADO}}</li>
                                    <li class="list-group-item">Valor: <span class="badge bg-primary">{{$orden->VALOR}}</span></li>
                                </ul>
                                <div class="card-body d-grid gap-2 col-10 mx-auto">
                                    <a href="{{route('orden.edit',$orden->ID_ORDEN)}}" class="btn btn-primary text-light">Editar</a>
                                    {!! Form::open(['route'=>['orden.destroy',$orden->ID_ORDEN],'method'=>'post']) !!}
                                        @method('DELETE')
                                        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger text-light']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL PARA AGREGAR HABITACIONES --}}
    <div class="modal fade" id="excelImport" tabindex="-1" role="dialog" aria-labelledby="excelImportLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Importa ordenes de un excel</h5>
              <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <span>El archivo de excel a importar debe tener este formato:</span>
                <ul>
                    <li>FECHA_CREACION</li>
                    <li>FECHA_ASIGNACION</li>
                    <li>FECHA_EJECUCION</li>
                    <li>ID_TIPO</li>
                    <li>ID_OPERADOR</li>
                    <li>RESULTADO</li>
                    <li>VALOR</li>
                </ul>
                <span>Por favor el titulo de las columnas del array debe de ser el mismo que se muestra arriba, asi mismo el orden igual. El tipo de valor de las columnas de excel debe de ser "texto"</span>
                <p class="text-info">*Para el tipo y operador por favor poner el número id que se muestra en la seccion respectiva de cada modulo y para las fechas el formato es (aaaa/mm/dd)*</p>
                {!! Form::open(['route'=>'orden.excel', 'method'=>'POST','files' => true]) !!}
                    @csrf
                    <div class="mb-3">
                        {!! Form::label('fileImp', 'Archivo') !!}
                        {!! Form::file('fileImp', ['class'=>'form-control','accept'=>'.xlsx,.xls,.csv']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::submit('Importar', ['class'=>'btn btn-primary text-light']) !!}
                        {!! Form::button('Cerrar', ['class'=>'btn btn-secondary text-light','data-bs-dismiss'=>'modal']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
@endsection