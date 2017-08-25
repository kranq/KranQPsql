<!-- @if ( Session::has('errors') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p>
        <strong>{!! trans('main.validation.form_validation') !!}</strong> {!! trans('main.validation.try_again') !!}
    </p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->

@if ( Session::has('success') )
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{!! trans('main.message') !!}</strong> {{ Session::get('success') }}
</div>
@endif

@if ( Session::has('warning') )
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{!! trans('main.warning') !!}</strong> {{ Session::get('warning') }}
</div>
@endif

@if ( Session::has('error') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{!! trans('main.error') !!}</strong> {{ Session::get('error') }}
</div>
@endif

@if ( Session::has('info') )
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{!! trans('main.info') !!}</strong> {{ Session::get('info') }}
</div>
@endif
