<?php $__env->startSection('htmlheader_title', 'Pharmacy Billing'); ?>

<?php $__env->startSection('contentheader_title', 'Pharmacy Billing'); ?>

<?php $__env->startSection('after-styles-end'); ?>
    <?php echo e(Html::style("css/plugin/datatables/dataTables.bootstrap.min.css")); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="<?php echo e(route('admin.pharmacy.create')); ?>">
            <button type="button" class="btn btn-primary">
              <i class="fa fa-fw fa-plus-circle"></i>
              <?php echo e(trans('labels.backend.financial-activities.payment.create')); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('popup-content'); ?>
  <?php echo $__env->make('includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
    <?php echo e(Html::script("plugins/datatables/jquery.dataTables.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.bootstrap.min.js")); ?>



  <script>
    $(function() {

      $('#pharmacy-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "bScrollCollapse": true,
        ajax: {
          url: '<?php echo e(route("admin.pharmacy.get")); ?>',
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>