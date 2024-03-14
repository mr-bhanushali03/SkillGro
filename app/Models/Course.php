<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'level',
        'actualPrice',
        'sellingPrice',
        'category',
        'description',
        'banner',
        'curriculumTitle',
        'curriculumDescription',
        'tutorials',
        'user_id',
        'student',
        'rating',
        'trending',
    ];
}
