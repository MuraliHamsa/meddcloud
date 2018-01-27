<?php $__env->startSection('htmlheader_title', trans('labels.backend.financial-activities.financial-report.title')); ?>

<?php $__env->startSection('contentheader_title', trans('labels.backend.financial-activities.financial-report.title')); ?>
      
<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?php echo e(Form::open(['route' => 'admin.financial-report.search', 'class' => 'form-horizontal', 'method' => 'post'])); ?>

            <div class="form-group">
              <label class="col-lg-2 control-label">
                <?php echo e(trans('labels.backend.financial-activities.financial-report.from')); ?> 
              </label>
              <div class="col-lg-2">
                <?php echo e(Form::text('from_date', @$input['from_date'], ['class' => 'form-control datepicker', 'placeholder' => trans('labels.backend.financial-activities.financial-report.from')])); ?>

              </div>
              <label class="col-lg-2 control-label">
                <?php echo e(trans('labels.backend.financial-activities.financial-report.to')); ?> 
              </label>
              <div class="col-lg-2">
                <?php echo e(Form::text('to_date', @$input['to_date'], ['class' => 'form-control datepicker', 'placeholder' => trans('labels.backend.financial-activities.financial-report.to')])); ?>

              </div>

              <?php echo e(Form::submit('Search', ['class' => 'btn btn-info'])); ?>


            <?php echo e(Form::close()); ?>

          </div>
        </div>
        
        <div class="box-body">
          <div class="row">
            <div class="col-lg-7">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-primary">
                    <th colspan="3" style="text-align:center; font-size:20px;"> 
                      <?php echo e(trans('labels.backend.financial-activities.financial-report.table.payment')); ?>  
                      <?php if(!empty($input)): ?>
                        <?php echo e('From'); ?> <?php echo e($input['from_date']); ?> <?php echo e('To'); ?> <?php echo e($input['to_date']); ?>

                      <?php endif; ?>
                    </th>
                  </tr>
                  <tr>
                    <th> <?php echo e(trans('labels.backend.financial-activities.financial-report.table.category')); ?> </th>
                    <th> <?php echo e(trans('labels.backend.financial-activities.financial-report.table.amount')); ?> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($payment_category)): ?>
                    <?php $total = $flat_discount = $flat_vat = 0; ?>
                    <?php foreach($payment_category as $category): ?>
                      <?php $amount = 0; ?>
                      <?php if(!empty($payment)): ?>
                        <?php foreach($payment as $pay): ?>
                          <?php if($category->id == $pay->payment_category_id): ?>
                            <?php $amount = $pay->amount;
                              $flat_discount = $pay->flat_discount;
                              $flat_vat = $pay->flat_vat;
                              $total += $amount;
                            ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      <?php endif; ?> 

                      <tr>
                        <td> <?php echo e($category->category); ?> </td>
                        <td> <?php echo e($settings->currency); ?>  <?php echo e($amount); ?> </td>
                      </tr>
                    <?php endforeach; ?>
                    <tr>
                      <td>
                        <h3> 
                          <?php echo e(trans('labels.backend.financial-activities.financial-report.table.sub_total')); ?> 
                        </h3>
                      </td>
                      <td> <?php echo e($settings->currency); ?>  <?php echo e($total); ?> </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>
                          <?php echo e(trans('labels.backend.financial-activities.financial-report.table.total_discount')); ?> 
                        </h5>
                      </td>
                      <td><?php echo e($settings->currency); ?> <?php echo e($flat_discount); ?></td>
                    </tr>
                    <tr>
                      <td>
                        <h5>
                          <?php echo e(trans('labels.backend.financial-activities.financial-report.table.total_vat')); ?>

                        </h5>
                      </td>
                      <td><?php echo e($settings->currency); ?> <?php echo e($flat_vat); ?></td>
                    </tr>
                    <tr>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>

              <table class="table table-bordered table-striped">
                <thead>
                  <tr class=" btn-primary">
                    <th colspan="3" style="text-align:center; font-size:20px;"> 
                      <?php echo e(trans('labels.backend.financial-activities.financial-report.table.expense')); ?> 
                    </th>
                  </tr>
                  <tr>
                    <th> <?php echo e(trans('labels.backend.financial-activities.financial-report.table.category')); ?> </th>
                    <th> <?php echo e(trans('labels.backend.financial-activities.financial-report.table.amount')); ?> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $gross_expense = 0; ?>
                  <?php if(!empty($expense_category)): ?>
                    <?php foreach($expense_category as $ecategory): ?>
                      <?php $eamount = 0; ?>
                      <?php if(!empty($expense)): ?>
                        <?php foreach($expense as $exp): ?>
                          <?php if($ecategory->id == $exp->expense_category_id): ?>
                            <?php $eamount = $exp->amount; 
                            $gross_expense += $eamount; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      <?php endif; ?> 
                      <tr>
                        <td> <?php echo e($ecategory->category); ?> </td>
                        <td><?php echo e($settings->currency); ?> <?php echo e($eamount); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    <?php echo e(trans('labels.backend.financial-activities.financial-report.gross_payment')); ?>

                  </span>
                  <?php $gross = $total - $flat_discount + $flat_vat; ?>
                  <span class="info-box-number"> <?php echo e($settings->currency); ?> <?php echo e($gross); ?>

                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                    <?php echo e(trans('labels.backend.financial-activities.financial-report.gross_expense')); ?>

                  </span>
                  <span class="info-box-number"><?php echo e($settings->currency); ?> <?php echo e($gross_expense); ?></span>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">
                  <?php echo e(trans('labels.backend.financial-activities.financial-report.profit')); ?>

                  </span>
                  <span class="info-box-number"><?php echo e($settings->currency); ?> <?php echo e($gross - $gross_expense); ?></span>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
  <script type="text/javascript">
    $('.datepicker').datepicker();
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>