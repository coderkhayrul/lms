<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class curriculum extends Model
{
    use HasFactory;

    protected $guarded = [];
    //    has homeworks
    public function homeworks(): HasMany
    {
        return $this->hasMany(Homework::class);
    }
    //    has attendance
    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    //    has notes
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class , 'curricula_note', 'curricula_id', 'note_id');
    }

    //    has course
    public function course(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
