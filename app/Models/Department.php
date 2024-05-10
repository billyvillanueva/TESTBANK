<?php

namespace App\Models;
use App\Models\QuizModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
       'instructor',
       'department',
       'term',
       'coursecode',
       'difficulty'
    ];

    public function quizmodel()
    {
        return $this->hasMany(QuizModel::class, 'deparment_name', 'department');
    }
}
