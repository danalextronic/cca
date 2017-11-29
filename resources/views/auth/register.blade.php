@extends('layouts.app')

@section('content')
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success panel-border">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name * </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control required" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div >
                                <label class="col-md-4 control-label">Last Name * </label>

                                <div class="col-md-6">
                                    <input type="text" value="{{ old('lastName') }}" class="form-control required" name="lastName">

                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address * </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control required" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password * </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control required" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password * </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control required" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div >
                                <label class="col-md-4 control-label"> Company</label>

                                <div class="col-md-6">
                                    <input type="text" value="{{ old('contractorCompany') }}" class="form-control" name="contractorCompany">

                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div >
                                <label class="col-md-4 control-label"> Contact Number</label>

                                <div class="col-md-6">
                                    <input type="text" value="{{ old('contractorContactNumber') }}" class="form-control" name="contractorContactNumber">

                                </div>
                            </div>
                        </div>
                        
                       
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
