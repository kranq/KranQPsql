@extends('layouts.layouts')
@section('title',trans('main.rating.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.rating.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.rating.title') !!}</p>
    <p>{!!trans('main.rating.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.rating.update',$rating->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('rating/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.rating.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
