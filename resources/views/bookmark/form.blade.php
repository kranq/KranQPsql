@extends('layouts.layouts')
@section('title',trans('main.bookmark.title'))
@section('header')
    <h3><i class="icon-message"></i>{{ trans('main.bookmark.title') }}</h3>
@stop
@section('help')
    <p class="lead">{{ trans('main.bookmark.title') }}</p>
@stop
@section('content')
    {!! Form::open( array('route' => 'main.bookmark.store','class'=>'form-vartical', 'accept-charset'=>'utf-8', 'data-toggle' => 'validator')) !!}
	     @include('bookmark/partials/_form', ['submit_text' => trans('main.save') ,'btn'=> trans('main.save')])
    {!! Form::close() !!}
@stop
