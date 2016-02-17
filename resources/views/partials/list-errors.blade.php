<h6>
    @if(count($errors) > 0)
        <div class="alertflash alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
            @foreach($errors->all() as $message)
                <p class="text-danger">{!! $message !!}</p>
            @endforeach
        </div>
    @endif
</h6>