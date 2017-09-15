@extends('layouts.layouts')
@section('title',trans('main.address.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.address.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.address.title') !!}</p>
    <p>{!!trans('main.address.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.address.update',$address->id),'method'=>'PUT','class' => 'form-horizontal row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('address/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.address.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
