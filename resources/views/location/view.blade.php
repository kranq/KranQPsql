@extends('layouts.layouts')
@section('title',trans('main.location.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.location.title') !!}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
	<header class="panel-heading"> {!! trans('main.view').' '.trans('main.location.title') !!}</header>
	<div class="panel-body">
		<div class="position-left">
			
                    <div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.city.city_name') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$cities[0]->city_name; !!}</p>
				</div>
			</div>
                    
                    <div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.location.title') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$location->locality_name; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<label class=" col-sm-3 control-label">{!! trans('main.location.status') !!}</label>
				<div class="col-lg-6">
					<p class="form-control-static">{!! @$location->status; !!}</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
						<a href="{!! route('main.location.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
						
@stop