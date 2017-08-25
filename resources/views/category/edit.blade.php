@extends('layouts.layouts')
@section('title',trans('main.category.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.category.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.category.title') !!}</p>
    <p>{!!trans('main.category.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.category.update',$category->id),'method'=>'PUT','class' => 'form-horizontal row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('category/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.category.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
