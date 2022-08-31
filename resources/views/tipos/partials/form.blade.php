{!! Form::model($tipo, ['route'=>[$tipo->url(),$tipo->ID_TIPO], 'method'=>$tipo->method()]) !!}
    @csrf
    <div class="mb-3">
        {!! Form::label('NOMBRE', 'Nombre') !!}
        {!! Form::text('NOMBRE', null, ['class'=>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::submit('Guardar', ['class'=>'btn btn-primary text-light']) !!}
        <a href="{{route('tipo.index')}}" class="btn btn-danger text-light">Cancelar</a>
    </div>
{!! Form::close() !!}