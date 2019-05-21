<?php $__env->startSection('htmlheader_title'); ?>
	Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	Dashboard
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

<?php $data = Helpers::getNotification();?>
<?php if(Auth::user()->group[0]['name'] != 'superadmin'): ?>
		<?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist'])): ?>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
						<a href="<?php echo e(route('admin.doctor.index')); ?>" >
					<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-stethoscope"></i></span>
			            	<div class="info-box-content">
			            		<span class="info-box-text">Doctor</span>
			              		<span class="info-box-number"><?php echo e(@$data['doctor']); ?></span>
		              		</div>
		              	</div>
		            <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		      			</a>
		      		<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
			        <a href="<?php echo e(route('admin.patient.index')); ?>">
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Patient</span>
			              		<span class="info-box-number"><?php echo e(@$data['patient']); ?></span>
			            	</div>
			          	</div>
		          	</a>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.nurse.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Nurse</span>
			              		<span class="info-box-number"><?php echo e(@$data['nurse']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
						<a href="<?php echo e(route('admin.transcriptionist.index')); ?>">
					<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Transcriptionist</span>
			              		<span class="info-box-number"><?php echo e(@$data['transcriptionist']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>
	    	</div>

		    <div class="row">
		    	<div class="col-md-3 col-sm-6 col-xs-12">
		    		<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			    		<a href="<?php echo e(route('admin.receptionist.index')); ?>">
			    	<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Receptionist</span>
			              		<span class="info-box-number"><?php echo e(@$data['receptionist']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.pharmacist.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-medkit"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Pharmacist</span>
			              		<span class="info-box-number"><?php echo e(@$data['pharmacist']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.laboratorist.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Laboratorist</span>
			              		<span class="info-box-number"><?php echo e(@$data['laboratorist']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
						<a href="<?php echo e(route('admin.accountant.index')); ?>">
					<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Accountant</span>
			              		<span class="info-box-number"><?php echo e(@$data['accountant']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>
		    </div>

		    <div class="row">
		    	<div class="col-md-3 col-sm-6 col-xs-12">
		    		<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.medicine.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-plus-square-o"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Medicine</span>
			              		<span class="info-box-number"><?php echo e(@$data['medicine']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
			    </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.report.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-wheelchair"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Operation Report</span>
			              		<span class="info-box-number"><?php echo e(@$data['operation_report']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
						<a href="<?php echo e(route('admin.report.index')); ?>">
					<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-smile-o"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Birth Report</span>
			              		<span class="info-box-number"><?php echo e(@$data['birth_report']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			    		<a href="<?php echo e(route('admin.donor.index')); ?>">
			    	<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Donor</span>
			              		<span class="info-box-number"><?php echo e(@$data['donor']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>
		    </div>
		<?php endif; ?>

		<div class="row">
			<?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist'])): ?>
		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.bed.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Bed</span>
			              		<span class="info-box-number"><?php echo e(@$data['bed']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
						<a href="<?php echo e(route('admin.department.index')); ?>">
					<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-sitemap"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Department</span>
			              		<span class="info-box-number"><?php echo e(@$data['department']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
			    </div>
			<?php endif; ?>

			<?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist'])): ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
		    		<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			    		<a href="<?php echo e(route('admin.payment.index')); ?>">
			    	<?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Payment</span>
			              		<span class="info-box-number"><?php echo e(@$data['payment']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	<?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
			        	<a href="<?php echo e(route('admin.expense.index')); ?>">
			        <?php endif; ?>
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Expense</span>
			              		<span class="info-box-number"><?php echo e(@$data['expense']); ?></span>
			            	</div>
			          	</div>
			        <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
		          		</a>
		          	<?php endif; ?>
			    </div>
			<?php endif; ?>
		</div>

		<?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist'])): ?>
		    <div class="row">
		    	<div class="col-md-6 col-sm-6 col-xs-12">
		          	<div class="info-box">
		            	<span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart-o"></i></span>
		            	<div class="info-box-content">
		              		<span class="info-box-text">Total Payment</span>
		              		<span class="info-box-number"><?php echo e($data['settings']); ?> <?php echo e(@$data['total_payment']); ?></span>
		            	</div>
		          	</div>
		        </div>
		    </div>
	    <?php endif; ?>

	<?php endif; ?>

	<?php if(Auth::user()->group[0]['name'] == 'superadmin'): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
	               	<div class="box-header with-border">
	                 	<h3 class="box-title">Live Hospitals</h3>

	                  	<div class="box-tools pull-right">
	                   		<span class="label label-danger"><?php echo e(count($hospitals)); ?> Hospitals</span>
	                   		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                   		</button>
	                   		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
	                   		</button>
	                	</div>
	                </div>
	               	<!-- /.box-header -->
	               	<?php if(!empty($hospitals)): ?>
	               		<div class="box-body no-padding">
	                 		<ul class="users-list clearfix">
			                 	<?php foreach($hospitals as $hospital): ?>
					                <li>
					                    <img src="<?php echo e(asset('logo.png')); ?>" alt="User Image">
					                    <a class="users-list-name" href="#"><?php echo e($hospital->name); ?></a>
					                    <span class="users-list-date">Email: <?php echo e($hospital->email); ?></span>
					                    <span class="users-list-date">Address: <?php echo e($hospital->address); ?></span>
					                    <span class="users-list-date">Phone: <?php echo e($hospital->phone); ?></span>
					               	</li>
					            <?php endforeach; ?>
	                  		</ul>
	                  		<!-- /.users-list -->
		                </div>
		               	<!-- /.box-body -->
			            <div class="box-footer text-center">
			                <a href="<?php echo e(route('admin.hospital.index')); ?>" class="uppercase">View All Hospitals</a>
			            </div>
		               	<!-- /.box-footer -->
	                <?php endif; ?>
	            </div>
	        </div>
		</div>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>