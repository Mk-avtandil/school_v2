<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function homework(): belongsTo
    {
        return $this->belongsTo(Homework::class);
    }

    public function student(): belongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

}
