<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;
    public function course()  {
        return $this->belongsTo(Course::class);
    }

    public function teacher()  {
        return $this->belongsTo(Teacher::class);
    }
}
