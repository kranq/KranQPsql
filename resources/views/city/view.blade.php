@extends('layouts.layouts')
@section('title',trans('main.city.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.city.title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.city.title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
		<div class="form-group">
				<div class="col-sm-3 control-label"> {!! Form::label('city_code',trans('main.city.city_code')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$city->city_code; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('city_name',trans('main.city.city_name')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$city->city_name; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('status',trans('main.city.status')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$city->status; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.city.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>					
@stop