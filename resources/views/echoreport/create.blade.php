@extends('layouts.app')

@section ('htmlheader_title', 'EchoReport')

@section ('contentheader_title', 'Echology Report')

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ 'Patient Report' }}</h3>
        </div>
        {{ Form::open(['route' => 'admin.echoreport.store', 'class' => 'form-horizontal', 'id' => 'paymentval', 'method' => 'put']) }}
        @include('echoreport._form')
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection



