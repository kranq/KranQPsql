@extends('layouts.login')

@section('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
        <h2 class="form-signin-heading">{{ trans('main.sign')}}</h2>
            <div class="login-wrap">
                <div class="user-login-info">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Username" value="admin@kranq.in" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" value="admin123" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button class="btn btn-lg btn-login btn-block" type="submit">{{ trans('main.sign')}}</button>
            </div>
            {{-- old('email') --}}
</form>
@endsection
