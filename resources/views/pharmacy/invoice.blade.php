@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.financial-activities.payment.invoice'))

@section ('contentheader_title', trans('labels.backend.financial-activities.payment.invoice'))

@section('after-styles-end')
<link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print"/>
@stop

@section('invoice')
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> {{ Auth::user()->username }}.
        <small class="pull-right">Date: {{ date("d/m/Y", strtotime($pharmacy->created_at)) }} </small>
      </h2>
    </div>
  </div>

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <p>PAYMENT TO:</p>
      <address>
        <strong>{{ $hospital->name }}</strong><br>
        {{ $hospital->address }}<br>
        Tel: {{ $hospital->phone }}
      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>BILL TO:</p>
      <address>
        <strong>{{ $pharmacy->patient['name'] }}</strong><br>
        {{ $pharmacy->patient['age'] }} {{'Yrs'}}<br>
        {{ $pharmacy->patient['address'] }}<br>
        {{ $pharmacy->patient->phone }}
      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>INVOICE INFO</p>
      <address>
        Invoice Number: <b>{{ str_pad($pharmacy->id, 6, '0', STR_PAD_LEFT) }}</b><br>
        Date: {{ date("d/m/Y", strtotime($pharmacy->created_at)) }}<br>
        Invoice Status: <b>
</b>
      </address>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
@if(!empty($pharmacy->pharmacy_drugs))
<?php $i = 1;?>
@foreach($pharmacy->pharmacy_drugs as $drug)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $drug->medicine['name']}}</td>
                <td>{{ $drug->medicine['price']}}</td>
                <td>{{ $drug->medicine['quantity']}}</td>
              </tr>
<?php $i++;?>
@endforeach
@endif
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 invoice-block pull-right">
      <ul class="unstyled amounts">
        <li>
          <strong>Sub - Total amount : </strong>{{ $settings->currency }} {{ $pharmacy->amount }}
        </li>





    </div>
  </div>


@endsection