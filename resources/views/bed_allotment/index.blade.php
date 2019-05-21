@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.bed.bed-allotment.title'))

@section ('contentheader_title', trans('labels.backend.bed.bed-allotment.title'))

@section('after-styles-end')
    {{ Html::style("css/plugin/datatables/dataTables.bootstrap.min.css") }}
    {{ Html::style("css/plugin/datatables/buttons.dataTables.min.css") }}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
@stop
      
@section('main-content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header" id="action-buttons">
          <a data-toggle="modal" href="#myModal">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              {{ trans('labels.backend.bed.bed-allotment.create') }}
            </button>
          </a>
        </div>
        
        <div class="box-body">
          <table id="bed-allotment-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> {{ trans('labels.backend.bed.bed-allotment.table.bedId') }} </th>
                <th> {{ trans('labels.backend.bed.bed-allotment.table.patient') }} </th>
                <th> {{ trans('labels.backend.bed.bed-allotment.table.allotted_time') }} </th>
                <th> {{ trans('labels.backend.bed.bed-allotment.table.discharge_time') }} </th>
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
  @include('bed_allotment.create')

  @include('bed_allotment.edit')

  @include('bed_allotment._script')

  @include('includes.modal')
@stop

@section('after-scripts-end')
    {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("js/moment.min.js") }}
    {{ Html::script("js/locales.js") }}
    {{ Html::script("js/bootstrap-datetimepicker.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.buttons.min.js") }}
    {{ Html::script("plugins/datatables/buttons.print.min.js") }}
                     
  <script>
    $(function() {

      var table = $('#bed-allotment-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.bed-allotment.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'bed.bedId', name: 'bed.bedId'},
          {data: 'patient.name', name: 'patient.name'},
          {data: 'allotted_time', name: 'allotted_time'},
          {data: 'discharge_time', name: 'discharge_time'},
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

      $('#bed-allotment-table').on('click', '.edit-bed-allotment', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editBedAllottedForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          $('#editBedAllottedForm').find('[name="id"]').val(response.id).end()
          $('#editBedAllottedForm').find('[name="bed_id"]').val(response.bed_id).end()
          $('#editBedAllottedForm').find('[name="patient_id"]').val(response.patient_id).end()
          $('#editBedAllottedForm').find('[name="allotted_time"]').val(response.allotted_time).end()
          $('#editBedAllottedForm').find('[name="discharge_time"]').val(response.discharge_time).end()
        });
      });

      $('#bed-allotment-table').on('click', '.delete-bed-allotment', function(f){
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
