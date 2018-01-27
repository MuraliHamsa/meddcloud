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
        <small class="pull-right">Date: {{ date("d/m/Y", strtotime($payment->payment_date)) }} </small>
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
        <strong>{{ $payment->patient['name'] }}</strong><br>
        {{ $payment->patient['age'] }} {{'Yrs'}}<br>
        {{ $payment->patient['address'] }}<br>
        {{ $payment->patient->phone }}
      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>INVOICE INFO</p>
      <address>
        Invoice Number: <b>{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</b><br>
        Date: {{ date("d/m/Y", strtotime($payment->payment_date)) }}<br>
        Invoice Status: <b>
          <?php if($payment->status == 1){
           echo 'Paid'; 
          } else { 
            echo 'Un-Paid'; 
          }?>
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
          </tr>
        </thead>
        <tbody>
          @if(!empty($payment->payment_bill_category))
            <?php $i = 1; ?>
            @foreach($payment->payment_bill_category as $category)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $category->payment_category['category']}}</td>
                <td>{{ $category->payment_category['amount']}}</td>
              </tr>
              <?php $i++; ?>
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
          <strong>Sub - Total amount : </strong>{{ $settings->currency }} {{ $payment->amount }}
        </li>

        @if(!empty($payment->discount))                          
          <li>
            <strong>Discount</strong> 
            <?php if($settings->discount == 'percentage') {
              echo '(%) : ';
            } else {
              echo ': ' . $settings->currency;
            }
            if(!empty($payment->flat_discount)) {
              echo $payment->discount . ' % = ' . $settings->currency . ' ' . $payment->flat_discount;
            } else {
              echo $payment->discount;
            } ?>
          </li>
        @endif

        @if(!empty($payment->vat))
          <li>
            <strong>VAT :</strong>   
            @if(!empty($payment->vat))
              {{ $payment->vat }}
            @else 
              {{ '0' }}
            @endif % = {{ $settings->currency }} {{ $payment->flat_vat }} 
          </li>
        @endif
        <li>
          <strong>Grand Total : </strong>
          {{ $settings->currency }} {{ $payment->gross_total }}
        </li>
      </ul>
    </div>
  </div>

  <div class="text-center invoice-btn no-print">
    @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist']) && ($payment->status ==0))
      <a href="{{ route('admin.payment.edit', $payment->id) }}" class="btn btn-info btn-lg invoice_button">
        <i class="fa fa-edit"></i> Edit Payment 
      </a>

      <a href="{{ route('admin.payment.makePaid', $payment->id) }}" class="btn btn-info btn-lg invoice_button">
        <i class="fa fa-edit"></i> Make Paid 
      </a>
    @endif
    <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
  </div>
@endsection