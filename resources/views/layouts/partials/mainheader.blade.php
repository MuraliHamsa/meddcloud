<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('admin.home') }}" class="logo">
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
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Nurse', 'Doctor', 'Receptionist'])) 
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-hdd-o"></i>
                            <span class="label label-success">{{@$data['bedcount']}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['bedcount'] > 0)
                                    {{ @$data['bedcount'] }} {{'Beds are available'}} 
                                @else 
                                    {{ 'No Beds are available' }}
                                @endif
                            </li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="{{route('admin.bed-allotment.index')}}">
                                            <!-- The message -->
                                            <p>@if(@$data['bedcount'] > 0)
                                                    {{'Add a allotment'}} 
                                                @else 
                                                    {{ 'No Beds are available for allotment' }}
                                                @endif</p>
                                        </a>
                                    </li><!-- end message -->
                                </ul><!-- /.menu -->
                            </li>
                            <!-- <li class="footer"><a href="#">c</a></li> -->
                        </ul>
                    </li><!-- /.messages-menu -->
                @endif

                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist'])) 
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-money"></i>
                            <span class="label label-warning">{{ @$data['paymentcount'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['paymentcount'] > 0)
                                    {{ @$data['paymentcount'] }} Payments Today
                                @endif
                            </li>
                            <li class="footer"><a href="{{ route('admin.payment.index') }}">View all Payments</a></li>
                        </ul>
                    </li>
                @endif

                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist','Receptionist','Transcriptionist'])) 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="label label-danger">{{ @$data['patientcount'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['patientcount'] > 0)
                                    {{ @$data['patientcount'] }} Patients Registered Today
                                @endif
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.patient.index') }}">View all Patients</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist','Receptionist','Transcriptionist'])) 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="label label-success">{{ @$data['donorcount'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['donorcount'] > 0)
                                    {{ @$data['donorcount'] }} Donor Registered Today
                                @endif
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.donor.index') }}">View all Donors</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Pharmacist', 'Doctor'])) 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-medkit"></i>
                            <span class="label label-warning">{{ @$data['medicinecount'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['medicinecount'] > 0)
                                    {{ @$data['medicinecount'] }} Medicines added Today
                                @endif
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.medicine.index') }}">View all Medicines</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(in_array(Auth::user()->group[0]['name'], ['admin', 'Doctor', 'Laboratorist', 'Nurse','Receptionist','Transcriptionist'])) 
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-hospital-o"></i>
                            <span class="label label-danger">{{ @$data['reportcount'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                @if(@$data['reportcount'] > 0)
                                    {{ @$data['reportcount'] }} Reports added Today
                                @endif
                            </li>
                            <li class="footer">
                                <a href="{{ route('admin.medicine.index') }}">View all Reports</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset('logo.png')}}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset('logo.png')}}" class="img-circle" alt="User Image" />
                                <p>
                                    {{ Auth::user()->username }}
                                    <small>{{ trans('adminlte_lang::message.login') }} {{ date("M", strtotime(Auth::user()->last_login)) }} {{ date("Y", strtotime(Auth::user()->last_login)) }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#"><i class="fa fa-gears"></i></a>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
        </div>
    </nav>
</header>
