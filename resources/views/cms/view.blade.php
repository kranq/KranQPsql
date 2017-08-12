@extends('layouts.layouts')
@section('title',trans('main.cms.header_title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.cms.header_title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.cms.header_title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
		<div class="form-group">
				<div class="col-sm-3 control-label"> {!! Form::label('title',trans('main.cms.title')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$cms->title; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('slug',trans('main.cms.slug')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$cms->slug; !!}</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label"> {!! 
				Form::label('description',trans('main.cms.description')) !!}</div>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$cms->description; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.cms.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>					
@stop