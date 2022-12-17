<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        't_image',
        'tw_link',
        'fb_link',
        'le_link'

    ];
}
