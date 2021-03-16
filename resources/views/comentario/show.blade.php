<!-- The Modal -->
<div class="modal fade" id="myModalVer{{$experiencia->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">



        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Comentarios</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            @foreach($comentarios->where('experiencia_id',$experiencia->id) as $comentario)
            <!-- Modal body -->
            <div class="modal-body">
                <div class="media border p-3">
                    <img src="/images/ThelmoParole.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h4>{{$comentario->user->name}} <small><i>{{$comentario->created_at->format('h:i d-m-y')}}</i></small></h4>
                        <p>{{$comentario->contenido}}</p>
                    </div>
                </div>

            </div>
            @endforeach



        </div>
    </div>
</div>
