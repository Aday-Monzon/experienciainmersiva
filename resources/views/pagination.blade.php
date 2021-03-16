<div class="row">
    <div class="col-md-12 text-center">
        @if (request()->get('q'))
            {!! $pagination->appends(['q' => request()->get('q')])->render() !!}
        @else
            {!! $pagination->render() !!}
        @endif
    </div>
</div>
