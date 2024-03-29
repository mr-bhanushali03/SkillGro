<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['payment_id', 'course_name', 'course_price', 'currency', 'payment_status', 'payment_method', 'student_name', 'student_email', 'student_phone'];
}
