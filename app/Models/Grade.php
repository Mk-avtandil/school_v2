<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use A17\Twill\Models\Model;

class Grade extends Model 
{
    use HasFactory;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
}
