<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(route('admin.home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Meddcloud</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Meddcloud</b></span>
    </a>

    <?php $data = Helpers::getNotification(); ?>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?php echo e(trans('adminlte_lang::message.togglenav')); ?></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Nurse', 'Doctor', 'Receptionist'])): ?> 
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-hdd-o"></i>
                            <span class="label label-success"><?php echo e(@$data['bedcount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['bedcount'] > 0): ?>
                                    <?php echo e(@$data['bedcount']); ?> <?php echo e('Beds are available'); ?> 
                                <?php else: ?> 
                                    <?php echo e('No Beds are available'); ?>

                                <?php endif; ?>
                            </li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="<?php echo e(route('admin.bed-allotment.index')); ?>">
                                            <!-- The message -->
                                            <p><?php if(@$data['bedcount'] > 0): ?>
                                                    <?php echo e('Add a allotment'); ?> 
                                                <?php else: ?> 
                                                    <?php echo e('No Beds are available for allotment'); ?>

                                                <?php endif; ?></p>
                                        </a>
                                    </li><!-- end message -->
                                </ul><!-- /.menu -->
                            </li>
                            <!-- <li class="footer"><a href="#">c</a></li> -->
                        </ul>
                    </li><!-- /.messages-menu -->
                <?php endif; ?>

                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist'])): ?> 
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-money"></i>
                            <span class="label label-warning"><?php echo e(@$data['paymentcount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['paymentcount'] > 0): ?>
                                    <?php echo e(@$data['paymentcount']); ?> Payments Today
                                <?php endif; ?>
                            </li>
                            <li class="footer"><a href="<?php echo e(route('admin.payment.index')); ?>">View all Payments</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist','Receptionist','Transcriptionist'])): ?> 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="label label-danger"><?php echo e(@$data['patientcount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['patientcount'] > 0): ?>
                                    <?php echo e(@$data['patientcount']); ?> Patients Registered Today
                                <?php endif; ?>
                            </li>
                            <li class="footer">
                                <a href="<?php echo e(route('admin.patient.index')); ?>">View all Patients</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist','Receptionist','Transcriptionist'])): ?> 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="label label-success"><?php echo e(@$data['donorcount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['donorcount'] > 0): ?>
                                    <?php echo e(@$data['donorcount']); ?> Donor Registered Today
                                <?php endif; ?>
                            </li>
                            <li class="footer">
                                <a href="<?php echo e(route('admin.donor.index')); ?>">View all Donors</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Pharmacist', 'Doctor'])): ?> 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-medkit"></i>
                            <span class="label label-warning"><?php echo e(@$data['medicinecount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['medicinecount'] > 0): ?>
                                    <?php echo e(@$data['medicinecount']); ?> Medicines added Today
                                <?php endif; ?>
                            </li>
                            <li class="footer">
                                <a href="<?php echo e(route('admin.medicine.index')); ?>">View all Medicines</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor', 'Laboratorist', 'Nurse','Receptionist','Transcriptionist'])): ?> 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-hospital-o"></i>
                            <span class="label label-danger"><?php echo e(@$data['reportcount']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <?php if(@$data['reportcount'] > 0): ?>
                                    <?php echo e(@$data['reportcount']); ?> Reports added Today
                                <?php endif; ?>
                            </li>
                            <li class="footer">
                                <a href="<?php echo e(route('admin.medicine.index')); ?>">View all Reports</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/register')); ?>"><?php echo e(trans('adminlte_lang::message.register')); ?></a></li>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                <?php else: ?>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo e(asset('logo.png')); ?>" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->username); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo e(asset('logo.png')); ?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo e(Auth::user()->username); ?>

                                    <small><?php echo e(trans('adminlte_lang::message.login')); ?> <?php echo e(date("M", strtotime(Auth::user()->last_login))); ?> <?php echo e(date("Y", strtotime(Auth::user()->last_login))); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.followers')); ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.sales')); ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.friends')); ?></a>
                                </div>
                            </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(route('admin.profile')); ?>" class="btn btn-default btn-flat"><?php echo e(trans('adminlte_lang::message.profile')); ?></a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat"><?php echo e(trans('adminlte_lang::message.signout')); ?></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#"><i class="fa fa-gears"></i></a>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
        </div>
    </nav>
</header>
