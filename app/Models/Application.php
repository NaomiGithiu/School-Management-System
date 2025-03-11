<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $primarykey = 'id';
    protected $fillable = ['student_id', 'program_id', 'application_status', 'submitted_at'];
}
