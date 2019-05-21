<?php $__env->startSection('htmlheader_title', trans('labels.backend.financial-activities.payment.invoice')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.financial-activities.payment.invoice')); ?>

<?php $__env->startSection('after-styles-end'); ?>
<link href="<?php echo e(asset('css/print.css')); ?>" rel="stylesheet" type="text/css" media="print"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice'); ?>
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> <?php echo e(Auth::user()->username); ?>.
        <small class="pull-right">Date: <?php echo e(date("d/m/Y", strtotime($pharmacy->created_at))); ?> </small>
      </h2>
    </div>
  </div>

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <p>PAYMENT TO:</p>
      <address>
        <strong><?php echo e($hospital->name); ?></strong><br>
        <?php echo e($hospital->address); ?><br>
        Tel: <?php echo e($hospital->phone); ?>

      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>BILL TO:</p>
      <address>
        <strong><?php echo e($pharmacy->patient['name']); ?></strong><br>
        <?php echo e($pharmacy->patient['age']); ?> <?php echo e('Yrs'); ?><br>
        <?php echo e($pharmacy->patient['address']); ?><br>
        <?php echo e($pharmacy->patient->phone); ?>

      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>INVOICE INFO</p>
      <address>
        Invoice Number: <b><?php echo e(str_pad($pharmacy->id, 6, '0', STR_PAD_LEFT)); ?></b><br>
        Date: <?php echo e(date("d/m/Y", strtotime($pharmacy->created_at))); ?><br>
        Invoice Status: <b>
</b>
      </address>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
<?php if(!empty($pharmacy->pharmacy_drugs)): ?>
<?php $i = 1;?>
<?php foreach($pharmacy->pharmacy_drugs as $drug): ?>
              <tr>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($drug->medicine['name']); ?></td>
                <td><?php echo e($drug->medicine['price']); ?></td>
                <td><?php echo e($drug->medicine['quantity']); ?></td>
              </tr>
<?php $i++;?>
<?php endforeach; ?>
<?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 invoice-block pull-right">
      <ul class="unstyled amounts">
        <li>
          <strong>Sub - Total amount : </strong><?php echo e($settings->currency); ?> <?php echo e($pharmacy->amount); ?>

        </li>





    </div>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>