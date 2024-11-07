<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Homework extends Model
{
    use HasMedias, HasFiles, HasFactory;

    protected $table = 'homeworks';

    protected $fillable = [
        'published',
        'title',
        'description',
        'lesson_id',
        'deadline',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function solutions(): HasMany
    {
       return $this->hasMany(Solution::class);
    }

}
