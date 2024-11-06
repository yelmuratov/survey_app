<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    protected $table = 'option';

    protected $fillable = [
        'survey_id',
        'user_id',
        'option',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
