<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $table = 'school_classes'; // Table name
    protected $fillable = ['name', 'capacity', 'subject'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subjects()
{
    return $this->belongsToMany(Subject::class, 'class_subject', 'class_id', 'subject_id');
}

}
