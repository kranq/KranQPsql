<section class="panel form-horizontal">
    <header class="panel-heading">{!! @$add.' '.trans('main.provider.title') !!}</header>
    <div class="panel-body">
        <div class="position-left">
            <div class="prf-contacts sttng">
                <h2> Basic Details</h2>
			</div>
            <div class="form-group">
                {!! Form::label('service_provider_name',trans('main.provider.name'),array('class'=>'control-label col-sm-3 custom_required')) !!}
                <div class="col-lg-6">
                    {!! Form::text('name_sp', @$provider->name_sp, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.name')]))) !!}
                      @if ($errors->has('name_sp'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_sp') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
	            {!! Form::label('logo',trans('main.provider.logo'),array('class'=>'control-label col-sm-3')) !!}
                <div class="col-lg-3">
                    {{-- Form::file('logo') --}}
                    <div class="form-group">
                        <div class="controls col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-white btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                {{ Form::file('logo',array('class'=>'default')) }}
                                </span>
                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                            </div>
                        </div>
                    </div>
                    <!--div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="{!! trans('main.default_image_path') !!}" alt="No Image" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 201px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                       <span class="btn btn-white btn-file">
                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                         {{ Form::file('logo',array('class'=>'default')) }}
                       </span>
                        </div>
                    </div -->
                </div>
                <div class="col-sm-3">
                    <i  data-original-title="{!! trans('main.image_upload_notes_title') !!}" data-content="{!! trans('main.image_upload_notes') !!}" data-placement="right" data-trigger="hover" class="fa fa-info-circle popovers" aria-hidden="true" data-html="true"></i>
                </div>
			</div>
            @if(@$provider->logo)
            <div class="form-group">
                <div class="col-sm-3 control-label">
                </div>
                <div class="col-lg-3">
                        <a href="#" >
                        @if($provider->logo)
                            <img src="{!! URL::to('../uploads/provider') !!}/{!! @$provider->logo !!}"  alt="{!! @$provider->logo !!}" title="{!! @$provider->logo !!}" />
                        @endif
                        </a>
                    </div>
                </div>
            </div>
            @endif
            <div class="form-group">
                {!! Form::label('category_id',trans('main.provider.category'),array('class'=>'custom_required col-sm-3 control-label')) !!}
                <div class="col-lg-6">
                    {!!Form::select('category_id', $categories, @$provider->category_id, ['class' => 'form-control', 'placeholder' => 'Select'])!!}
                    @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                        {!! Form::label('city',trans('main.provider.city'),array('class'=>'custom_required col-sm-3 control-label')) !!}
                      <div class="col-lg-6">
                     {!!Form::select('city', $cities, @$provider->city, ['class' => 'form-control', 'placeholder' => 'Select'])!!}

                        @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
            </div>

            <div class="form-group">
                <div class="">
                        {!! Form::label('location_id',trans('main.provider.locality'),array('class'=>'custom_required col-sm-3 control-label')) !!}
                      </div>
                      <div class="col-lg-6">
                     {!!Form::select('location_id', $localities, @$provider->location_id, ['class' => 'form-control', 'placeholder' => 'Select'])!!}
                        @if ($errors->has('location_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location_id') }}</strong>
                        </span>
                        @endif
                    </div>
            </div>
            <div class="form-group">
                    {!! Form::label('address',trans('main.provider.address'),array('class'=>'control-label col-sm-3 ')) !!}
                  <div class="col-lg-6">
                      {!! Form::textarea('address', @$provider->address, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.address')]), 'rows'=>'3', 'maxlenght' => '255')) !!}
                  </div>
               </div>
               <div class="form-group">
                    {!! Form::label('short_description',trans('main.provider.short_description'),array('class'=>'control-label col-sm-3 ')) !!}
                  <div class="col-lg-6">
                      {!! Form::textarea('short_description', @$provider->short_description, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.short_description')]), 'rows'=>'3', 'maxlenght' => '255')) !!}
                  </div>
               </div>
               <div class="form-group">
                    {!! Form::label('googlemap_latitude',trans('main.provider.coordinates'),array('class'=>'control-label col-lg-3')) !!}
					<div class=" col-md-3">
                      {!! Form::text('googlemap_latitude', @$provider->googlemap_latitude, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.latitude')]))) !!}
                        @if ($errors->has('googlemap_latitude'))
                            <span class="help-block">
                                <strong>{{ $errors->first('googlemap_latitude') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class=" col-md-3">
                          {!! Form::text('googlemap_longitude', @$provider->googlemap_longitude, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.longitude')]))) !!}
                          @if ($errors->has('googlemap_longitude'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('googlemap_longitude') }}</strong>
                                  </span>
                              @endif
                            </div>
								</div>
                <div class="form-group">
                    {!! Form::label('status_owner_manager	',trans('main.provider.status_owner_manager'),array('class'=>'control-label col-lg-3')) !!}
					<div  class="col-lg-6" >
                          {{ Form::radio('status_owner_manager', 'Owner', true, ['class' => 'field']) }} Yes
                          {{ Form::radio('status_owner_manager', 'Manager', false, ['class' => 'field']) }} No
                        </div>
				</div>
                    <div class="form-group">
                      {!! Form::label('open_close_hours	',trans('main.provider.open_close_hours'),array('class'=>'control-label col-lg-3')) !!}
						<div  class="col-lg-6">
						    <div class="col-md-4">
                                {!!Form::select('opening_hrs', $opening_hrs, @$provider->opening_hrs, ['class' => 'form-control', 'placeholder' => 'Select'])!!}
							</div>
							<div class="col-md-1 text-center">  to </div>
                        <div class="col-md-4">
                          {!!Form::select('closing_hrs', $closing_hrs, @$provider->closing_hrs, ['class' => 'form-control', 'placeholder' => 'Select'])!!}
														</div>
												</div>
										</div>
                        <div class="form-group">
                          {!! Form::label('working_days	',trans('main.provider.working_days'),array('class'=>'control-label col-sm-3')) !!}
                            <div class="col-sm-9 zero">
                                <div class="col-sm-2 check4 checkbox">
                                    <label class="checkbox-inline">
                                         <input type="checkbox" name="selecctall"  id="selecctall" value="" tabindex="9">
                                         Check All </label>
                                 </div>
                                <div class="col-sm-10 check1 checkbox checkbox_type">
                                    <?php foreach ($working_days as $row): ?>
                                         <label class="checkbox-inline">
                                             {!! Form::checkbox('working_days[]', @$row, in_array(@$row, @$selected_working_days), ['class' => 'checkbox_type']) !!}
                                             <?php echo $row; ?> </label>
                                    <?php endforeach; ?>
                                 </div>
                             </div>
                         </div>
                        <div class="form-group">
                            {!! Form::label('phone',trans('main.provider.phone'),array('class'=>'control-label col-sm-3')) !!}
                            <div class="col-lg-6">
                                {!! Form::text('phone', @$provider->phone, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.phone')]))) !!}
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('website_link',trans('main.provider.website_link'),array('class'=>'control-label col-sm-3')) !!}
                            <div class="col-lg-6">
                                {!! Form::text('website_link', @$provider->website_link, array('class'=>'form-control', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.website_link')]))) !!}
                                @if ($errors->has('website_link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website_link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="prf-contacts sttng">
														<h2> Account Details</h2>
												</div>
                        <div class="form-group">
                                {!! Form::label('email',trans('main.provider.email'),array('class'=>'control-label col-lg-3 custom_required')) !!}
                            <div class="col-lg-6">
                                {!! Form::email('email', @$provider->email, array('class' => 'form-control dropdown-height', 'placeholder' => __(trans('main.placeholder'),['name' => trans('main.provider.email')]))) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('password',trans('main.provider.password'),array('class'=>'control-label col-lg-3 custom_required')) !!}
                            <div class="col-lg-6">
                                {!! Form::password('password', array('class' => 'form-control', 'placeholder' =>  __(trans('main.placeholder'),['name' => trans('main.provider.password')]))) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            <div class="form-group">
                        {!! Form::label('status',trans('main.status'),array('class'=>'custom_required control-label col-lg-3')) !!}
                      <div class="col-lg-6">
                        {!! Form::select('status',$all_status,@$provider->status, array('class' => 'form-control dropdown-height' )) !!}
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
                    <a href="{!! route('main.provider.index') !!}" class="btn btn-default">{!! trans('main.cancel') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--main content end-->
@section('page_js')
<script type="text/javascript">
    $("#selecctall").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
</script>
@endsection
