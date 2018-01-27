<?php $__env->startSection('contentheader_title', trans('labels.backend.settings.management')); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('labels.backend.settings.management')); ?></h3>
        </div>
        <?php echo e(Form::open(['route' => 'admin.updateSettings', 'class' => 'form-horizontal', 'id' => 'settingsval', 'method' => 'post'])); ?>

          
        <div class="box-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.system_vendor')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('system_vendor', @$settings->system_vendor, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.system_vendor')])); ?>

            </div>
          </div>
        
           <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.title')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('title', @$settings->title, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.title')])); ?>

            </div>
          </div>
              
           <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.address')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('address', @$settings->address, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.address')])); ?>

            </div>
          </div>     
          <div class="form-group">
          <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.phone')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('phone', @$settings->phone, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.phone')])); ?>

            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.email')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('email', @$settings->email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.email')])); ?>

            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.currency')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::text('currency', @$settings->currency, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.currency')])); ?>

            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.settings.discount')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-6">
              <?php echo e(Form::select('discount', array('1' => 'Percentage(%)', '2' => 'Flat'), @$settings->discount, ['class' => 'form-control'])); ?>

            </div>
          </div>

          <?php echo e(Form::hidden('id', @$settings->id)); ?>


          </div>

          <div class="box-footer">
            <a class="btn btn-default" href="<?php echo e(route('admin.home')); ?>">Cancel</a>
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary pull-right'])); ?>

          </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts-end'); ?>
  <?php echo e(Html::script("js/jquery.validate.min.js")); ?>


<script type="text/javascript">
  $(function() {
     
    $("#settingsval").validate({
      rules: {
        system_vendor: {
          required: true
        },
        title: {
          required: true
        },
        address: {
          required: true,
          minlength : 5,
        },
        phone: {
          required : true,
          digits: true
        },
        email: {
          required: true,
          email: true          
        },
        currency: { 
          required: true
        },
        discount: {
          required: true
        }

      },
      messages: {
        system_vendor: {
          required: "Please enter system name"
        },
        title: {
          required: "Please enter title"
        },
        address: {
          required: "Please enter address"
        },
        phone: {
          required: "Please enter valid phone",
          digits: "Phone number should contain only numbers"
        },
        email: {
          required: "Please enter email",
          email: "Please enter valid email"
        },
        currency: {
          required: "Please enter currency"
        },
        discount: {
          required: "Please select discount type"
        }
      }
    });

  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>