@extends('layouts.app')
@section('heading')
@endsection
@section('content')
    @include ('errors', array('errors' => $errors))
{!! Form::open(['method' => 'POST','action'=>'App\Http\Controllers\ExperienciaController@store','files'=>true]) !!}
<div class="flex items-center justify-center mt-4">
    <div class="col-6">
<table class="table form-group table-hover ">
    <tr>
        <td>{!!Form::label('titulo', 'Titulo')!!}</td>
        <td>{!!Form::text('titulo')!!}</td>
    </tr>
    <tr>
        <td>{!!Form::label('tipoExperiencia_id', 'Tipo de Experiencia')!!}</td>
        <td>{!!Form::select('tipoExperiencia_id', $tipos,null)!!}</td>
    </tr>
    <tr>
        <td>{!!Form::label('archivo_id', 'Archivo')!!}</td>
        <td>{!!Form::file('archivo_id')!!}</td>
    </tr>
    <tr>
        <td>{!!Form::label('visibilidad', 'Visibilidad')!!}</td>
        <td>{!!Form::radio('visibilidad', 0)!!}Publico{!!Form::radio('visibilidad', 1)!!}Privado</td>

    </tr>
    <tr>
        <td>{!!Form::label('categoria_id', 'Categorias')!!}</td>
        <td>{!!Form::select('categoria_id',$categories,1 )!!}</td>
    </tr>
    <tr>
        {!! Form::hidden('user_id',Auth::user()->id) !!}
        <td>{!! Form::submit('Guardar',['class'=>"btn btn-info"]) !!}</td>
    </tr>
</table>
</div>
</div>
{!! Form::close() !!}
@endsection

