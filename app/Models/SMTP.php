<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMTP extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'smtp_email',
        'smtp_host',
        'smtp_user',
        'smtp_password',
        'smtp_port',
    ];
}
