@extends('layouts.layouts')
@section('title',trans('main.cms.header_title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.cms.header_title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.cms.header_title') !!}</p>
    <p>{!!trans('main.cms.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.cms.update',$cms->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('cms/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.cms.header_title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
