<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
use App\Models\Doctor\Doctor;
use App\Models\Patient\Patient;

Route::group(['middleware' => 'web'],

function () {

		Route::auth();

		Route::get('/', 'HomeController@index')->name('admin.home');
		Route::get('home', 'HomeController@index')->name('admin.home');
		Route::get('profile', 'HomeController@profile')->name('admin.profile');
		Route::post('updateProfile', 'HomeController@updateProfile')->name('admin.updateProfile');
		Route::get('checkEmail', 'HomeController@checkemail')->name('admin.checkemail');

		Route::group(['middleware' => 'permission:manage-setting'], function () {
				// Settings
				Route::get('settings', 'HomeController@settings')->name('admin.settings');
				Route::post('updateSettings', 'HomeController@updateSettings')->name('admin.updateSettings');
			});

		Route::group(['middleware' => 'permission:manage-hospital'], function () {
				// Hospital Module
				Route::get('hospital', 'HospitalController@index')->name('admin.hospital.index');
				Route::post('hospital/store', 'HospitalController@store')->name('admin.hospital.store');
				Route::get('hospital/get', 'HospitalController@get')->name('admin.hospital.get');
				Route::get('hospital/edit/{id}', 'HospitalController@edit')->name('admin.hospital.edit');
				Route::post('hospital/update', 'HospitalController@update')->name('admin.hospital.update');
				Route::post('hospital/destroy/{id}', 'HospitalController@destroy')->name('admin.hospital.destroy');
			});

		Route::group(['middleware' => 'permission:manage-department'], function () {
				// Department Module
				Route::get('department', 'DepartmentController@index')->name('admin.department.index');
				Route::post('department/store', 'DepartmentController@store')->name('admin.department.store');
				Route::get('department/get', 'DepartmentController@get')->name('admin.department.get');
				Route::get('department/edit/{id}', 'DepartmentController@edit')->name('admin.department.edit');
				Route::post('department/update', 'DepartmentController@update')->name('admin.department.update');
				Route::post('department/destroy/{id}', 'DepartmentController@destroy')->name('admin.department.destroy');
			});

		Route::group(['middleware' => 'permission:manage-doctor'], function () {
				// Doctors Module
				Route::get('doctor', 'DoctorController@index')->name('admin.doctor.index');
				Route::post('doctor/store', 'DoctorController@store')->name('admin.doctor.store');
				Route::get('doctor/get', 'DoctorController@get')->name('admin.doctor.get');
				Route::get('doctor/edit/{id}', 'DoctorController@edit')->name('admin.doctor.edit');
				Route::post('doctor/update', 'DoctorController@update')->name('admin.doctor.update');
				Route::post('doctor/destroy/{id}', 'DoctorController@destroy')->name('admin.doctor.destroy');
			});

		Route::group(['middleware' => 'permission:manage-patient'], function () {
				// Patients Module
				Route::get('patient', 'PatientController@index')->name('admin.patient.index');
				Route::post('patient/store', 'PatientController@store')->name('admin.patient.store');
				Route::get('patient/get', 'PatientController@get')->name('admin.patient.get');
				Route::get('patient/edit/{id}', 'PatientController@edit')->name('admin.patient.edit');
				Route::post('patient/update', 'PatientController@update')->name('admin.patient.update');
				Route::post('patient/destroy/{id}', 'PatientController@destroy')->name('admin.patient.destroy');
				Route::get('patient/show/{id}', 'PatientController@show')->name('admin.patient.show');
				Route::get('patient/invoice/{id}/{status?}', 'PatientController@invoice')->name('admin.patient.invoice');
				Route::get('patient/makePaid/{id}', 'PatientController@makePaid')->name('admin.patient.makePaid');
				Route::get('patient/bill/{id}', 'PatientController@bill')->name('admin.patient.bill');
			});

		Route::group(['middleware' => 'permission:manage-human-resource'], function () {
				// Human Resources/ Nurse  Module
				Route::get('nurse', 'NurseController@index')->name('admin.nurse.index');
				Route::post('nurse/store', 'NurseController@store')->name('admin.nurse.store');
				Route::get('nurse/get', 'NurseController@get')->name('admin.nurse.get');
				Route::get('nurse/edit/{id}', 'NurseController@edit')->name('admin.nurse.edit');
				Route::post('nurse/update', 'NurseController@update')->name('admin.nurse.update');
				Route::post('nurse/destroy/{id}', 'NurseController@destroy')->name('admin.nurse.destroy');
				// Human Resources/ Pharmacist  Module
				Route::get('pharmacist', 'PharmacistController@index')->name('admin.pharmacist.index');
				Route::post('pharmacist/store', 'PharmacistController@store')->name('admin.pharmacist.store');
				Route::get('pharmacist/get', 'PharmacistController@get')->name('admin.pharmacist.get');
				Route::get('pharmacist/edit/{id}', 'PharmacistController@edit')->name('admin.pharmacist.edit');
				Route::post('pharmacist/update', 'PharmacistController@update')->name('admin.pharmacist.update');
				Route::post('pharmacist/destroy/{id}', 'PharmacistController@destroy')->name('admin.pharmacist.destroy');

				// Human Resources/ Laboratorist  Module
				Route::get('laboratorist', 'LaboratoristController@index')->name('admin.laboratorist.index');
				Route::post('laboratorist/store', 'LaboratoristController@store')->name('admin.laboratorist.store');
				Route::get('laboratorist/get', 'LaboratoristController@get')->name('admin.laboratorist.get');
				Route::get('laboratorist/edit/{id}', 'LaboratoristController@edit')->name('admin.laboratorist.edit');
				Route::post('laboratorist/update', 'LaboratoristController@update')->name('admin.laboratorist.update');
				Route::post('laboratorist/destroy/{id}', 'LaboratoristController@destroy')->name('admin.laboratorist.destroy');

				// Human Resources/ Accountant  Module
				Route::get('accountant', 'AccountantController@index')->name('admin.accountant.index');
				Route::post('accountant/store', 'AccountantController@store')->name('admin.accountant.store');
				Route::get('accountant/get', 'AccountantController@get')->name('admin.accountant.get');
				Route::get('accountant/edit/{id}', 'AccountantController@edit')->name('admin.accountant.edit');
				Route::post('accountant/update', 'AccountantController@update')->name('admin.accountant.update');
				Route::post('accountant/destroy/{id}', 'AccountantController@destroy')->name('admin.accountant.destroy');

				// Human Resources/ receptionist  Module
				Route::get('receptionist', 'ReceptionistController@index')->name('admin.receptionist.index');
				Route::post('receptionist/store', 'ReceptionistController@store')->name('admin.receptionist.store');
				Route::get('receptionist/get', 'ReceptionistController@get')->name('admin.receptionist.get');
				Route::get('receptionist/edit/{id}', 'ReceptionistController@edit')->name('admin.receptionist.edit');
				Route::post('receptionist/update', 'ReceptionistController@update')->name('admin.receptionist.update');
				Route::post('receptionist/destroy/{id}', 'ReceptionistController@destroy')->name('admin.receptionist.destroy');

				// Human Resources/ transcriptionist  Module
				Route::get('transcriptionist', 'TranscriptionistController@index')->name('admin.transcriptionist.index');
				Route::post('transcriptionist/store', 'TranscriptionistController@store')->name('admin.transcriptionist.store');
				Route::get('transcriptionist/get', 'TranscriptionistController@get')->name('admin.transcriptionist.get');
				Route::get('transcriptionist/edit/{id}', 'TranscriptionistController@edit')->name('admin.transcriptionist.edit');
				Route::post('transcriptionist/update', 'TranscriptionistController@update')->name('admin.transcriptionist.update');
				Route::post('transcriptionist/destroy/{id}', 'TranscriptionistController@destroy')->name('admin.transcriptionist.destroy');
			});

		Route::group(['middleware' => 'permission:manage-medicine'], function () {
				// Medicine / Medicine Category  Module
				Route::get('medicine-category', 'MedicineCategoryController@index')->name('admin.medicine-category.index');
				Route::post('medicine-category/store', 'MedicineCategoryController@store')->name('admin.medicine-category.store');
				Route::get('medicine-category/get', 'MedicineCategoryController@get')->name('admin.medicine-category.get');
				Route::get('medicine-category/edit/{id}', 'MedicineCategoryController@edit')->name('admin.medicine-category.edit');
				Route::post('medicine-category/destroy/{id}', 'MedicineCategoryController@destroy')->name('admin.medicine-category.destroy');

				// Medicine / Medicine List  Module
				Route::get('medicine', 'MedicineController@index')->name('admin.medicine.index');
				Route::post('medicine/store', 'MedicineController@store')->name('admin.medicine.store');
				Route::get('medicine/get', 'MedicineController@get')->name('admin.medicine.get');
				Route::get('medicine/edit/{id}', 'MedicineController@edit')->name('admin.medicine.edit');
				Route::post('medicine/destroy/{id}', 'MedicineController@destroy')->name('admin.medicine.destroy');
				Route::post('medicine/import', 'MedicineController@import')->name('admin.medicine.import');
			});

		Route::group(['middleware' => 'permission:manage-donor'], function () {
				// Donor  Module
				Route::get('donor', 'DonorController@index')->name('admin.donor.index');
				Route::post('donor/store', 'DonorController@store')->name('admin.donor.store');
				Route::get('donor/get', 'DonorController@get')->name('admin.donor.get');
				Route::get('donor/edit/{id}', 'DonorController@edit')->name('admin.donor.edit');
				Route::post('donor/destroy/{id}', 'DonorController@destroy')->name('admin.donor.destroy');
			});

		Route::group(['middleware' => 'permission:manage-bed'], function () {
				// Bed / Bed Category  Module
				Route::get('bed-category', 'BedCategoryController@index')->name('admin.bed-category.index');
				Route::post('bed-category/store', 'BedCategoryController@store')->name('admin.bed-category.store');
				Route::get('bed-category/get', 'BedCategoryController@get')->name('admin.bed-category.get');
				Route::get('bed-category/edit/{id}', 'BedCategoryController@edit')->name('admin.bed-category.edit');
				Route::post('bed-category/destroy/{id}', 'BedCategoryController@destroy')->name('admin.bed-category.destroy');

				// Bed / Bed List  Module
				Route::get('bed', 'BedController@index')->name('admin.bed.index');
				Route::post('bed/store', 'BedController@store')->name('admin.bed.store');
				Route::get('bed/get', 'BedController@get')->name('admin.bed.get');
				Route::get('bed/edit/{id}', 'BedController@edit')->name('admin.bed.edit');
				Route::post('bed/destroy/{id}', 'BedController@destroy')->name('admin.bed.destroy');

				// Bed / Bed Allotment Module
				Route::get('bed-allotment', 'BedAllotmentController@index')->name('admin.bed-allotment.index');
				Route::post('bed-allotment/store', 'BedAllotmentController@store')->name('admin.bed-allotment.store');
				Route::get('bed-allotment/get', 'BedAllotmentController@get')->name('admin.bed-allotment.get');
				Route::get('bed-allotment/edit/{id}', 'BedAllotmentController@edit')->name('admin.bed-allotment.edit');
				Route::post('bed-allotment/destroy/{id}', 'BedAllotmentController@destroy')->name('admin.bed-allotment.destroy');
			});

		Route::group(['middleware' => 'permission:manage-financial-activities'], function () {
				// Finance / Payment Module
				Route::get('payment', 'PaymentController@index')->name('admin.payment.index');
				Route::get('payment/get', 'PaymentController@get')->name('admin.payment.get');
				Route::get('payment/create', 'PaymentController@create')->name('admin.payment.create');
				Route::get('payment/getpayment', 'PaymentController@getpayment')->name('admin.payment.getpayment');
				Route::get('payment/getcategory', 'PaymentController@getcategory')->name('admin.payment.getcategory');
				Route::put('payment/store/{id?}', 'PaymentController@store')->name('admin.payment.store');
				Route::get('payment/edit/{id}', 'PaymentController@edit')->name('admin.payment.edit');
				Route::get('payment/invoice/{id}', 'PaymentController@invoice')->name('admin.payment.invoice');
				Route::get('payment/makePaid/{id}', 'PaymentController@makePaid')->name('admin.payment.makePaid');
				Route::post('payment/destroy/{id}', 'PaymentController@destroy')->name('admin.payment.destroy');

				// Finance / Payment Billing Type Module
				Route::get('payment-billing', 'PaymentBillingController@index')->name('admin.payment-billing.index');
				Route::post('payment-billing/store', 'PaymentBillingController@store')->name('admin.payment-billing.store');
				Route::get('payment-billing/get', 'PaymentBillingController@get')->name('admin.payment-billing.get');
				Route::get('payment-billing/edit/{id}', 'PaymentBillingController@edit')->name('admin.payment-billing.edit');
				Route::post('payment-billing/destroy/{id}', 'PaymentBillingController@destroy')->name('admin.payment-billing.destroy');

				//Finance / Pharmacy Module
				Route::get('pharmacy', 'PharmacyController@index')->name('admin.pharmacy.index');
				Route::get('pharmacy/create', 'PharmacyController@create')->name('admin.pharmacy.create');
				Route::get('pharmacy/getpayment', 'PharmacyController@getpayment')->name('admin.pharmacy.getpayment');
				Route::put('pharmacy/store/{id?}', 'PharmacyController@store')->name('admin.pharmacy.store');
				Route::get('pharmacy/get', 'PharmacyController@get')->name('admin.pharmacy.get');
				Route::post('pharmacy/destroy/{id}', 'PharmacyController@destroy')->name('admin.pharmacy.destroy');
				Route::get('pharmacy/invoice/{id}', 'PharmacyController@invoice')->name('admin.pharmacy.invoice');
				Route::get('pharmacy/edit/{id}', 'PharmacyController@edit')->name('admin.pharmacy.edit');

				// Finance / Payment Category Module
				Route::get('payment-category', 'PaymentCategoryController@index')->name('admin.payment-category.index');
				Route::post('payment-category/store', 'PaymentCategoryController@store')->name('admin.payment-category.store');
				Route::get('payment-category/get', 'PaymentCategoryController@get')->name('admin.payment-category.get');
				Route::get('payment-category/edit/{id}', 'PaymentCategoryController@edit')->name('admin.payment-category.edit');
				Route::post('payment-category/destroy/{id}', 'PaymentCategoryController@destroy')->name('admin.payment-category.destroy');

				// Finance / Expense Module
				Route::get('expense', 'ExpenseController@index')->name('admin.expense.index');
				Route::post('expense/store', 'ExpenseController@store')->name('admin.expense.store');
				Route::get('expense/get', 'ExpenseController@get')->name('admin.expense.get');
				Route::get('expense/edit/{id}', 'ExpenseController@edit')->name('admin.expense.edit');
				Route::post('expense/destroy/{id}', 'ExpenseController@destroy')->name('admin.expense.destroy');

				// Finance / Expense Category Module
				Route::get('expense-category', 'ExpenseCategoryController@index')->name('admin.expense-category.index');
				Route::post('expense-category/store', 'ExpenseCategoryController@store')->name('admin.expense-category.store');
				Route::get('expense-category/get', 'ExpenseCategoryController@get')->name('admin.expense-category.get');
				Route::get('expense-category/edit/{id}', 'ExpenseCategoryController@edit')->name('admin.expense-category.edit');
				Route::post('expense-category/destroy/{id}', 'ExpenseCategoryController@destroy')->name('admin.expense-category.destroy');

				// Finance / Financial Report Module
				Route::get('financial-report', 'FinancialReportController@index')->name('admin.financial-report.index');
				Route::post('financial-report', 'FinancialReportController@index')->name('admin.financial-report.search');
			});

		Route::group(['middleware' => 'permission:manage-report'], function () {
				// Report / Add report Module
				Route::get('report-type', 'ReportTypeController@index')->name('admin.report-type.index');
				Route::post('report-type/store', 'ReportTypeController@store')->name('admin.report-type.store');
				Route::get('report-type/get', 'ReportTypeController@get')->name('admin.report-type.get');

				// Report / Reports Module
				Route::get('report', 'ReportController@index')->name('admin.report.index');
				Route::post('report/store', 'ReportController@store')->name('admin.report.store');
				Route::get('report/get', 'ReportController@get')->name('admin.report.get');
				Route::get('report/edit/{id}', 'ReportController@edit')->name('admin.report.edit');
				Route::post('report/destroy/{id}', 'ReportController@destroy')->name('admin.report.destroy');

				Route::get('dischargesummary/create', 'DischargeSummaryController@create')->name('admin.dischargesummary.create');

				Route::get('radiologyreport/create', 'RadiologyReportController@create')->name('admin.radiologyreport.create');

				Route::get('labreport/create', 'LabReportController@create')->name('admin.labreport.create');

				Route::put('echoreport/store', 'EchoReportController@store')->name('admin.echoreport.store');
				Route::get('echoreport/create', 'EchoReportController@create')->name('admin.echoreport.create');
				Route::get('/ajax-subcat', function () {
						$cat_id = Input::get('cat_id');
						$doc_id = Patient::where('id', $cat_id)->pluck('doctor_id');
						$subcategory = Doctor::where('id', '=', $doc_id)->get();
						return Response::json($subcategory);
					});

			});

	});
