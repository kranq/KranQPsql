@extends('layouts.layouts')
@section('title',trans('main.city.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.city.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.city.title') !!}</p>
    <p>{!!trans('main.city.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.city.update',$city->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('city/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.city.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
