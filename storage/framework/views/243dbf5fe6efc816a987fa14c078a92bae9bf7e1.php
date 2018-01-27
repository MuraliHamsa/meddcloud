<?php $__env->startSection('htmlheader_title', 'Discharge Summary'); ?>

<?php $__env->startSection('contentheader_title', 'Discharge Summary'); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-header with-border">
          <h3 class="box-title"><?php echo e('Summary'); ?></h3>
          </div>
          <?php /* <?php echo e(Form::open(['route' => 'admin.dischargesummary.store', 'class' => 'form-horizontal', 'id' => 'paymentval', 'method' => 'put'])); ?> */ ?>
          <?php echo $__env->make('dischargesummary._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php /* <?php echo e(Form::close()); ?> */ ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>