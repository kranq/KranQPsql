@extends('layouts.layouts')
@section('title',trans('main.service.title'))
@section('header')
<h3>
    <i class="icon-message"></i>{!!trans('main.service.title') !!}
</h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel form-horizontal">
    <header class="panel-heading"> {!! trans('main.view').' '.trans('main.service.title') !!}</header>
    <div class="panel-body">
        <div class="position-left">		
            <div class="form-group">
                <div class="col-sm-3 control-label"> {!! 
                    Form::label('service_name',trans('main.service.service_name')) !!}</div>
                <div class="col-lg-6">
                    <p class="form-control-static">{!! @$service->service_name; !!}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label"> {!! 
                    Form::label('status',trans('main.service.status')) !!}</div>
                <div class="col-lg-6">
                    <p class="form-control-static">{!! @$service->status; !!}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <a href="{!! route('main.service.index') !!}" class="btn btn-default">{!! trans('main.back') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>					
@stop