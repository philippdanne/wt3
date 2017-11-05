<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'titel',
        'mild',
        'suess',
        'wuerzig',
        'fruchtig'
    ];

}
