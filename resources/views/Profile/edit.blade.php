@extends('templates.default')

@section('content')
	<h3>Update Your Profile</h3>

	<div class="row">
                <div class="col-lg-6">
                        <form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">
                                <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group{{ $errors->has('first_name') ?
                                                ' has-error': '' }}">
                                                        <label for="first_name" class="control-label">First name</label>
                                                        <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old(
                                                        'first_name') ?: Auth::user()->first_name }}">
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group{{ $errors->has('last_name') ?
                                                ' has-error': '' }}">
                                                        <label for="last_name" class="control-label">Last name</label>
                                                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old(
                                                        'last_name') ?: Auth::user()->last_name }}">
                                                </div>
                                        </div>
                                </div>
                                <div class="form_group{{ $errors->has('location') ?
                                                ' has-error': '' }}">
                                        <label for="location" class="control-label">Location</label>
                                        <input type="text" name="location" class="form-control" id="location" value="{{ Request::old(
                                                        'location') ?: Auth::user()->location }}">
                                </div>
                                <div class="form-group">
                                        <button tupe="submit" class="btn btn-default">Update</button>
                                </div>
                                <input type="hidden" name="_token"value="{{Session::token()}}">
                        </form>
                </div>
        </div>
@stop