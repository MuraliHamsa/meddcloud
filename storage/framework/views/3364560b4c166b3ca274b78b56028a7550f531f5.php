<?php $__env->startSection('htmlheader_title', trans('labels.backend.hospital.title')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.hospital.title')); ?>

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
              <?php echo e(trans('labels.backend.hospital.create')); ?>

            </button>
          </a>
        </div>
        <div class="box-body">
          <table id="hospital-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th></th>
                <th> <?php echo e(trans('labels.backend.hospital.table.title')); ?> </th>
                <th> <?php echo e(trans('labels.backend.hospital.table.email')); ?> </th>
                <th> <?php echo e(trans('labels.backend.hospital.table.address')); ?> </th>
                <th> <?php echo e(trans('labels.backend.hospital.table.phone')); ?> </th>
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
  <?php echo $__env->make('hospital.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('hospital.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('hospital._script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
    <?php echo e(Html::script("plugins/datatables/jquery.dataTables.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.bootstrap.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.buttons.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/buttons.print.min.js")); ?>


  <script>
    $(function() {

      var table = $('#hospital-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '<?php echo e(route("admin.hospital.get")); ?>',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'name', name: 'title'},
          {data: 'email', name: 'email'},
          {data: 'address', name: 'address'},
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

      $('#hospital-table').on('click', '.edit-hospital', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editHospitalForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          $('#hospitalval').find('[name="password"]').removeAttr('id');
          
          $('#editHospitalForm').find('[name="id"]').val(response.id).end()
          $('#editHospitalForm').find('[name="user_id"]').val(response.user_id).end()
          $('#editHospitalForm').find('[name="name"]').val(response.name).end()
          $('#editHospitalForm').find('[name="password"]').val(response.password).end()
          $('#editHospitalForm').find('[name="email"]').val(response.email).end()
          $('#editHospitalForm').find('[name="address"]').val(response.address).end()
          $('#editHospitalForm').find('[name="phone"]').val(response.phone).end()
        });
      });

      $('#hospital-table').on('click', '.delete-hospital', function(f){
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