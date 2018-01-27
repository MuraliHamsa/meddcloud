<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access Management',

            'roles' => [
                'all' => 'All Roles',
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'All Users',
                'change-password' => 'Change Password',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'main' => 'Users',
                'view' => 'View User',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'hospital' => 'All Hospitals',
            'general' => 'General',
            'system' => 'System',
            'profile' => 'Profile',
            'department' => 'Departments',
            'doctor' => 'Doctor',
            'human-resource' => [
                'title' => 'Human Resources',
                'nurse' => 'Nurse',
                'pharmacist' => 'Pharmacist',
                'laboratorist' => 'Laboratorist',
                'accountant' => 'Accountant',
                'receptionist' => 'Receptionist',
                'transcriptionist' => 'Medical Transcriptionist'
            ], 
            'financial-activities' => [
                'title' => 'Financial Activities',
                'payment' => 'Payment',
                'payment-billings' => 'Payment Billing',
                'payment-billing' => 'Payment Billing Type',
                'payment-category' => 'Payment Category',
                'expense' => 'Expense',
                'expense-category' => 'Expense Category',
                'financial-report' => 'Financial Report',
            ],
            'billing' => [
                'payment' => 'Patient Billing',
                'pharmacy' => 'pharmacy Billing'
            ],
            'medicine' => [
                'title' => 'Medicine',
                'medicine' => 'Medicine List',
                'medicine-category' => 'Medicine Category',
            ],
            'patient' => 'Patient',
            'donor' => 'Donor',

            'bed' => [
                'title' => 'Bed',
                'bed' => 'Bed List',
                'bed-category' => 'Bed Category',
                'bed-allotment' => 'Alloted Beds',
            ],

            'report' => [
                'title' => 'Report',
                'report-type' => 'Report type',
                'report' => 'Reports',
            ],

            'settings' => 'Settings',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'Arabic',
            'da' => 'Danish',
            'de' => 'German',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'it' => 'Italian',
            'nl' => 'Dutch',
            'pt-BR' => 'Brazilian Portuguese',
            'sv' => 'Swedish',
            'th' => 'Thai',
        ],
    ],
];
