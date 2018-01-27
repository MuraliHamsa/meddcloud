@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.report.report.title'))

@section ('contentheader_title', trans('labels.backend.report.report.title'))

@section('after-styles-end')
    {{ Html::style("css/plugin/datatables/dataTables.bootstrap.min.css") }}
    {{ Html::style("css/plugin/datatables/buttons.dataTables.min.css") }}
@stop
      
@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header" id="action-buttons">
          <a data-toggle="modal" href="#myModal">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              {{ trans('labels.backend.report.report.create') }}
            </button>
          </a>
        </div>
        
        <div class="box-body">
          <table id="report-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> {{ trans('labels.backend.report.report.table.type') }} </th>
                <th> {{ trans('labels.backend.report.report.table.patient') }} </th>
                <th> {{ trans('labels.backend.report.report.table.doctor') }} </th>
                <th> {{ trans('labels.backend.report.report.table.description') }} </th>
                <th> {{ trans('labels.backend.report.report.table.date') }} </th>
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
  @include('report.create')

  @include('report.edit')

  @include('report._script')

  @include('includes.modal')
@stop

@section('after-scripts-end')
    {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.buttons.min.js") }}
    {{ Html::script("plugins/datatables/buttons.print.min.js") }}

  <script>
    $(function() {

      var table = $('#report-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.report.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'report_type.name' , name: 'report_type.name'},
          {data: 'patient.name', name: 'patient.name'},
          {data: 'doctor.name', name: 'doctor.name'},
          {data: 'description', name: 'description'},
          {data: 'add_date', name: 'add_date'},
          {data: 'actions', name: 'actions', searchable: false, sortable: false}
        ],
        order: [[0, "asc"]],
        searchDelay: 500,
        buttons: []
      });

      var buttons = new $.fn.dataTable.Buttons(table, {
        buttons: [
          {
            text: '<i class="fa fa-fw fa-print"></i> Print',
            extend: 'print',
            className: 'btn btn-primary pull-right',
            exportOptions: {
              columns: ':visible',
            },
            customize: function ( win ) {
              $(win.document.body)
                .css( 'font-size', '10pt' );
              $(win.document.body).find( 'table' )
                .addClass( 'compact' )
                .css( 'font-size', 'inherit' );
            }
          }
        ]
      }).container().appendTo($('#action-buttons'));


    });

    $(document).ready(function () {
      
      $('#myModal2').modal({ 'show' : '<?php echo (count(@$errors) > 0 ? true : false); ?>'  });

      $('#report-table').on('click', '.edit-report', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editReportForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          $('#editReportForm').find('[name="id"]').val(response.id).end()
          $('#editReportForm').find('[name="report_type_id"]').val(response.report_type_id).end()
          $('#editReportForm').find('[name="patient_id"]').val(response.patient_id).end()
          $('#editReportForm').find('[name="doctor_id"]').val(response.doctor_id).end()
          $('#editReportForm').find('[name="description"]').val(response.description).end()
          $('#editReportForm').find('[name="add_date"]').val(response.add_date).end()
         
        });
      });

      $('#report-table').on('click', '.delete-report', function(f){
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
