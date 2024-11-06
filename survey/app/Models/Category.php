<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'title',
    ];

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
