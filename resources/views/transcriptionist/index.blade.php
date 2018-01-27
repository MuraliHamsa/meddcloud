@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.human_resources.transcriptionist.title'))

@section ('contentheader_title', trans('labels.backend.human_resources.transcriptionist.title'))

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
              {{ trans('labels.backend.human_resources.transcriptionist.create') }}
            </button>
          </a>
        </div>
        
        <div class="box-body">
          <table id="transcriptionist-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> {{ trans('labels.backend.human_resources.transcriptionist.table.name') }} </th>
                <th> {{ trans('labels.backend.human_resources.transcriptionist.table.email') }} </th>
                <th> {{ trans('labels.backend.human_resources.transcriptionist.table.phone') }} </th>
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
  @include('transcriptionist.create')

  @include('transcriptionist.edit')

  @include('transcriptionist._script')

  @include('includes.modal')
@stop

@section('after-scripts-end')
    {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.buttons.min.js") }}
    {{ Html::script("plugins/datatables/buttons.print.min.js") }}

  <script>
    $(function() {

      var table = $('#transcriptionist-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.transcriptionist.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'phone', name: 'phone'},
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

      $('#transcriptionist-table').on('click', '.edit-transcriptionist', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editTranscriptionistForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          $('#transcriptionistval').find('[name="password"]').removeAttr('id');

          $('#editTranscriptionistForm').find('[name="id"]').val(response.id).end()
          $('#editTranscriptionistForm').find('[name="name"]').val(response.name).end()
          $('#editTranscriptionistForm').find('[name="email"]').val(response.email).end()
          $('#editTranscriptionistForm').find('[name="address"]').val(response.address).end()
          $('#editTranscriptionistForm').find('[name="phone"]').val(response.phone).end()
          $('#editTranscriptionistForm').find('[name="eimage"]').val(response.image).end()
          $('#editTranscriptionistForm').find('[name="user_id"]').val(response.user_id).end()
          $('#editTranscriptionistForm').find('[name="hospital_id"]').val(response.hospital_id).end()

          if(response.image){
            $('#edit-image').attr('src', '{{ config("medcloud.image_url") }}' + 'transcriptionist/' + response.image)
          }
        });
      });

      $('#transcriptionist-table').on('click', '.delete-transcriptionist', function(f){
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
