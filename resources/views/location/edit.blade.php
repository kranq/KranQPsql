@extends('layouts.layouts')
@section('title',trans('main.location.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.location.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.location.title') !!}</p>
    <p>{!!trans('main.location.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.location.update',$location->id),'method'=>'PUT','class' => 'form-horizontal row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('location/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.location.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
