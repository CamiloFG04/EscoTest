{!! Form::model($orden, ['route'=>[$orden->url(),$orden->ID_ORDEN], 'method'=>$orden->method()]) !!}
    @csrf
    <div class="mb-3">
        {!! Form::label('FECHA_ASIGNACION', 'Fecha de asignación') !!}
        {!! Form::date('FECHA_ASIGNACION', null, ['class'=>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('FECHA_EJECUCION', 'Fecha de ejecución') !!}
        {!! Form::date('FECHA_EJECUCION', null, ['class'=>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('ID_TIPO', 'Tipo') !!}
        {!! Form::select('ID_TIPO',$tipos,null,['class'=>'form-select']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('ID_OPERADOR', 'Operador') !!}
        {!! Form::select('ID_OPERADOR',$operadores,null,['class'=>'form-select']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('RESULTADO', 'Resultado') !!}
        {!! Form::textarea('RESULTADO', null, ['class'=>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('VALOR', 'Valor') !!}
        {!! Form::number('VALOR', null, ['class'=>'form-control','step'=>"0.1"]) !!}
    </div>
    <div class="mb-3">
        {!! Form::submit('Guardar', ['class'=>'btn btn-primary text-light']) !!}
        <a href="{{route('orden.index')}}" class="btn btn-danger text-light">Cancelar</a>
    </div>
{!! Form::close() !!}