@extends('layouts.layouts')
@section('title',trans('main.address.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!! trans('main.view').' '.trans('main.address.title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.address.title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
			<div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.address.title') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$address->address !!}</p>
				</div>
			</div>
			<div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.address.phone') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$address->phone !!}</p>
				</div>
			</div>
			<div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.address.email') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$address->email !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.address.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
						
@stop