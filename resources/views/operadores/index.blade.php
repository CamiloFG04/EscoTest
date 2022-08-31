@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="text-center text-muted mb-5">OPERADORES</h1>
                <div class="d-grid gap-2 mb-4">
                    <a href="{{route('operador.create')}}" class="btn btn-success"><i class="bi bi-plus-circle"></i>Agrega un operador</a>
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
                    @foreach ($operadores as $operador)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-3">{{$operador->NOMBRE}}</h5>
                                </div>
                                <div class="card-body d-grid gap-2 col-10 mx-auto">
                                    <a href="{{route('operador.edit',$operador->ID_OPERADOR)}}" class="btn btn-primary text-light">Editar</a>
                                    {!! Form::open(['route'=>['operador.destroy',$operador->ID_OPERADOR],'method'=>'post']) !!}
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