@extends('layouts.layouts')
@section('title',trans('main.provider.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.provider.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.provider.title') !!}</p>
    <p>{!!trans('main.provider.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.provider.update',$provider->id),'method'=>'PUT','class' => 'form-horizontal row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('service_provider/form', ['submit_text' => trans('main.editupdate').' '.trans('main.provider.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
