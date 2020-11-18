<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'type',
        'content',
        'link',
        'code'
    ];
}
