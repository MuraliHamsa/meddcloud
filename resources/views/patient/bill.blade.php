@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.patient.bill'))

@section ('contentheader_title', trans('labels.backend.patient.bill'))
  
@section('after-styles-end')    
<link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print"/>
@stop

@section('invoice')
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h2 class="page-header">
        <strong>{{ $hospital->name }}</strong>
      </h2>
      <address>
        {{ $hospital->address }}<br>
        Tel: {{ $hospital->phone }}
        <h3>{{ trans('labels.backend.patient.bill') }}</h3>
        <small class="pull-right">Date: {{ date("d/m/Y", strtotime($payment->payment_date)) }} </small>
      </address>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td><strong>Name : </strong></td>
            <td>{{ $patient->name }}</td>
            <td colspan="2"></td>
            <td><strong>Bill No. : </strong></td>
            <td>{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</td>
          </tr>
          <tr>
            <td><strong>Pateint ID : </strong></td>
            <td>{{ $patient->patientId }}</td>
            <td><strong> Age / Sex</strong></td>
            <td>{{$patient->age.' Yrs'}} / {{{ ($patient->sex) ?  'Male' : 'Female' }}}</td>
            <td><strong>Bill Date : </strong></td>
            <td>{{ date("d/m/Y", strtotime($payment->payment_date)) }}</td>
          </tr>
          <tr>
            <td><strong>Referrence Doctor : </strong></td>
            <td>{{ $patient->ref_doctor['name'] }}</td>
            <td colspan="4"></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Services</th>
            <th></th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($payment->payment_bill_category))
            <?php $amount = 0;?>
            @foreach($payment->payment_bill_category as $category)
              <?php $amount += $category->payment_category['amount']; ?>
              <tr>
                <td>{{ $category->payment_category['category']}}</td>
                <td></td>
                <td>{{ $category->payment_category['amount']}}</td>
              </tr>
            @endforeach
            <tr>
              <td></td>
              <td><strong>Total amount : </strong></td>
              <td>{{ $amount }}</td>
            </tr>
            <tr>
              <td></td>
              <td><strong>Amount Recieved : </strong></td>
              <td>{{ $amount }}</td>
            </tr>
            <tr>
              <td></td>
              <td><strong>Balance : </strong></td>
              <td>{{ $amount - $amount }}</td>
            </tr>
            <tr>
              <td>Recieved {{ $settings->currency }} {{ $amount }} by Cash</td>
              <td colspan="2"></td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

  <div class="text-center invoice-btn no-print">
    <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
  </div>
@endsection