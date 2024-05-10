<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class QuizModel extends Model
{
    protected $table = 'quiz_models';
    protected $fillable = [
       'Qnum',
       'Question',
       'Aa',
       'Ab',
       'Ac',
       'Ad',
       'Akey',
       'department_name'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
