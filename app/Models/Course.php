<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasMedias, HasFiles, HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
        'price'
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

}
