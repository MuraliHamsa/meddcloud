@extends('layouts.app')

@section('htmlheader_title')
	Dashboard
@endsection

@section('contentheader_title')
	Dashboard
@endsection


@section('main-content')

<?php $data = Helpers::getNotification();?>
@if(Auth::user()->group[0]['name'] != 'superadmin')
		@if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist']))
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					@if(Auth::user()->group[0]['name'] == 'admin')
						<a href="{{ route('admin.doctor.index') }}" >
					@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-stethoscope"></i></span>
			            	<div class="info-box-content">
			            		<span class="info-box-text">Doctor</span>
			              		<span class="info-box-number">{{ @$data['doctor'] }}</span>
		              		</div>
		              	</div>
		            @if(Auth::user()->group[0]['name'] == 'admin')
		      			</a>
		      		@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
			        <a href="{{ route('admin.patient.index') }}">
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Patient</span>
			              		<span class="info-box-number">{{ @$data['patient'] }}</span>
			            	</div>
			          	</div>
		          	</a>
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.nurse.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Nurse</span>
			              		<span class="info-box-number">{{ @$data['nurse'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					@if(Auth::user()->group[0]['name'] == 'admin')
						<a href="{{ route('admin.transcriptionist.index') }}">
					@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Transcriptionist</span>
			              		<span class="info-box-number">{{ @$data['transcriptionist'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>
	    	</div>

		    <div class="row">
		    	<div class="col-md-3 col-sm-6 col-xs-12">
		    		@if(Auth::user()->group[0]['name'] == 'admin')
			    		<a href="{{ route('admin.receptionist.index') }}">
			    	@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Receptionist</span>
			              		<span class="info-box-number">{{ @$data['receptionist'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.pharmacist.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-medkit"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Pharmacist</span>
			              		<span class="info-box-number">{{ @$data['pharmacist'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.laboratorist.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Laboratorist</span>
			              		<span class="info-box-number">{{ @$data['laboratorist'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					@if(Auth::user()->group[0]['name'] == 'admin')
						<a href="{{ route('admin.accountant.index') }}">
					@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Accountant</span>
			              		<span class="info-box-number">{{ @$data['accountant'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>
		    </div>

		    <div class="row">
		    	<div class="col-md-3 col-sm-6 col-xs-12">
		    		@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.medicine.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-plus-square-o"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Medicine</span>
			              		<span class="info-box-number">{{ @$data['medicine'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
			    </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.report.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-wheelchair"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Operation Report</span>
			              		<span class="info-box-number">{{ @$data['operation_report'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					@if(Auth::user()->group[0]['name'] == 'admin')
						<a href="{{ route('admin.report.index') }}">
					@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-smile-o"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Birth Report</span>
			              		<span class="info-box-number">{{ @$data['birth_report'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			    		<a href="{{ route('admin.donor.index') }}">
			    	@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Donor</span>
			              		<span class="info-box-number">{{ @$data['donor'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>
		    </div>
		@endif

		<div class="row">
			@if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist','Receptionist','Transcriptionist']))
		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.bed.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Bed</span>
			              		<span class="info-box-number">{{ @$data['bed'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
						<a href="{{ route('admin.department.index') }}">
					@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-sitemap"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Department</span>
			              		<span class="info-box-number">{{ @$data['department'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
			    </div>
			@endif

			@if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist']))
				<div class="col-md-3 col-sm-6 col-xs-12">
		    		@if(Auth::user()->group[0]['name'] == 'admin')
			    		<a href="{{ route('admin.payment.index') }}">
			    	@endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Payment</span>
			              		<span class="info-box-number">{{ @$data['payment'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
		        </div>

		        <div class="col-md-3 col-sm-6 col-xs-12">
		        	@if(Auth::user()->group[0]['name'] == 'admin')
			        	<a href="{{ route('admin.expense.index') }}">
			        @endif
			          	<div class="info-box">
			            	<span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>
			            	<div class="info-box-content">
			              		<span class="info-box-text">Expense</span>
			              		<span class="info-box-number">{{ @$data['expense'] }}</span>
			            	</div>
			          	</div>
			        @if(Auth::user()->group[0]['name'] == 'admin')
		          		</a>
		          	@endif
			    </div>
			@endif
		</div>

		@if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant', 'Receptionist']))
		    <div class="row">
		    	<div class="col-md-6 col-sm-6 col-xs-12">
		          	<div class="info-box">
		            	<span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart-o"></i></span>
		            	<div class="info-box-content">
		              		<span class="info-box-text">Total Payment</span>
		              		<span class="info-box-number">{{ $data['settings'] }} {{ @$data['total_payment'] }}</span>
		            	</div>
		          	</div>
		        </div>
		    </div>
	    @endif

	@endif

	@if(Auth::user()->group[0]['name'] == 'superadmin')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
	               	<div class="box-header with-border">
	                 	<h3 class="box-title">Live Hospitals</h3>

	                  	<div class="box-tools pull-right">
	                   		<span class="label label-danger">{{ count($hospitals) }} Hospitals</span>
	                   		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                   		</button>
	                   		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
	                   		</button>
	                	</div>
	                </div>
	               	<!-- /.box-header -->
	               	@if(!empty($hospitals))
	               		<div class="box-body no-padding">
	                 		<ul class="users-list clearfix">
			                 	@foreach($hospitals as $hospital)
					                <li>
					                    <img src="{{ asset('logo.png') }}" alt="User Image">
					                    <a class="users-list-name" href="#">{{ $hospital->name }}</a>
					                    <span class="users-list-date">Email: {{ $hospital->email }}</span>
					                    <span class="users-list-date">Address: {{ $hospital->address }}</span>
					                    <span class="users-list-date">Phone: {{ $hospital->phone }}</span>
					               	</li>
					            @endforeach
	                  		</ul>
	                  		<!-- /.users-list -->
		                </div>
		               	<!-- /.box-body -->
			            <div class="box-footer text-center">
			                <a href="{{ route('admin.hospital.index') }}" class="uppercase">View All Hospitals</a>
			            </div>
		               	<!-- /.box-footer -->
	                @endif
	            </div>
	        </div>
		</div>
	@endif
@endsection
