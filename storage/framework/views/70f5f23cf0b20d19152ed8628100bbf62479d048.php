<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(asset('logo.png')); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->username); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('adminlte_lang::message.header')); ?></li>
            <!-- Optionally, you can add icons to the links -->

            <li class="<?php echo e(Active::pattern(['home', '/'])); ?>" ><a href="<?php echo e(route('admin.home')); ?>"><i class='fa fa-dashboard'></i> <span><?php echo e(trans('menu.backend.sidebar.dashboard')); ?></span></a></li>

            <?php if(Auth::user()->group[0]['name'] == 'superadmin'): ?>
                <li class="<?php echo e(Active::pattern('hospital')); ?>" ><a href="<?php echo e(route('admin.hospital.index')); ?>"><i class='fa fa-sitemap'></i> <span><?php echo e(trans('menu.backend.sidebar.hospital')); ?></span></a></li>
            <?php endif; ?>

            <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
                 <li class="<?php echo e(Active::pattern('department')); ?>" ><a href="<?php echo e(route('admin.department.index')); ?>"><i class="fa fa-sitemap"></i> <span><?php echo e(trans('menu.backend.sidebar.department')); ?></span></a></li> 

                <li class="<?php echo e(Active::pattern('doctor')); ?>" ><a href="<?php echo e(route('admin.doctor.index')); ?>"><i class="fa fa-stethoscope"></i> <span><?php echo e(trans('menu.backend.sidebar.doctor')); ?></span></a></li> 
            <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist'])): ?>
                <li class="<?php echo e(Active::pattern('patient')); ?>" ><a href="<?php echo e(route('admin.patient.index')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('menu.backend.sidebar.patient')); ?></span></a></li>
            <?php endif; ?>

            <?php if(Auth::user()->group[0]['name'] == 'admin'): ?>
                <li class="treeview <?php echo e(Active::pattern(['nurse', 'pharmacist', 'laboratorist', 'accountant', 'receptionist', 'transcriptionist'])); ?>">
                    <a href="#">
                        <i class='fa fa-users'></i> 
                        <span><?php echo e(trans('menu.backend.sidebar.human-resource.title')); ?></span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.nurse.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.nurse')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.pharmacist.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.pharmacist')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.laboratorist.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.laboratorist')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.accountant.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.accountant')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.receptionist.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.receptionist')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.transcriptionist.index')); ?>"><i class="fa fa-user"></i><?php echo e(trans('menu.backend.sidebar.human-resource.transcriptionist')); ?></a></li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(Active::pattern(['payment', 'payment-billing', 'payment-category', 'expense', 'expense-category', 'financial-report'])); ?>">
                    <a href="#">
                        <i class='fa fa-dollar'></i> 
                        <span><?php echo e(trans('menu.backend.sidebar.financial-activities.title')); ?></span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                    <li class="treeview <?php echo e(Active::pattern(['patient-billing', 'pharmacy-billing'])); ?>"><a href="#"><i class="fa fa-money"></i><span><?php echo e(trans('menu.backend.sidebar.financial-activities.payment')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.payment.index')); ?>"><i class="fa fa-money"></i><?php echo e(trans('menu.backend.sidebar.billing.patient-billing')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.payment.index')); ?>"><i class="fa fa-money"></i><?php echo e(trans('menu.backend.sidebar.billing.pharmacy-billing')); ?></a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo e(route('admin.payment-billing.index')); ?>"><i class="fa fa-edit"></i><?php echo e(trans('menu.backend.sidebar.financial-activities.payment-billing')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.payment-category.index')); ?>"><i class="fa fa-edit"></i><?php echo e(trans('menu.backend.sidebar.financial-activities.payment-category')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.expense.index')); ?>"><i class="fa fa-money"></i><?php echo e(trans('menu.backend.sidebar.financial-activities.expense')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.expense-category.index')); ?>"><i class="fa fa-edit"></i><?php echo e(trans('menu.backend.sidebar.financial-activities.expense-category')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.financial-report.index')); ?>"><i class="fa fa-book"></i><?php echo e(trans('menu.backend.sidebar.financial-activities.financial-report')); ?></a></li>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor'])): ?>
                <li class="treeview <?php echo e(Active::pattern(['medicine', 'medicine-category'])); ?>">
                    <a href="#">
                        <i class='fa fa-medkit'></i> 
                        <span><?php echo e(trans('menu.backend.sidebar.medicine.title')); ?></span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.medicine-category.index')); ?>"><i class="fa fa-edit"></i><?php echo e(trans('menu.backend.sidebar.medicine.medicine-category')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.medicine.index')); ?>"><i class="fa fa-medkit"></i><?php echo e(trans('menu.backend.sidebar.medicine.medicine')); ?></a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Laboratorist', 'Doctor', 'Transcriptionist'])): ?>
                <li class="<?php echo e(Active::pattern('donor')); ?>" ><a href="<?php echo e(route('admin.donor.index')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('menu.backend.sidebar.donor')); ?></span></a></li>    
            <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor'])): ?>
                <li class="treeview <?php echo e(Active::pattern(['bed', 'bed-category'])); ?>">
                    <a href="#">
                        <i class='fa fa-hdd-o'></i> 
                        <span>Bed</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.bed.index')); ?>"><i class="fa fa-hdd-o"></i>Bed List</a></li>
                        <li><a href="<?php echo e(route('admin.bed-category.index')); ?>"><i class="fa fa-edit"></i>Bed Category</a></li>
                        <li><a href="<?php echo e(route('admin.bed-allotment.index')); ?>"><i class="fa fa-plus-square-o"></i>Bed Allotments</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin', 'Laboratorist', 'Doctor'])): ?>
                <li class="treeview <?php echo e(Active::pattern(['report-type', 'report'])); ?>">
                        <a href="#">
                            <i class="fa  fa-hospital-o"></i>
                            <span>Report</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(route('admin.report-type.index')); ?>"><i class="fa fa-edit"></i>Report Type</a></li>
                            <li><a href="<?php echo e(route('admin.report.index')); ?>"><i class="fa fa-hospital-o"></i>Reports</a></li>
                        </ul>
                 </li>
             <?php endif; ?>

            <?php if(in_array(Auth::user()->group[0]['name'], ['admin'])): ?>
                <li class="<?php echo e(Active::pattern('settings')); ?>" ><a href="<?php echo e(route('admin.settings')); ?>"><i class='fa fa-gears'></i> <span><?php echo e(trans('menu.backend.sidebar.settings')); ?></span></a></li>
            <?php endif; ?>

            <li class="<?php echo e(Active::pattern('profile')); ?>" ><a href="<?php echo e(route('admin.profile')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('menu.backend.sidebar.profile')); ?></span></a></li>


            <!-- <li><a href="#"><i class='fa fa-link'></i> <span><?php echo e(trans('adminlte_lang::message.anotherlink')); ?></span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span><?php echo e(trans('adminlte_lang::message.multilevel')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><?php echo e(trans('adminlte_lang::message.linklevel2')); ?></a></li>
                    <li><a href="#"><?php echo e(trans('adminlte_lang::message.linklevel2')); ?></a></li>
                </ul>
            </li> -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
