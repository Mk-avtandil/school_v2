<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasMedias, HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function groups(): belongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_teacher');
    }

}
