@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.patient.invoice'))

@section ('contentheader_title', trans('labels.backend.patient.invoice'))
  
@section('after-styles-end')    
<link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print"/>
@stop

@section('invoice')
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> {{ Auth::user()->username }}.
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
        <strong>{{ $patient['name'] }}</strong><br>
        {{ $patient['age'] }} {{'Yrs'}}<br>
        {{ $patient['address'] }}<br>
        {{ $patient->phone }}
      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>INVOICE INFO</p>
      <address>
        Invoice Status: <b>
          <?php if(!empty($payment)){
           echo 'Un-Paid'; 
          } else { 
            echo 'No Due'; 
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
            <th>Date</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($payment))
            <?php $gross_total = $amount = $flat_vat = $discount = 0;?>
            @foreach($payment as $pay)
              <?php $gross_total += $pay->gross_total;
                $amount += $pay->amount;
                $flat_vat += $pay->flat_vat;
                $discount += $pay->flat_discount; 
                $i = 1; ?>
                @foreach($pay->payment_bill_category as $category)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $category->payment_category['category']}}</td>
                    <td>{{ date("d/m/Y", strtotime($pay->payment_date)) }}</td>
                    <td>{{ $category->payment_category['amount']}}</td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
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
          <strong>Sub - Total amount : </strong>{{ $settings->currency }} {{ $amount }}
        </li>

        @if($discount > 0)                          
          <li>
            <strong>Discount : </strong> 
            {{ $discount }}
          </li>
        @endif

        @if($flat_vat > 0)
          <li>
            <strong>VAT :</strong>   
            % = {{ $settings->currency }} {{ $flat_vat }} 
          </li>
        @endif
        <li>
          <strong>Grand Total : </strong>
          {{ $settings->currency }} {{ $gross_total }}
        </li>
      </ul>
    </div>
  </div>

  <div class="text-center invoice-btn no-print">
    @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist']) && ( !empty($payment)) && ($status == 0))
      <a href="{{ route('admin.patient.makePaid', $patient->id) }}" class="btn btn-info btn-lg invoice_button">
        <i class="fa fa-edit"></i> Make Paid 
      </a>
    @endif
    <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
    @if($status == 0)
      <a href="{{ route('admin.patient.invoice', [$patient->id, 2]) }}" class="btn btn-info btn-lg invoice_button"></i> Last Paid Invoice </a>
    @endif
  </div>
@endsection