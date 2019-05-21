<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense\Traits\ExpenseAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Expense extends Model
{
    use ExpenseAttribute;
    
    protected $table = 'expense';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['expense_category_id', 'amount', 'created_at', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public static function getExpense($id, $data)
    {
        $result = Expense::select('id', 'expense_category_id', DB::raw("SUM(amount) as amount"))
            ->where(['hospital_id' => $id])
            ->whereBetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [  date('Y-m-d', strtotime($data['from_date'])),  date('Y-m-d', strtotime($data['to_date'])) ])
            ->groupBy('expense_category_id')
            ->get();
        return $result;
    }

    public function expense_category()
    {
        return $this->belongsTo('App\Models\ExpenseCategory\ExpenseCategory')->withTrashed();
    }
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

}
