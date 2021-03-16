<!-- The Modal -->
<div class="modal fade" id="myModal{{$experiencia->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">



        {!! Form::open(['method' => 'POST','action'=>'App\Http\Controllers\ComentarioController@store']) !!}

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hacer Comentario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                        {!!Form::label('contenido', 'Comentario')!!}
                        {!!Form::textarea('contenido')!!}
            </div>
                        {!! Form::hidden('experiencia_id',$experiencia->id) !!}
                        {!! Form::hidden('user_id',Auth::user()->id) !!}
            <!-- Modal footer -->
            <div class="modal-footer">
                {!! Form::submit('Comentar',['class'=>'btn btn-info']) !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
