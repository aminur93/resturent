@if ($errors->any())

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
                <i class="material-icons">close</i>
            </button>
            <span> <b> Danger - </b> {{ $error }} </span>
        </div>
    @endforeach

@endif

@if (Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{!! session('flash_message_error') !!}</strong>
    </div>
@endif

@if (Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
@endif