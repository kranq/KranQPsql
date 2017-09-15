@extends('layouts.layouts')
@section('title',trans('main.address.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.address.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.address.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.address.store','class'=>'cmxform form-horizontal', 'accept-charset'=>'utf-8', 'enctype' => 'multipart/form-data')) !!}
	     @include('address/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
