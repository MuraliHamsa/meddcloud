<?php

// Home
Breadcrumbs::register('admin.home', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('admin.home'));
});

Breadcrumbs::register('admin.hospital.index', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('All Hospitals', route('admin.hospital.index'));
});

Breadcrumbs::register('admin.profile', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Profile', route('admin.profile'));
});

Breadcrumbs::register('admin.department.index', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Departments', route('admin.department.index'));
});

Breadcrumbs::register('admin.doctor.index', function($breadcrumbs)
{
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Doctor', route('admin.doctor.index'));
});