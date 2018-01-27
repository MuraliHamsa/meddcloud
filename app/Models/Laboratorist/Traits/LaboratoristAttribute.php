<?php

namespace App\Models\Laboratorist\Traits;

/**
 * Class LaboratoristAttribute
 * @package App\Models\Laboratorist\Traits;
 */
trait LaboratoristAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.laboratorist.edit', $this) . '" class="btn btn-xs btn-primary edit-laboratorist" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.laboratorist.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-laboratorist" data-toggle="modal" data-target="#confirmDelete" data-title="Delete laboratorist" data-message="Are you sure to delete Laboratorist?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}