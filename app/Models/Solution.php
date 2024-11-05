<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;

class Solution extends Model 
{
    use HasMedias, HasFiles, HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
}
