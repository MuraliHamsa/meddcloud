<?php

namespace App\Models\BedAllotment\Traits;

/**
 * Class BedCategoryAttribute
 * @package App\Models\BedAllotment\Traits;
 */
trait BedAllotmentAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.bed-allotment.edit', $this) . '" class="btn btn-xs btn-primary edit-bed-allotment" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.bed-allotment.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-bed-allotment" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Bed Allotment" data-message="Are you sure to delete Bed Allotment?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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