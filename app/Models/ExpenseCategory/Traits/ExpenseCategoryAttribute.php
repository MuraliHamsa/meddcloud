<?php

namespace App\Models\ExpenseCategory\Traits;

/**
 * Class ExpenseCategoryAttribute
 * @package App\Models\ExpenseCategory\Traits;
 */
trait ExpenseCategoryAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.expense-category.edit', $this) . '" class="btn btn-xs btn-primary edit-expense-category" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.expense-category.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-expense-category" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Expense Category" data-message="Are you sure to delete Expense Category?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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