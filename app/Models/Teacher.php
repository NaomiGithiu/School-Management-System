<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'name', 'email', 'contact', 'gender', 'subject', 'hire_date', 'status'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
