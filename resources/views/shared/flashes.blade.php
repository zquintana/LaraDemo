<div class="flash-message">
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endforeach
    @endif
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))

            <p class="alert alert-{{ $msg }}">{!! Session::get($msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>
<!-- /.flash-message -->