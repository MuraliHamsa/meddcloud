<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department\Traits\DepartmentAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use DepartmentAttribute;
    
    protected $table = 'department';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['name', 'description', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
