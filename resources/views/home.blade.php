@extends('layouts.layouts')
@section('title', trans('main.dashboard'))
@section('header')
<h3><i class="icon-message"></i>{!!trans('main.dashboard') !!}</h3>
@stop
@section('help')
<p class="lead">{!!trans('main.dashboard') !!}</p>
<p>{!!trans('main.area.help') !!}</p>
@stop
@section('content')
  <!--earning graph start-->
  <section class="panel">
      <header class="panel-heading">
          {!!trans('main.dashboard') !!} <span class="tools pull-right">
                 </span>
      </header>
      <div class="panel-body">
          <div id="graph-area" class="main-chart dashboard-height"></div>
      </div>
  </section>
  <!--earning graph end-->
@endsection
