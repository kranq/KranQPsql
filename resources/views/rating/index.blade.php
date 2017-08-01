@extends('layouts.layouts')
@section('title',trans('main.rating.title'))
@section('header')
<h3><i class="icon-message"></i>{!!trans('main.rating.title') !!}</h3>
@stop
@section('help')
<p class="lead">{!!trans('main.rating.title') !!}</p>
<p>{!!trans('main.area.help') !!}</p>
@stop
@section('content')
  <!--earning graph start-->
    <section class="panel">
        <header class="panel-heading"><b>{{ trans('main.rating.title') }}</b>
            <span class="tools pull-right">
              <div class="form-group btn-toolbar">
                  <!-- <a class="btn btn-primary" href="{{ route('main.rating.create') }}">
                  	<i class="visible-xs glyphicon glyphicon-plus"></i>
					             <div class="hidden-xs"></i>{!! trans('main.add').' '.trans('main.rating.rating') !!}</div>
                  </a> -->
               </div>
            </span>
        </header>
        <div class="panel-body">
            <div id="graph-area" class="main-chart">
                  {!! @$grid->make() !!}
            </div>
        </div>
    </section>
  <!--earning graph end-->
@endsection
