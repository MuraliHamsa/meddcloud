@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.financial-activities.payment.create'))

@section ('contentheader_title', trans('labels.backend.financial-activities.payment.create'))

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.backend.financial-activities.payment.create') }}</h3>
        </div>
        {{ Form::open(['route' => 'admin.payment.store', 'class' => 'form-horizontal', 'id' => 'paymentval', 'method' => 'put']) }}
          @include('payment._form')
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection

@section('after-scripts-end')
  @include('payment._script')
@stop