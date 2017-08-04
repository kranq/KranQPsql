@extends('layouts.layouts')
@section('title',trans('main.rating.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.rating.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.rating.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.rating.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('rating/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
