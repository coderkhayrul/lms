<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    //    has curriculum
    public function curriculums(): HasMany
    {
        return $this->hasMany(curriculum::class);
    }
}
