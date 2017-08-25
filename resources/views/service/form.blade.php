@extends('layouts.layouts')
@section('title',trans('main.service.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.service.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.service.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.service.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('service/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
