@if(Session::has('success'))
   <div class="alert alert-success" role="alert">
   		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4> {{ Session::get('success') }} </h4>
    </div>
@endif