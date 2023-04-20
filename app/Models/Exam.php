<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasFactory;
    //    Exam Has HomeWorks
    public function homeworks(): HasMany
    {
        return $this->hasMany(Homework::class);
    }
}
