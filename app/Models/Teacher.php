<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function students()
    {
        return $this->hasMany(Student::class,'teacher_id');
    }
}
