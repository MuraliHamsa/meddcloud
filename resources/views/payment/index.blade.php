@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.financial-activities.payment.title'))

@section ('contentheader_title', trans('labels.backend.financial-activities.payment.title'))

@section('after-styles-end')
    {{ Html::style("css/plugin/datatables/dataTables.bootstrap.min.css") }}

@stop

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="{{route('admin.payment.create')}}">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              {{ trans('labels.backend.financial-activities.payment.create') }}
            </button>
          </a>
        </div>

        <div class="box-body">
          <table id="payment-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.patient') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.date') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.sub_total') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.discount') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.vat') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.total') }} </th>
                <th> {{ trans('labels.backend.financial-activities.payment.table.status') }} </th>
                <th> {{ trans('labels.general.actions') }} </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('popup-content')
  @include('includes.modal')
@stop

@section('after-scripts-end')
    {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.bootstrap.min.js") }}


  <script>
    $(function() {

      $('#payment-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.payment.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: true, sortable: false},
          {data: 'patient.name', name: 'patient.name'},
          {data: 'payment_date', name: 'payment_date'},
          {data: 'amount', name: 'amount'},
          {data: 'flat_discount', name: 'flat_discount'},
          {data: 'flat_vat', name: 'flat_vat'},
          {data: 'gross_total', name: 'gross_total'},
          {data: 'status', name: 'status'},
          {data: 'actions', name: 'actions', searchable: false, sortable: false}
        ],
        order: [[0, "asc"]],
        searchDelay: 500
      });

    });

    $(document).ready(function () {

      $('#payment-table').on('click', '.delete-payment', function(f){
        f.preventDefault(f);

        $('#confirmDelete').on('show.bs.modal', function (e) {
          $message = $(e.relatedTarget).attr('data-message');
          $(this).find('.modal-body p').text($message);
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form reference to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);

        });

        <!-- Form confirm (yes/ok) handler, submits form -->
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });

      });

    });

  </script>

@stop
