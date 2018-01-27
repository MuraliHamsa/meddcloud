<?php $__env->startSection('htmlheader_title', trans('labels.backend.financial-activities.payment.create')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.financial-activities.payment.create')); ?>
      
<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border"> 
          <h3 class="box-title"><?php echo e(trans('labels.backend.financial-activities.payment.create')); ?></h3>
        </div> 
        <?php echo e(Form::open(['route' => 'admin.payment.store', 'class' => 'form-horizontal', 'id' => 'paymentval', 'method' => 'put'])); ?>

          <?php echo $__env->make('payment._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
  <?php echo $__env->make('payment._script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>