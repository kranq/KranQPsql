@extends('layouts.layouts')
@section('title',trans('main.employee.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{!!trans('main.employee.title') !!}
    </h3>
@stop
@section('help')
    <p class="lead">{!!trans('main.employee.title') !!}</p>
    <p>{!!trans('main.employee.help') !!}</p>
@stop
@section('content')
    {!! Form::open(array('route' => array('main.employee.update',$employee->id),'method'=>'PUT','class' => 'form-vartical row-border','data-toggle'=>"validator",'files' => true)) !!}
    @include('employee/partials/_form', ['submit_text' => trans('main.editupdate').' '.trans('main.employee.title'),'btn'=>trans('main.update')])
    {!! Form::close() !!}
@stop
