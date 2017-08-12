@extends('layouts.layouts')
@section('title',trans('main.provider.title'))
@section('header')
    <h3>
        <i class="icon-message"></i>{{trans('main.provider.title') }}
    </h3>
@stop
@section('content')
<!--sidebar end-->
<section class="panel">
<header class="panel-heading"> {{ trans('main.view').' '.trans('main.provider.title') }} - {{ @$provider->name_sp }}</header>
    <header class="panel-heading tab-bg-dark-navy-blue">
        <ul class="nav nav-tabs nav-justified ">
            <li class="active">
                <a data-toggle="tab" href="#overview">
                    {{ trans('main.provider.basicdetails') }}
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#job-history">
                    {{ trans('main.provider.services') }}
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#contacts" class="contact-map">
                    {{ trans('main.provider.reviews') }}
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#settings">
                    {{ trans('main.provider.ratings') }}
                </a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content tasi-tab">
            <div id="overview" class="tab-pane active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="prf-contacts sttng">
                            <h2>{!! trans('main.provider.basicdetails') !!}</h2>
                        </div>
                        <div class="form cmxform form-horizontal">
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.name') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->name_sp }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.logo') }}</label>
                                <div class="col-lg-6">
                                @php //echo '<pre>';print_r($provider->logo);exit;@endphp
                                    @if(!empty(@$provider->logo))
                                        <img src="{{ URL::to('../uploads/provider') }}/{!! @$provider->logo !!}">
                                    @else
                                        <img src="{{ URL::to('/images/noimage.jpg') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.category') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->category_id }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.phone') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->phone }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.city') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->city }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.locality') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->location_id }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.address') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->address }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.status_owner_manager') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->status_owner_manager }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.open_close_hours') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->opening_hrs }} to
                                     {{ @$provider->closing_hrs }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.working_days') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->working_days }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.phone') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->phone }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.website_link') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->website_link }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.coordinates') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->googlemap_latitude }}, {{ @$provider->googlemap_longitude }}</p>
                                </div>
                            </div>
                            <div class="prf-contacts sttng">
                                <h2>{!! trans('main.provider.accountdetails') !!}</h2>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.email') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->email }}</p>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.password') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->password }}</p>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.provider.submittedon') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">{{ @$provider->created_date }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">{{ trans('main.status') }}</label>
                                <div class="col-lg-6">
                                    <p class="form-control-static">
                                        @if ( @$provider->status == '1' )
                                            @php echo 'Under Review'; @endphp
                                        @elseif ( @$provider->status == '2' )
                                            @php echo 'Approved'; @endphp
                                        @elseif ( @$provider->status == '3' )
                                            @php echo 'Rejected'; @endphp
                                        @else 
                                            @php echo 'Nil'; @endphp
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="job-history" class="tab-pane ">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('main.provider.services') }}</th>
                                    <th>{{ trans('main.provider.images') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@$service_providers)
                                @php //echo '<pre>';print_r($service_providers);exit; @endphp

                                    @foreach (@$service_providers as $service_provider)
                                        <tr>
                                            <td width="70%">{{ $service_provider->service_description }}</td>
                                           <td width="30%"> <!-- <td>{{ $service_provider->image }}</td> -->
                                                @if(!empty(@$service_provider->image))
                                                    <img src="{{ URL::to('../uploads/service_provider_details') }}/{!! @$service_provider->image !!}" width="50%" height="10%">
                                                @else
                                                    <img src="{{ URL::to('/images/noimage.jpg') }}">
                                                @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="contacts" class="tab-pane ">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">User</th>
                                    <th width="60%">Reviews</th>
                                    <th width="20%">Posted On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@$reviews)
                                    @foreach (@$reviews as $review)
                                        <tr>
                                            <td>{{ $review->username }}</td>
                                            <td>{{ $review->reviews }}</td>
                                            <td>{{ $review->postted_on }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            <div id="settings" class="tab-pane ">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Ratings</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (@$ratings)
                                @foreach (@$ratings as $rating)
                                @php //echo '<pre>';print_r($users);exit; @endphp
                                    <tr class="">
                                        <td>
                                            <p>{{ @$users[$rating->user_id] }}</p>
                                        </td>
                                        <td>
                                            {{ @$rating->rating_value }} 
                                            <?php /*for ($i=0;$i < round($rating->rating_value); $i++)
                                                 echo '&#9733;'; */
                                            ?>
                                        </td>
                                    </tr>
                                @endforeach    
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('main.provider.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
</section>                  
@stop