@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.financial-activities.financial-report.title'))

@section ('contentheader_title', trans('labels.backend.financial-activities.financial-report.title'))
      
@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          {{ Form::open(['route' => 'admin.financial-report.search', 'class' => 'form-horizontal', 'method' => 'post']) }}
            <div class="form-group">
              <label class="col-lg-2 control-label">
                {{ trans('labels.backend.financial-activities.financial-report.from') }} 
              </label>
              <div class="col-lg-2">
                {{ Form::text('from_date', @$input['from_date'], ['class' => 'form-control datepicker', 'placeholder' => trans('labels.backend.financial-activities.financial-report.from')]) }}
              </div>
              <label class="col-lg-2 control-label">
                {{ trans('labels.backend.financial-activities.financial-report.to') }} 
              </label>
              <div class="col-lg-2">
                {{ Form::text('to_date', @$input['to_date'], ['class' => 'form-control datepicker', 'placeholder' => trans('labels.backend.financial-activities.financial-report.to')]) }}
              </div>

              {{ Form::submit('Search', ['class' => 'btn btn-info']) }}

            {{ Form::close() }}
          </div>
        </div>
        
        <div class="box-body">
          <div class="row">
            <div class="col-lg-7">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-primary">
                    <th colspan="3" style="text-align:center; font-size:20px;"> 
                      {{ trans('labels.backend.financial-activities.financial-report.table.payment') }}  
                      @if(!empty($input))
                        {{ 'From' }} {{ $input['from_date'] }} {{ 'To' }} {{ $input['to_date'] }}
                      @endif
                    </th>
                  </tr>
                  <tr>
                    <th> {{ trans('labels.backend.financial-activities.financial-report.table.category') }} </th>
                    <th> {{ trans('labels.backend.financial-activities.financial-report.table.amount') }} </th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($payment_category))
                    <?php $total = $flat_discount = $flat_vat = 0; ?>
                    @foreach($payment_category as $category)
                      <?php $amount = 0; ?>
                      @if(!empty($payment))
                        @foreach($payment as $pay)
                          @if($category->id == $pay->payment_category_id)
                            <?php $amount = $pay->amount;
                              $flat_discount = $pay->flat_discount;
                              $flat_vat = $pay->flat_vat;
                              $total += $amount;
                            ?>
                          @endif
                        @endforeach
                      @endif 

                      <tr>
                        <td> {{ $category->category }} </td>
                        <td> {{ $settings->currency }}  {{ $amount }} </td>
                      </tr>
                    @endforeach
                    <tr>
                      <td>
                        <h3> 
                          {{ trans('labels.backend.financial-activities.financial-report.table.sub_total') }} 
                        </h3>
                      </td>
                      <td> {{ $settings->currency }}  {{ $total }} </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>
                          {{ trans('labels.backend.financial-activities.financial-report.table.total_discount') }} 
                        </h5>
                      </td>
                      <td>{{ $settings->currency }} {{ $flat_discount }}</td>
                    </tr>
                    <tr>
                      <td>
                        <h5>
                          {{ trans('labels.backend.financial-activities.financial-report.table.total_vat') }}
                        </h5>
                      </td>
                      <td>{{ $settings->currency }} {{ $flat_vat }}</td>
                    </tr>
                    <tr>
                    </tr>
                  @endif
                </tbody>
              </table>

              <table class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-primary">
                    <th colspan="3" style="text-align:center; font-size:20px;"> 
                      {{ trans('labels.backend.financial-activities.financial-report.table.expense') }} 
                    </th>
                  </tr>
                  <tr>
                    <th> {{ trans('labels.backend.financial-activities.financial-report.table.category') }} </th>
                    <th> {{ trans('labels.backend.financial-activities.financial-report.table.amount') }} </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $gross_expense = 0; ?>
                  @if(!empty($expense_category))
                    @foreach($expense_category as $ecategory)
                      <?php $eamount = 0; ?>
                      @if(!empty($expense))
                        @foreach($expense as $exp)
                          @if($ecategory->id == $exp->expense_category_id)
                            <?php $eamount = $exp->amount; 
                            $gross_expense += $eamount; ?>
                          @endif
                        @endforeach
                      @endif 
                      <tr>
                        <td> {{ $ecategory->category }} </td>
                        <td>{{ $settings->currency }} {{ $eamount }}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    {{ trans('labels.backend.financial-activities.financial-report.gross_payment') }}
                  </span>
                  <?php $gross = $total - $flat_discount + $flat_vat; ?>
                  <span class="info-box-number"> {{ $settings->currency }} {{ $gross }}
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    {{ trans('labels.backend.financial-activities.financial-report.gross_expense') }}
                  </span>
                  <span class="info-box-number">{{ $settings->currency }} {{ $gross_expense }}</span>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                  {{ trans('labels.backend.financial-activities.financial-report.profit') }}
                  </span>
                  <span class="info-box-number">{{ $settings->currency }} {{ $gross - $gross_expense }}</span>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('after-scripts-end')
  <script type="text/javascript">
    $('.datepicker').datepicker();
  </script>
@stop