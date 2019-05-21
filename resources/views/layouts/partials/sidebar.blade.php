<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('logo.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->username }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="{{ Active::pattern(['home', '/']) }}" ><a href="{{ route('admin.home') }}"><i class='fa fa-dashboard'></i> <span>{{ trans('menu.backend.sidebar.dashboard') }}</span></a></li>

            @if(Auth::user()->group[0]['name'] == 'superadmin')
                <li class="{{ Active::pattern('hospital') }}" ><a href="{{ route('admin.hospital.index') }}"><i class='fa fa-sitemap'></i> <span>{{ trans('menu.backend.sidebar.hospital') }}</span></a></li>
            @endif

            @if(Auth::user()->group[0]['name'] == 'admin')
                 <li class="{{ Active::pattern('department') }}" ><a href="{{ route('admin.department.index') }}"><i class="fa fa-sitemap"></i> <span>{{ trans('menu.backend.sidebar.department') }}</span></a></li>

                <li class="{{ Active::pattern('doctor') }}" ><a href="{{ route('admin.doctor.index') }}"><i class="fa fa-stethoscope"></i> <span>{{ trans('menu.backend.sidebar.doctor') }}</span></a></li>
            @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist']))
                <li class="{{ Active::pattern('patient') }}" ><a href="{{ route('admin.patient.index') }}"><i class='fa fa-user'></i> <span>{{ trans('menu.backend.sidebar.patient') }}</span></a></li>
            @endif

            @if(Auth::user()->group[0]['name'] == 'admin')
                <li class="treeview {{ Active::pattern(['nurse', 'pharmacist', 'laboratorist', 'accountant', 'receptionist', 'transcriptionist']) }}">
                    <a href="#">
                        <i class='fa fa-users'></i>
                        <span>{{ trans('menu.backend.sidebar.human-resource.title') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.nurse.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.nurse') }}</a></li>
                        <li><a href="{{ route('admin.pharmacist.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.pharmacist') }}</a></li>
                        <li><a href="{{ route('admin.laboratorist.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.laboratorist') }}</a></li>
                        <li><a href="{{ route('admin.accountant.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.accountant') }}</a></li>
                        <li><a href="{{ route('admin.receptionist.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.receptionist') }}</a></li>
                        <li><a href="{{ route('admin.transcriptionist.index') }}"><i class="fa fa-user"></i>{{ trans('menu.backend.sidebar.human-resource.transcriptionist') }}</a></li>
                    </ul>
                </li>

                <li class="treeview {{ Active::pattern(['payment', 'payment-billing', 'pharmacy', 'payment-category', 'expense', 'expense-category', 'financial-report']) }}">
                    <a href="#">
                        <i class='fa fa-dollar'></i>
                        <span>{{ trans('menu.backend.sidebar.financial-activities.title') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-money"></i>{{ trans('menu.backend.sidebar.financial-activities.payment') }}<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                        <li><a href="{{ route('admin.payment.index') }}"><i class="fa fa-money"></i>{{ trans('menu.backend.sidebar.billing.payment') }}</a></li>
                        <li><a href="{{ route('admin.pharmacy.index') }}"><i class="fa fa-money"></i>{{ trans('menu.backend.sidebar.billing.pharmacy') }}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('admin.payment-billing.index') }}"><i class="fa fa-edit"></i>{{ trans('menu.backend.sidebar.financial-activities.payment-billing') }}</a></li>
                    <li><a href="{{ route('admin.payment-category.index') }}"><i class="fa fa-edit"></i>{{ trans('menu.backend.sidebar.financial-activities.payment-category') }}</a></li>
                    <li><a href="{{ route('admin.expense.index') }}"><i class="fa fa-money"></i>{{ trans('menu.backend.sidebar.financial-activities.expense') }}</a></li>
                    <li><a href="{{ route('admin.expense-category.index') }}"><i class="fa fa-edit"></i>{{ trans('menu.backend.sidebar.financial-activities.expense-category') }}</a></li>
                    <li><a href="{{ route('admin.financial-report.index') }}"><i class="fa fa-book"></i>{{ trans('menu.backend.sidebar.financial-activities.financial-report') }}</a></li>

                    </ul>
                </li>
            @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor']))
                <li class="treeview {{ Active::pattern(['medicine', 'medicine-category']) }}">
                    <a href="#">
                        <i class='fa fa-medkit'></i>
                        <span>{{ trans('menu.backend.sidebar.medicine.title') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.medicine-category.index') }}"><i class="fa fa-edit"></i>{{ trans('menu.backend.sidebar.medicine.medicine-category') }}</a></li>
                        <li><a href="{{ route('admin.medicine.index') }}"><i class="fa fa-medkit"></i>{{ trans('menu.backend.sidebar.medicine.medicine') }}</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Laboratorist', 'Doctor', 'Transcriptionist']))
                <li class="{{ Active::pattern('donor') }}" ><a href="{{ route('admin.donor.index') }}"><i class='fa fa-user'></i> <span>{{ trans('menu.backend.sidebar.donor') }}</span></a></li>
            @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor']))
                <li class="treeview {{ Active::pattern(['bed', 'bed-category']) }}">
                    <a href="#">
                        <i class='fa fa-hdd-o'></i>
                        <span>Bed</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.bed.index') }}"><i class="fa fa-hdd-o"></i>Bed List</a></li>
                        <li><a href="{{ route('admin.bed-category.index') }}"><i class="fa fa-edit"></i>Bed Category</a></li>
                        <li><a href="{{ route('admin.bed-allotment.index')}}"><i class="fa fa-plus-square-o"></i>Bed Allotments</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Laboratorist', 'Doctor']))
                <li class="treeview {{ Active::pattern(['report-type', 'report']) }}">
                        <a href="#">
                            <i class="fa  fa-hospital-o"></i>
                            <span>Report</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.report-type.index') }}"><i class="fa fa-edit"></i>Report Type</a></li>
                            <li><a href="{{ route('admin.report.index') }}"><i class="fa fa-hospital-o"></i>Reports</a></li>
                            <li><a href="{{ route('admin.echoreport.create') }}"><i class="fa fa-edit"></i>Echo Report</a></li>
                            <li><a href="{{ route('admin.radiologyreport.create') }}"><i class="fa fa-edit"></i>Radiology Report</a></li>
                            <li><a href="{{ route('admin.labreport.create') }}"><i class="fa fa-edit"></i>Lab Report</a></li>
                            <li><a href="{{ route('admin.dischargesummary.create') }}"><i class="fa fa-edit"></i>Discharge Summary</a></li>
                        </ul>
                 </li>
             @endif

            @if(in_array(Auth::user()->group[0]['name'], ['admin']))
                <li class="{{ Active::pattern('settings') }}" ><a href="{{ route('admin.settings') }}"><i class='fa fa-gears'></i> <span>{{ trans('menu.backend.sidebar.settings') }}</span></a></li>
            @endif

            <li class="{{ Active::pattern('profile') }}" ><a href="{{ route('admin.profile') }}"><i class='fa fa-user'></i> <span>{{ trans('menu.backend.sidebar.profile') }}</span></a></li>


            <!-- <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li> -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
