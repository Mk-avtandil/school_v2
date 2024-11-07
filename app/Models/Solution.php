<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;

class Solution extends Model
{
    use HasMedias, HasFiles, HasFactory;

    public $filesParams = ['solution_files'];

    protected $fillable = [
        'published',
        'title',
        'description',
        'homework_id',
        'student_id'
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
