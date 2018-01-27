<?php

namespace App\Models\BedCategory\Traits;

/**
 * Class BedCategoryAttribute
 * @package App\Models\BedCategory\Traits;
 */
trait BedCategoryAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.bed-category.edit', $this) . '" class="btn btn-xs btn-primary edit-bed-category" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.bed-category.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-bed-category" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Bed Category" data-message="Are you sure to delete Bed Category?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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