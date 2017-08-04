<!--main content start-->
<section class="panel">
	<header class="panel-heading">{!! @$add.' '.trans('main.category.title') !!}</header>
	<div class="panel-body">
        <div class="form-group">
            {!! Form::label('category_name',trans('main.category.category_name'),array('class'=>'control-label col-lg-3 custom_required')) !!}
            <div class="col-lg-6">
                {!! Form::text('category_name', @$category->category_name, array('class'=>'form-control', 'placeholder' => 'Enter Category Name')) !!}
                @if ($errors->has('category_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('slug',trans('main.category.slug'),array('class'=>'control-label col-lg-3 custom_required')) !!}
            <div class="col-lg-6">
                {!! Form::text('slug', @$category->slug, array('class'=>'form-control', 'placeholder' => 'Enter Slug')) !!}
                @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group">
              {!! Form::label('category_image',trans('main.category.category_image'),array('class'=>'control-label col-lg-3')) !!}
            <div class="col-lg-4">
              {{ Form::file('category_image', array('class' => '', 'accept' => trans('main.file_extension'))) }}
            </div>
            <div class="col-lg-3">
                <i  data-original-title="{!! trans('main.image_upload_notes_title') !!}" data-content="{!! trans('main.image_upload_notes') !!}" data-placement="right" data-trigger="hover" class="fa fa-info-circle popovers" aria-hidden="true" data-html="true"></i>
            </div>
        </div>
        @if(@$category->category_image)
        <div class="form-group">
            <div class="col-lg-3 ">
            </div>
            <div class="col-lg-6">
                <a href="#" >
                @if($category->category_image)
                    <img src="{!! URL::to('../uploads/category') !!}/{!! @$category->category_image !!}"  alt="{!! @$category->category_image !!}" width="50px" height="50px" title="{!! @$category->category_image !!}" />
                @endif
                </a>
            </div>    
        </div>
        @endif
        <div class="form-group">
            {!! Form::label('description',trans('main.category.description'),array('class'=>'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::textarea('description', @$category->description, array('class'=>'form-control', 'placeholder' => 'Enter Description', 'rows'=>'2', 'maxlenght' => '1000')) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('order_by',trans('main.category.order_by'),array('class'=>'control-label col-lg-3 custom_required')) !!}
            <div class="col-lg-6">
                {!! Form::selectRange('order_by', 1, 10, @$category->order_by, array('class' => 'form-control dropdown-height', 'placeholder' => trans('main.selected'))) !!}
                @if ($errors->has('order_by'))
                    <span class="help-block">
                        <strong>{{ $errors->first('order_by') }}</strong>
                    </span>
                @endif
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('status',trans('main.category.status'),array('class'=>'control-label col-lg-3 custom_required')) !!}
            <div class="col-lg-6">
                {!! Form::select('status', @$status, @$category->status, array('class' => 'form-control dropdown-height')) !!}
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
                <a href="{!! route('main.category.index') !!}" class="btn btn-default">{!! trans('main.cancel') !!}
                </a>
			</div>
		</div>
	</div>
</section>
<!--main content end-->
