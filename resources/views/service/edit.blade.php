@extends('layouts.layouts')
@section('title',trans('main.service.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.service.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.service.title') !!}</p>
    <p>{!!trans('main.service.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.service.update',$service->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('service/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.service.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
