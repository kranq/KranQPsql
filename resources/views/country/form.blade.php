@extends('layouts.layouts')
@section('title',trans('main.country.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.country.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.country.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.country.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('country/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
