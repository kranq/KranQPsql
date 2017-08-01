@extends('layouts.layouts')
@section('title',trans('main.location.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.location.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.location.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.location.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'enctype' => 'multipart/form-data')) !!}
	     @include('location/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
