@extends('layouts.app')

@section ('contentheader_title', trans('labels.backend.settings.management'))

@section('main-content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.backend.settings.management') }}</h3>
        </div>
        {{ Form::open(['route' => 'admin.updateSettings', 'class' => 'form-horizontal', 'id' => 'settingsval', 'method' => 'post']) }}
          
        <div class="box-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.system_vendor') }} 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              {{ Form::text('system_vendor', @$settings->system_vendor, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.system_vendor')]) }}
            </div>
          </div>
        
           <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.title') }} 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              {{ Form::text('title', @$settings->title, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.title')]) }}
            </div>
          </div>
              
           <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.address') }} 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              {{ Form::text('address', @$settings->address, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.address')]) }}
            </div>
          </div>     
          <div class="form-group">
          <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.phone') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              {{ Form::text('phone', @$settings->phone, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.phone')]) }}
            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.email') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              {{ Form::text('email', @$settings->email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.email')]) }}
            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.currency') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              {{ Form::text('currency', @$settings->currency, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.currency')]) }}
            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.settings.discount') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              {{ Form::select('discount', array('1' => 'Percentage(%)', '2' => 'Flat'), @$settings->discount, ['class' => 'form-control']) }}
            </div>
          </div>

          {{ Form::hidden('id', @$settings->id) }}

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
     
    $("#settingsval").validate({
      rules: {
        system_vendor: {
          required: true
        },
        title: {
          required: true
        },
        address: {
          required: true,
          minlength : 5,
        },
        phone: {
          required : true,
          digits: true
        },
        email: {
          required: true,
          email: true          
        },
        currency: { 
          required: true
        },
        discount: {
          required: true
        }

      },
      messages: {
        system_vendor: {
          required: "Please enter system name"
        },
        title: {
          required: "Please enter title"
        },
        address: {
          required: "Please enter address"
        },
        phone: {
          required: "Please enter valid phone",
          digits: "Phone number should contain only numbers"
        },
        email: {
          required: "Please enter email",
          email: "Please enter valid email"
        },
        currency: {
          required: "Please enter currency"
        },
        discount: {
          required: "Please select discount type"
        }
      }
    });

  });
  </script>
@stop