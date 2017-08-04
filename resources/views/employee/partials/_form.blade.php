<!--main content start-->
	<section class="panel">
			<header class="panel-heading">{!! trans('main.employee.title') !!}</header>
			<div class="panel-body">
					<div class="position-left">
							<div class="form-group">
                  <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            {!! Form::label('first_name',trans('main.employee.first_name'),array('class'=>'control-label')) !!}
                        </div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          {!! Form::text('first_name', @$employee->first_name, array('class'=>'form-control', 'placeholder' => 'Enter First Name', 'tabindex' => '1')) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
												</div>
							       </div>
                </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      {!! Form::label('last_name',trans('main.employee.last_name'),array('class'=>'control-label')) !!}
                    </div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        {!! Form::text('last_name', @$employee->last_name, array('class'=>'form-control', 'placeholder' => 'Enter Last Name', 'tabindex' => '2')) !!}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
										</div>
							     </div>
                 </div>
                 <div class="form-group">
                     <div class="row">
                       <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         {!! Form::label('employee_no',trans('main.employee.employee_no'),array('class'=>'control-label')) !!}
                       </div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                           {!! Form::text('emp_no', @$employee->emp_no, array('class'=>'form-control', 'placeholder' => 'Enteer Employee No', 'tabindex' => '2')) !!}
                           @if ($errors->has('emp_no'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('emp_no') }}</strong>
                               </span>
                           @endif
												</div>
									     </div>
                    </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                          {!! Form::label('gender',trans('main.employee.gender'),array('class'=>'control-label')) !!}
                      </div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'),@$employee->gender, array('class' => 'form-control')) !!}
											</div>
							     </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                            {!! Form::label('dob',trans('main.employee.dob'),array('class'=>'control-label')) !!}
                        </div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            {!! Form::text('birth_date', @$employee->birth_date, array('class' => 'form-control', 'id' => 'dob', 'placeholder' => 'YYYY-mm-dd')) !!}
												</div>
								     </div>
              </div>
							<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
											<button type="submit" class="btn btn-primary">{!! @$btn !!}</button>
                      <a href="{!! route('main.employee.index') !!}" class="btn btn-default" tabidex='19'>{!! trans('main.cancel') !!}</a>
									</div>
							</div>
					</div>
			</div>
	</section>
<!--main content end-->
@section('page_js')
  <script type="text/javascript">
      $(function() {
        $('#dob').datetimepicker();
    });
  </script>
@endsection
