<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkSheet extends Model
{
    use HasFactory;
    protected $table = 'mark_sheets';
    protected $fillable = [
        'student_id',
        'maths',
        'science',
        'history',
        'term',
        'total',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
