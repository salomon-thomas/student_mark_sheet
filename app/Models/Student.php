<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id',
    ];
    protected $dates = ['created_at', 'updated_at'];
    
    public function mark_sheets(){
        return $this->hasMany(MarkSheet::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
