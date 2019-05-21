@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.users.title'))

@section ('contentheader_title', trans('labels.backend.users.management'))

@section('main-content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.backend.users.management') }}</h3>
        </div>
        {{ Form::open(['route' => 'admin.updateProfile', 'class' => 'form-horizontal', 'id' => 'profileval', 'method' => 'post']) }}
<?php $cond = '';
if ($group->group['id'] == 1) {
	$cond = "readonly";
}
?>
          <div class="box-body">
            <div class="form-group">
              <label class="col-lg-2 control-label">
                {{ trans('validation.attributes.backend.users.name') }}
                <span class="required">*</span>
              </label>
              <div class="col-lg-6">
                {{ Form::text('name', Auth::user()->username, ['class' => 'form-control', $cond , 'placeholder' => trans('validation.attributes.backend.users.name')]) }}
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">
                {{ trans('validation.attributes.backend.users.email') }}
                <span class="required">*</span>
              </label>
              <div class="col-lg-6">
                {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', $cond , 'placeholder' => trans('validation.attributes.backend.users.email')]) }}
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">
                {{ trans('validation.attributes.backend.users.password') }}
                <span class="required">*</span>
              </label>
              <div class="col-lg-6">
                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.users.password')]) }}
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">
                {{ trans('validation.attributes.backend.users.confirm_password') }}
                <span class="required">*</span>
              </label>
              <div class="col-lg-6">
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.users.confirm_password')]) }}
              </div>
            </div>

          </div>

          <div class="box-footer">
            <a class="btn btn-default" href="{{ route('admin.home') }}">Cancel</a>
            {{ Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) }}
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection

@section('after-scripts-end')
  {{ Html::script("js/jquery.validate.min.js") }}

<script type="text/javascript">
   $(function() {

      $("#profileval").validate({
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          password: {
            minlength : 5,
          },
          password_confirmation: {
            minlength : 5,
            equalTo : "#password"
          }
        },
        messages: {
          name: {
            required: "Please enter name"
          },
          email: {
            required: "Please enter email",
            email: "Please enter valid email"
          },
          password: {
            minlength: "Password should contain minimum 5 characters"
          },
          password_confirmation: {
            minlength: "Password should contain minimum 5 characters",
            equalTo: "Password and Confirm Password are not matching"
          }
        }
      });

    });
  </script>
@stop