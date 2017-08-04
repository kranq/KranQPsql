
<section class="panel form-horizontal">
    <header class="panel-heading">{!! trans('main.rating.title') !!}</header>
    <div class="panel-body">
        <div class="position-left">
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('serviceprovider',trans('main.rating.serviceprovider'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {{-- Form::select('serviceprovider', '',@$rating->serviceprovider, array('class'=>'form-control', 'placeholder' => trans('main.selected'), 'tabindex' => '1')) --}}
                    @if ($errors->has('serviceprovider'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serviceprovider') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('user',trans('main.rating.user'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('user', @$users, @$rating->user, array('class'=>'form-control', 'placeholder' => trans('main.selected'), 'tabindex' => '2')) !!}
                    @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('status',trans('main.country.status'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),@$category->status, array('class' => 'form-control dropdown-height', 'placeholder' => trans('main.selected'))) !!}
                    @if ($errors->has('status'))
                        <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <button type="submit" class="btn btn-primary">{!! @$btn !!}</button>
                    <a href="{!! route('main.rating.index') !!}" class="btn btn-default" tabidex='19'>{!! trans('main.cancel') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
