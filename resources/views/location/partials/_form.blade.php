<!--main content start-->
<section class="panel">
    <header class="panel-heading">{!! trans('main.location.title') !!}</header>
    <div class="panel-body">
        <div class="position-left">
            
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('city_name',trans('main.city.city_name'),array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">      
                        
                     {!!Form::select('city_id', $cities, @$location->city_id, ['class' => 'form-control', 'placeholder' => 'Select'])!!}
                        
                        @if ($errors->has('city_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('locality_name',trans('main.location.name'),array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        {!! Form::text('locality_name', @$location->locality_name, array('class'=>'form-control', 'placeholder' => 'Enter Locality  Name')) !!}
                        @if ($errors->has('locality_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('locality_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                        {!! Form::label('status',trans('main.location.status'),array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),@$location->status, array('class' => 'form-control dropdown-height' )) !!}
                        @if ($errors->has('status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <button type="submit" class="btn btn-primary">{!! @$btn !!}</button>
                    <a href="{!! route('main.location.index') !!}" class="btn btn-default">{!! trans('main.cancel') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--main content end-->