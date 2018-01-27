<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'print' => 'Print',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'hospital' => [
            'management' => 'Hospital Management',
            'title' => 'All Hospitals',
            'create' => 'Create New Hospital',

            'table' => [
                'title' => 'Title',
                'email' => 'Email',
                'address' => 'Address',
                'phone' => 'Phone',
                'total' => 'hospital total|hospitals total',
            ],
        ],

        'department' => [
            'management' => 'Department Management',
            'title' => 'Department',
            'create' => 'Add Department',

            'table' => [
                'name' => 'Name',
                'description' => 'Description',
            ],
        ],  

        'human_resources' => [
            'nurse' => [
                'management' => 'Nurse Management',
                'title' => 'Nurse',
                'create' => 'Add New Nurse',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],
            ],

            'pharmacist' => [
                'management' => 'Pharmacist Management',
                'title' => 'Pharmacist',
                'create' => 'Add New Pharmacist',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],

            ],

            'laboratorist' => [
                'management' => 'Laboratorist Management',
                'title' => 'Laboratorist',
                'create' => 'Add New Laboratorist',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],

            ],

            'accountant' => [
                'management' => 'Accountant Management',
                'title' => 'Accountant',
                'create' => 'Add New Accountant',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],

            ],

            'receptionist' => [
                'management' => 'Receptionist Management',
                'title' => 'Receptionist',
                'create' => 'Add New Receptionist',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],

            ],

            'transcriptionist' => [
                'management' => 'Transcriptionist Management',
                'title' => 'Medical Transcriptionist',
                'create' => 'Add Medical Transcriptionist',

                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'address' => 'Address',
                    'phone' => 'Phone',
                ],
            ],
        ],

        'financial-activities' => [
            'payment-billing' => [
                'management' => 'Payment Billing Type',
                'title' => 'Payment Billing Type',
                'create' => 'Add Payment Billing Type',

                'table' => [
                    'name' => 'Billing Type',
                ],
            ],
            
            'payment-category' => [
                'management' => 'Payment Category',
                'title' => 'Payment Category',
                'create' => 'Add Payment Category',
                
                'table' => [
                    'payment_type' => 'Billing Type',
                    'category' => 'Category',
                    'amount' => 'Amount',
               ],
            ],

            'payment' => [
                'management' => 'Payments',
                'title' => 'Payments',
                'create' => 'Patient Billing',
                'edit' => 'Edit Payment',
                'invoice' => 'Invoice',
                
                'table' => [
                    'patient' => 'Patient',
                    'sub_total' => 'Sub Total',
                    'date' => 'Date',
                    'discount' => 'Discount',
                    'vat' => 'VAT',
                    'total' => 'Total',
                    'status' => 'Status',
               ],
            ],

            'pharmacy' => [
                'create' => 'Add New Payment',
                'title' => 'Pharmacy Billing',
                'patient' => 'Patient',
                'doctor' => 'Doctor',
                'submit' => 'Submit',

                'table' => [
                    'drugname' => 'Drug Name',
                    'companyname' => 'Company Name',
                    'quantity' => 'Quantity',
                    'price' => 'Price',
                    'search' => 'Search',
                    'drugs' => 'Drugs',
                    'add' => 'Add',
                    'total' => 'Total',       
                ],
            ],

            'expense' => [
                'management' => 'Expense',
                'title' => 'Expense',
                'create' => 'Add Expense',
                
                'table' => [
                    'category' => 'Category',
                    'created_at' => 'Date',
                    'amount' => 'Amount',
               ],

            ],

            'expense-category' => [
                'management' => 'Expense Category',
                'title' => 'Expense Category',
                'create' => 'Add Expense Category',
                
                'table' => [
                    'category' => 'Category',
                    'description' => 'Description',
               ],

            ],

            'financial-report' => [
                'management' => 'Financial Report',
                'title' => 'Financial Report',
                'from' => 'From Date',
                'to' => 'To Date',
                'gross_payment' => 'Gross Payment',
                'gross_expense' => 'Gross Expense',
                'profit' => 'Profit',

                'table' => [
                    'category' => 'Category',
                    'amount' => 'Amount',
                    'payment' => 'Payment Report',
                    'sub_total' => 'Sub Total',
                    'total_discount' => 'Total Discount',
                    'total_vat' => 'Total VAT',
                    'expense' =>'Expense Report',
                ],
            ],
                               
        ],

        'medicine' => [
            'import_file' => 'Import Medicine',
            
            'medicine' => [
                'management' => 'Medicine',
                'title' => 'Medicine',
                'create' => 'Add Medicine',

                'table' => [
                    'name' => 'Name',
                    'category' => 'Category',
                    'price' => 'Price',
                    'qty' => 'Quantity',
                    'generic-name' => 'Generic Name',
                    'company' => 'Company',
                    'effects' => 'Effects',
                    'expiry-date' => 'Expiry Date',
                ],
            ],

            'medicine-category' => [
                'management' => 'Medicine Category',
                'title' => 'Medicine Category',
                'create' => 'Add Medicine Category',

                'table' => [
                    'name' => 'Name',
                    'description' => 'Description',
                ],
            ],
        ],

        'doctor' => [
            'management' => 'Doctor Management',
            'title' => 'Doctors',
            'create' => 'Add Doctor',

            'table' => [
                'image' => 'Image',
                'name' => 'Name',
                'phone' => 'Phone',
                'department' => 'Department',
            ],
        ],

        'patient' => [
            'management' => 'Patient Management',
            'title' => 'Patients',
            'create' => 'Add Patient',
            'invoice' => 'Invoice',
            'view' => 'Patient Details',
            'bill' => 'Out Patient Bill',

            'table' => [
                'patientId' => 'Patient Id',
                'add_date' => 'Registered Date',
                'name' => 'Name',
                'doctor' => 'Consultant Name',
                'ref_doctor' => 'Referring Doctor',
                'phone' => 'Phone',
                'bloodgroup' => 'Blood Group',
                'email' => 'Email',
                'birthdate' => 'Birth Date',
                'due' => 'Due Balance',
            ],
        ],

        'donor' => [
            'management' => 'Donor List',
            'title' => 'Donor',
            'create' => 'Add Donor',

            'table' => [
                'name' => 'Name',
                'group' => 'Blood Group',
                'age' => 'Age',
                'sex' => 'Gender',
                'last_donation' => 'Last Donation Date',
                'phone' => 'Phone',
                'email' => 'Email',
            ],
        ],

        'bed' => [
            'bed' => [
                'management' => 'Bed',
                'title' => 'Bed',
                'create' => 'Add New Bed',

                'table' => [
                    'bedId' => 'Bed Id',
                    'description' => 'Description',
                    'status' => 'Status',
                    
                ],
            ],

            'bed-category' => [
                'management' => 'Bed Category',
                'title' => 'Bed Category',
                'create' => 'Add Bed Category',

                'table' => [
                    'category' => 'Category',
                    'description' => 'Description',
                ],
            ],

            'bed-allotment' => [
                'management' => 'Bed Allotment',
                'title' => 'Alloted Beds',
                'create' => 'Add Allotment',

                'table' => [
                    'bedId' => 'Bed Id',
                    'patient' => 'Patient',
                    'allotted_time' => 'Alloted Time',
                    'discharge_time' => 'Discharge Time',
                ],
            ],
        ],


        'report' => [
            'report-type' => [
                'management' => 'Report',
                'title' => 'Report Type',
                'create' => 'Add Report Type',

                'table' => [
                    'name' => 'Report Type',
                ],
            ],

            'report' => [
                'management' => 'Report',
                'title' => 'Report',
                'create' => 'Add New Report',

                'table' => [
                    'type' => 'Report Type',
                    'patient' => 'Patient',
                    'doctor' => 'Doctor',
                    'description' => 'Description',
                    'date' => 'Date',
                    
                ],
            ],

       ],

       'settings' => [
            'management' => 'Settings',
            'system_vendor' => 'system Name',
            'title' => 'Title',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Hospital Email',
            'currency' => 'Currency',
            'discount' => 'Discount Type', 
        ],

        'users' => [
            'title' => 'Profile',
            'management' => 'Manage Profile',
        ],

        'access' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'roles' => 'Roles',
                    'total' => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'status' => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];