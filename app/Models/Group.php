<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasRelated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory, HasRelated;
    protected $fillable = [
        'published',
        'title',
        'description',
        'start_time',
        'end_time',
        'course_id',
        'student_id',
        'position',
    ];

    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class, 'twill_related', 'subject_id', 'related_id');
    }

    public function teachers(): belongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'twill_related', 'subject_id', 'related_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
