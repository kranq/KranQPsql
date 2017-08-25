@extends('layouts.layouts')
@section('title',trans('main.country.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.country.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.country.title') !!}</p>
    <p>{!!trans('main.country.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.country.update',$country->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('country/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.country.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
