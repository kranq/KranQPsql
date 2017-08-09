@extends('layouts.layouts')
@section('title',trans('main.rating.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.rating.title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.rating.title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
		<div class="form-group">
				<div class="col-sm-3 control-label"> {!! trans('main.provider.name_sp') !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$service_providers[0]->name_sp; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! trans('main.user.fullname') !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$user[0]->fullname; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! trans('main.rating.rating_value') !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$rating->rating_value; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.rating.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
						
@stop