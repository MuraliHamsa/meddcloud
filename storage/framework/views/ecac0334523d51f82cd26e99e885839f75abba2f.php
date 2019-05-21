<?php $__env->startSection('htmlheader_title', trans('labels.backend.medicine.medicine.title')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.medicine.medicine.title')); ?>

<?php $__env->startSection('after-styles-end'); ?>
    <?php echo e(Html::style("css/plugin/datatables/dataTables.bootstrap.min.css")); ?>

    <?php echo e(Html::style("css/plugin/datatables/buttons.dataTables.min.css")); ?>

<?php $__env->stopSection(); ?>
      
<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header" id="action-buttons">
          <a data-toggle="modal" href="#myModal">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              <?php echo e(trans('labels.backend.medicine.medicine.create')); ?>

            </button>
          </a>

          <a data-toggle="modal" href="#myModal3">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-download"></i>
              <?php echo e(trans('labels.backend.medicine.import_file')); ?>

            </button>
          </a>

        </div>
        
        <div class="box-body">
          <table id="medicine-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>  </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.name')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.category')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.price')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.qty')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.generic-name')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.company')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.effects')); ?> </th>
                <th> <?php echo e(trans('labels.backend.medicine.medicine.table.expiry-date')); ?> </th>
                <th> <?php echo e(trans('labels.general.actions')); ?> </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('popup-content'); ?>
  <?php echo $__env->make('medicine.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('medicine.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('medicine.import', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('medicine._script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
    <?php echo e(Html::script("plugins/datatables/jquery.dataTables.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.bootstrap.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.buttons.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/buttons.print.min.js")); ?>


  <script>
    $(function() {

      var table = $('#medicine-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '<?php echo e(route("admin.medicine.get")); ?>',
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>