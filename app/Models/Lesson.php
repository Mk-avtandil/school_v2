<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasMedias, HasFiles, HasFactory;

    public $filesParams = ['lesson_files'];

    protected $fillable = [
        'published',
        'title',
        'description',
        'course_id',
    ];

    public function homeworks(): HasMany
    {
        return $this->hasMany(Homework::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
