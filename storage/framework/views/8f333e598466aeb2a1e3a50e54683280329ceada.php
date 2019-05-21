<?php $__env->startSection('htmlheader_title', trans('labels.backend.patient.title')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.patient.title')); ?>

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
              <?php echo e(trans('labels.backend.patient.create')); ?>

            </button>
          </a>
        </div>
        
        <div class="box-body">
          <table id="patient-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th></th>
                <th> <?php echo e(trans('labels.backend.patient.table.patientId')); ?> </th>
                <th> <?php echo e(trans('labels.backend.patient.table.add_date')); ?> </th>
                <th> <?php echo e(trans('labels.backend.patient.table.name')); ?> </th>
                <th> <?php echo e(trans('labels.backend.patient.table.email')); ?> </th>
                <th> <?php echo e(trans('labels.backend.patient.table.doctor')); ?></th>
                <th> <?php echo e(trans('labels.backend.patient.table.birthdate')); ?></th>
                <th> <?php echo e(trans('labels.backend.patient.table.phone')); ?></th>
                <th> <?php echo e(trans('labels.backend.patient.table.bloodgroup')); ?></th>
                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant'])): ?>
                  <th> <?php echo e(trans('labels.backend.patient.table.due')); ?></th>
                <?php endif; ?>
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
  <?php echo $__env->make('patient.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('patient.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('patient._script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->make('includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
    <?php echo e(Html::script("plugins/datatables/jquery.dataTables.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.bootstrap.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/dataTables.buttons.min.js")); ?>

    <?php echo e(Html::script("plugins/datatables/buttons.print.min.js")); ?>


  <script>
    $(function() {

      var table = $('#patient-table').DataTable({
        processing: true,
        serverSide: true,
        "sScrollX": "100%", 
        "sScrollXInner": "100%", 
        "bScrollCollapse": true,
        ajax: {
          url: '<?php echo e(route("admin.patient.get")); ?>',
          type: 'get',
          data: {status: 1, trashed: false}
        },
        columns: [
          {data: 'id', visible: false, searchable: false, sortable: false},
          {data: 'patientId', name: 'patientId'},
          {data: 'created_at', name: 'created_at'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'doctor.name', name: 'doctor.name'},
          {data: 'birthdate', name: 'birthdate'},
          {data: 'phone', name: 'phone'},
          {data: 'blood_bank.name', name: 'blood_bank.name'},
          <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant'])): ?>
            {data: 'gross_total', name: 'payment.gross_total'},
          <?php endif; ?>
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

      $('#patient-table').on('click', '.edit-patient', function(e){
        e.preventDefault(e); 
        var url = $(this).attr('data-href');
        $('#editPatientForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
          url: url,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
           
          $('#patientval').find('[name="password"]').removeAttr('id');

          $('#editPatientForm').find('[name="id"]').val(response.id).end()
          $('#editPatientForm').find('[name="user_id"]').val(response.user_id).end()
          $('#editPatientForm').find('[name="hospital_id"]').val(response.hospital_id).end()
          $('#editPatientForm').find('[name="doctor_id"]').val(response.doctor_id).end()
          $('#editPatientForm').find('[name="ref_doctor_id"]').val(response.ref_doctor_id).end()
          $('#editPatientForm').find('[name="patientId"]').val(response.patientId).end()
          $('#editPatientForm').find('[name="name"]').val(response.name).end()
          $('#editPatientForm').find('[name="email"]').val(response.email).end()
          $('#editPatientForm').find('[name="address"]').val(response.address).end()
          $('#editPatientForm').find('[name="phone"]').val(response.phone).end()
          $('#editPatientForm').find('[name="age"]').val(response.age).end()
          $('#editPatientForm').find('[name="sex"]').val(response.sex).end()
          $('#editPatientForm').find('[name="birthdate"]').val(response.birthdate).end()
          $('#editPatientForm').find('[name="visit"]').val(response.visit).end()
          $('#editPatientForm').find('[name="blood_bank_id"]').val(response.blood_bank_id).end()

          if(response.image){
            $('#edit-image').attr('src', '<?php echo e(config("medcloud.image_url")); ?>' + 'patient/' + response.image)
          }
          
        });
      });

      $('#patient-table').on('click', '.delete-patient', function(f){
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