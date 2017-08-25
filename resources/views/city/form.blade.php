@extends('layouts.layouts')
@section('title',trans('main.city.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.city.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.city.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.city.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('city/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
