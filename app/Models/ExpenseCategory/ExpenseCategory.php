<?php

namespace App\Models\ExpenseCategory;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseCategory\Traits\ExpenseCategoryAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseCategory extends Model
{
    use ExpenseCategoryAttribute;
    
    protected $table = 'expense_category';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'category', 'description', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
