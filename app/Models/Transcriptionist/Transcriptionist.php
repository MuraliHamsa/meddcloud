<?php

namespace App\Models\Transcriptionist;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transcriptionist\Traits\TranscriptionistAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transcriptionist extends Model
{
    use TranscriptionistAttribute;
    
    protected $table = 'transcriptionist';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['image', 'name', 'address', 'phone', 'hospital_id', 'email', 'user_id'];

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

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
