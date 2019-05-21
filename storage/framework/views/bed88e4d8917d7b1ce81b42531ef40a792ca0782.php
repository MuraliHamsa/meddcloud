<?php $__env->startSection('htmlheader_title', trans('labels.backend.patient.view')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.patient.view')); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('labels.backend.patient.view')); ?></h3>
          <a href="<?php echo e(route('admin.patient.index')); ?>" class="btn btn-xs btn-primary pull-right">
            <i class="fa fa-arrow-left"></i>
            <?php echo e(trans('buttons.general.back')); ?>

          </a>
        </div>
        <div class="box-body">
          <table class="table">
            <tbody>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.name')); ?> : </strong></td>
                <td><?php echo e($patient->name); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.email')); ?> : </strong></td>
                <td><?php echo e($patient->email); ?></td>
              </tr>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.doctor_id')); ?> : </strong></td>
                <td><?php echo e($patient->doctor['name']); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.ref_doctor_id')); ?> : </strong></td>
                <td><?php echo e($patient->ref_doctor['name']); ?></td>
              </tr>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.age')); ?> : </strong></td>
                <td><?php echo e($patient->age); ?> <?php echo e('Yrs'); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.address')); ?> : </strong></td>
                <td><?php echo e($patient->address); ?></td>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.phone')); ?> : </strong></td>
                <td><?php echo e($patient->phone); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.gender')); ?> : </strong></td>
                <td>
                  <?php if($patient->sex == 1): ?>
                    <?php echo e('Male'); ?>

                  <?php elseif($patient->sex == 2): ?>
                    <?php echo e('Female'); ?>

                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.birthdate')); ?> : </strong></td>
                <td><?php echo e(date("d-m-Y", strtotime($patient->birthdate))); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.visit')); ?> : </strong></td>
                <td>
                  <?php switch($patient->visit) {
                    case 1: 
                      echo 'In Patient';
                      break;
                    case 2:
                      echo 'Out Patient';
                      break;
                    default:
                      echo 'Others';
                  }?>
                </td>
              </tr>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.bloodgroup')); ?> : </strong></td>
                <td><?php echo e($patient->blood_bank['name']); ?></td>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.patient_id')); ?> : </strong></td>
                <td><?php echo e($patient->patientId); ?></td>
              </tr>
              <tr>
                <td><strong> <?php echo e(trans('validation.attributes.backend.patient.image')); ?> : </strong></td>
                <td>
                  <?php if($patient->image): ?>
                    <img src="<?php echo e(config('medcloud.image_url')); ?>patient/<?php echo e($patient->image); ?>" width="75" height="100">
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>