<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRelated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasMedias, HasFactory, HasRelated;

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
        return $this->belongsToMany(Group::class, 'twill_related', 'subject_id', 'related_id');
    }

}
