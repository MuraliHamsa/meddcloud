@extends('layouts.app')

@section ('htmlheader_title', 'Lab Report')

@section ('contentheader_title', 'Lab Report')

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-header with-border">
          <h3 class="box-title">{{ 'Patient Report' }}</h3>
          </div>
          {{-- {{ Form::open(['route' => 'admin.dischargesummary.store', 'class' => 'form-horizontal', 'id' => 'paymentval', 'method' => 'put']) }} --}}
          @include('labreport._form')
          {{-- {{ Form::close() }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection



