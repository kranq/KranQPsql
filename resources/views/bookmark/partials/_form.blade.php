<section class="panel form-horizontal">
    <header class="panel-heading">{!! trans('main.bookmark.title') !!}</header>
    <div class="panel-body">
        <div class="position-left">
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('users',trans('main.bookmark.users'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::select('user_id', @$users, @$bookmark->user_id, array('class'=>'form-control', 'placeholder' => trans('main.selected'), 'tabindex' => '1')) !!}
                    @if ($errors->has('bookmark_code'))
                    <span class="help-block">
                    <strong>{{ $errors->first('bookmark_code') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('serviceprovider',trans('main.bookmark.serviceprovider'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {{-- Form::text('bookmark_name', @$bookmark->service_provider_id, array('class'=>'form-control', 'placeholder' => trans('main.selected'), 'tabindex' => '1')) --}}
                    @if ($errors->has('bookmark_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('bookmark_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('bookmarked_on',trans('main.bookmark.bookmarked_on'),array('class'=>'custom_required')) !!}
                </div>
                <div class="col-lg-6">
                    {!! Form::text('bookmarked_on', @$bookmark->bookmarked_on, array('class'=>'form-control', 'placeholder' => 'dd-mm-YYYY', 'tabindex' => '3', 'id' => 'BookmarkedOn')) !!}
                    @if ($errors->has('bookmark_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('bookmark_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                <button type="submit" class="btn btn-primary" tabindex="4">{!! @$btn !!}</button>
                <a href="{!! route('main.bookmark.index') !!}" class="btn btn-default" tabidex='5'>{!! trans('main.cancel') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--main content end-->
@section('page_js')
<script type="text/javascript">
    
</script>
@endsection
