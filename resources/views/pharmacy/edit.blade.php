@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.financial-activities.payment.edit'))

@section ('contentheader_title', trans('labels.backend.financial-activities.payment.edit'))

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.backend.financial-activities.payment.edit') }}</h3>
        </div>
        {!! Form::model($pharmacy,['route' => ['admin.payment.store', $pharmacy->id], 'class' => 'form-horizontal', 'method' => 'PUT' , 'id' => 'pharmacyval']) !!}
          @include('pharmacy._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('after-scripts-end')
  @include('pharmacy._script')
@stop