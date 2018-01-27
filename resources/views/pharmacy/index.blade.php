@extends('layouts.app')

@section ('htmlheader_title', 'Pharmacy Billing')

@section ('contentheader_title', 'Pharmacy Billing')

@section('after-styles-end')
    {{ Html::style("css/plugin/datatables/dataTables.bootstrap.min.css") }}

@stop

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="{{route('admin.pharmacy.create')}}">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              {{ trans('labels.backend.financial-activities.payment.create') }}
            </button>
          </a>
        </div>

        <div class="box-body">
          <table id="pharmacy-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> Patient Name </th>
                <th> Doctor Name </th>
                <th> Total Amount </th>
                <th> Date </th>
                 <th> Actions </th>
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

      $('#pharmacy-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.pharmacy.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        fields: [ {
                label:     'Date',
                name:      'created_at',
                type:      'datetime',
                def:       function () { return new Date(); },
                format:    'd/m/Y',
                fieldInfo: 'US style m-d-y date input with 12 hour clock'
            },],
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'patient.name', name: 'patient.name'},
          {data: 'doctor.name', name: 'doctor.name'},
          {data: 'amount', name: 'amount'},
          {data: 'created_at', name: 'created_at'},
          {data: 'actions', name: 'actions', searchable: false, sortable: false}
        ],
        order: [[0, "asc"]],
        searchDelay: 500
      });

    });

    $(document).ready(function () {

      $('#pharmacy-table').on('click', '.delete-payment', function(f){
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
