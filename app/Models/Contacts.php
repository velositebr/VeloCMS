<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sitename',
        'legal_name',
        'trade_name',
        'cnpj',
        'address',
        'number',
        'complement',
        'neighborhood',
        'zipcode',
        'city',
        'state',
        'email',
        'phone_number',
        'cel_number',
        'whatsapp',
        'facebook',
        'instagram',
        'youtube',
        'spotify',
    ];
}
