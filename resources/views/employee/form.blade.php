@extends('layouts.layouts')
@section('title',trans('main.employee.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.employee.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.employee.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.employee.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('employee/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
