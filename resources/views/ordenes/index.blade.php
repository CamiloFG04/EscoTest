@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="text-center text-muted mb-5">Ordenes</h1>
                <div class="d-grid gap-2 mb-4">
                    <a href="{{route('orden.create')}}" class="btn btn-success"><i class="bi bi-plus-circle"></i>Agrega una orden</a>
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
                </div>
                <div class="row">
                    @foreach ($ordenes as $orden)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-3"><a href="{{route('orden.show',$orden->ID_ORDEN)}}" class="link-primary">{{$orden->FECHA_ASIGNACION}}-{{$orden->FECHA_EJECUCION}}</a></h5>
                                </div>
                                <ul class="list-group list-group-flush">
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
@endsection