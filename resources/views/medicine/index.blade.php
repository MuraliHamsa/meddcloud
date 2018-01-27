@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.medicine.medicine.title'))

@section ('contentheader_title', trans('labels.backend.medicine.medicine.title'))

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
              {{ trans('labels.backend.medicine.medicine.create') }}
            </button>
          </a>

          <a data-toggle="modal" href="#myModal3">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-download"></i>
              {{ trans('labels.backend.medicine.import_file') }}
            </button>
          </a>

        </div>
        
        <div class="box-body">
          <table id="medicine-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.name') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.category') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.price') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.qty') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.generic-name') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.company') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.effects') }} </th>
                <th> {{ trans('labels.backend.medicine.medicine.table.expiry-date') }} </th>
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
  @include('medicine.create')

  @include('medicine.edit')

  @include('medicine.import')

  @include('medicine._script')

  @include('includes.modal')
@stop

@section('after-scripts-end')
    {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("plugins/datatables/dataTables.buttons.min.js") }}
    {{ Html::script("plugins/datatables/buttons.print.min.js") }}

  <script>
    $(function() {

      var table = $('#medicine-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '{{ route("admin.medicine.get") }}',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'name', name: 'name'},
          {data: 'medicine_category.name', name: 'medicine_category.name'},
          {data: 'price', name: 'price'},
          {data: 'quantity', name: 'quantity'},
          {data: 'generic', name: 'generic'},
          {data: 'company', name: 'company'},
          {data: 'effects', name: 'effects'},
          {data: 'expiry_date', name: 'expiry_date'},
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

      $('#medicine-table').on('click', '.edit-medicine', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editMedicineForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          $('#editMedicineForm').find('[name="id"]').val(response.id).end()
          $('#editMedicineForm').find('[name="name"]').val(response.name).end()
          $('#editMedicineForm').find('[name="medicine_category_id"]').val(response.medicine_category_id).end()
          $('#editMedicineForm').find('[name="price"]').val(response.price).end()
          $('#editMedicineForm').find('[name="quantity"]').val(response.quantity).end()
          $('#editMedicineForm').find('[name="generic"]').val(response.generic).end()
          $('#editMedicineForm').find('[name="company"]').val(response.company).end()
          $('#editMedicineForm').find('[name="effects"]').val(response.effects).end()
          $('#editMedicineForm').find('[name="expiry_date"]').val(response.expiry_date).end()
        });
      });

      $('#medicine-table').on('click', '.delete-medicine', function(f){
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
