<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;
    protected $fillable = [
        'bg_image',
        'sub_title',
        'title',
        'button_text',
        'button_link'
    ];

}
