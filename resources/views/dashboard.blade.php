@extends('layouts.app')
@section('heading')

    <div class="row" style="margin-bottom:20px;">
        <div class="col-md-12">
            {!! Form::model($request, ['url' => url('experiencia'), 'method' => 'get']) !!}
            <div class="input-group">
                {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

                <div class="input-group-btn">
                    <button class="btn btn-info" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <a href="{{url('experiencia/create')}}" class="btn btn-info">SUBIR EXPERIENCIA</a>
        </div>


        <div class="row justify-content-around">
            @if($experiencias)
                @foreach($experiencias as $experiencia)
                    <div class="col-3 ">
                        <div class="card m-5" style="width: 18rem;">
                            @if ((($experiencia->extencionArchivo())=="jpg")||(($experiencia->extencionArchivo())=="png")||(($experiencia->extencionArchivo())=="jpeg"))
                                <img class="card-img-top" src="/images/{{$experiencia->archivo->ruta_archivo}}" alt="Card image cap">
                            @elseif((($experiencia->extencionArchivo())=="glb")||(($experiencia->extencionArchivo())=="gltf"))

                                <model-viewer class="card-img-top" autoplay ar shadow-intensity="1" src="/images/{{$experiencia->archivo->ruta_archivo}}" alt="{{$experiencia->titulo}}" auto-rotate camera-controls></model-viewer>
                            @else

                                <img src="" alt="Card image cap">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{$experiencia->titulo}}</h5>
                                <p><small>{{Auth::user()->name}}</small></p>
                                <div class="card-body">
                                    <a href="{{url('experiencia/'.$experiencia->id)}}" target="_blank" class="btn btn-info"> Ver</a>
                                    <a href="{{url('experiencia/descargar/'.$experiencia->id.'')}}" class="btn btn-info">Descargar</a>

                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @switch($experiencia->tipoExperiencia_id)
                                    @case(1)
                                    <li class="list-group-item">VR</li>
                                    @break

                                    @case(2)
                                    <li class="list-group-item">AR</li>
                                    @break

                                    @default
                                    <li class="list-group-item">MR</li>
                                @endswitch
                                @if($experiencia->visibilidad ===0)
                                    <li class="list-group-item">Publico</li>
                                @else
                                    <li class="list-group-item">Privado</li>
                                @endif
                                <li class="list-group-item">{{$experiencia->categoria->nombre}}</li>
                            </ul>
                            <div class=" align-items-end ">
                        {!! Form::model($experiencia,['method'=>'DELETE','action'=>['App\Http\Controllers\ExperienciaController@destroy',$experiencia->id]]) !!}
                            {!! Form::submit('Eiminar',['class'=>"btn btn-danger float-right "]) !!}
                            {!! Form::close() !!}
                        </div>
                        </div>
                    </div>

                @endforeach
            @endif


            @include('pagination', ['pagination' => $experiencias])
        </div>
        @endsection
    </div>


