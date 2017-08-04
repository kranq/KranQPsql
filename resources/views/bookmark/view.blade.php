@extends('layouts.layouts')
@section('title',trans('main.country.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.country.title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.country.title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
		<div class="form-group">
				<div class="col-sm-3 control-label"> {!! Form::label('country_code',trans('main.country.country_code')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$country->country_code; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('country_name',trans('main.country.country_name')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$country->country_name; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('status',trans('main.country.status')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$country->status; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.country.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
						
@stop