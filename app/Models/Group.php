<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
        'start_time',
        'end_time',
        'course_id'
    ];

    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class, 'group_student');
    }

    public function teachers(): belongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'group_teacher');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
