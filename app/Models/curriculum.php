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
}
