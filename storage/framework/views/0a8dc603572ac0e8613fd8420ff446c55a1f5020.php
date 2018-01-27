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
        <small class="pull-right">Date: <?php echo e(date("d/m/Y", strtotime($payment->payment_date))); ?> </small>
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
        <strong><?php echo e($payment->patient['name']); ?></strong><br>
        <?php echo e($payment->patient['age']); ?> <?php echo e('Yrs'); ?><br>
        <?php echo e($payment->patient['address']); ?><br>
        <?php echo e($payment->patient->phone); ?>

      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <p>INVOICE INFO</p>
      <address>
        Invoice Number: <b><?php echo e(str_pad($payment->id, 6, '0', STR_PAD_LEFT)); ?></b><br>
        Date: <?php echo e(date("d/m/Y", strtotime($payment->payment_date))); ?><br>
        Invoice Status: <b>
          <?php if($payment->status == 1){
           echo 'Paid'; 
          } else { 
            echo 'Un-Paid'; 
          }?>
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
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($payment->payment_bill_category)): ?>
            <?php $i = 1; ?>
            <?php foreach($payment->payment_bill_category as $category): ?>
              <tr>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($category->payment_category['category']); ?></td>
                <td><?php echo e($category->payment_category['amount']); ?></td>
              </tr>
              <?php $i++; ?>
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
          <strong>Sub - Total amount : </strong><?php echo e($settings->currency); ?> <?php echo e($payment->amount); ?>

        </li>

        <?php if(!empty($payment->discount)): ?>                          
          <li>
            <strong>Discount</strong> 
            <?php if($settings->discount == 'percentage') {
              echo '(%) : ';
            } else {
              echo ': ' . $settings->currency;
            }
            if(!empty($payment->flat_discount)) {
              echo $payment->discount . ' % = ' . $settings->currency . ' ' . $payment->flat_discount;
            } else {
              echo $payment->discount;
            } ?>
          </li>
        <?php endif; ?>

        <?php if(!empty($payment->vat)): ?>
          <li>
            <strong>VAT :</strong>   
            <?php if(!empty($payment->vat)): ?>
              <?php echo e($payment->vat); ?>

            <?php else: ?> 
              <?php echo e('0'); ?>

            <?php endif; ?> % = <?php echo e($settings->currency); ?> <?php echo e($payment->flat_vat); ?> 
          </li>
        <?php endif; ?>
        <li>
          <strong>Grand Total : </strong>
          <?php echo e($settings->currency); ?> <?php echo e($payment->gross_total); ?>

        </li>
      </ul>
    </div>
  </div>

  <div class="text-center invoice-btn no-print">
    <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist']) && ($payment->status ==0)): ?>
      <a href="<?php echo e(route('admin.payment.edit', $payment->id)); ?>" class="btn btn-info btn-lg invoice_button">
        <i class="fa fa-edit"></i> Edit Payment 
      </a>

      <a href="<?php echo e(route('admin.payment.makePaid', $payment->id)); ?>" class="btn btn-info btn-lg invoice_button">
        <i class="fa fa-edit"></i> Make Paid 
      </a>
    <?php endif; ?>
    <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print </a>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>