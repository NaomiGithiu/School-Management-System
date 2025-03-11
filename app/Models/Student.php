<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'email', 'contact', 'password', 'student_id'];

    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_id');
    }


}
