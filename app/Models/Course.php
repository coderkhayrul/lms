<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    //    has curriculum
    public function curriculums(): HasMany
    {
        return $this->hasMany(curriculum::class);
    }
//    student relation
    public function students(): HasMany
    {
        return $this->hasMany(User::class, 'course_student', 'course_id', 'user_id');
    }
}
