<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = ['student_id', 'total_fee', 'amount_paid', 'balance', 'due_date', 'term'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
