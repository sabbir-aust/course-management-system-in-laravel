<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Classes;
use App\Models\Faculty;
use App\Models\CourseRegistration;

class Course extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }


    
}
