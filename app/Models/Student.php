<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasMedias, HasFactory;

    protected $fillable = [
        'published',
        'first_name',
        'last_name',
        'birthday',
        'address',
        'phone',
        'email',
    ];

    public function groups(): belongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_student');
    }

}
