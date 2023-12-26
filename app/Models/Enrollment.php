<?php

namespace App\Models;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;
    public function batch()  {
        return $this->belongsTo(Batch::class);
    }

    public function student()  {
        return $this->belongsTo(Student::class);
    }

    public function course()  {
        return $this->belongsTo(Course::class);
    }
}
