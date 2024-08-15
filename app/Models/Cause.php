<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Cause extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'count_use',
    ];

    protected $casts = [
	    'name' => 'array',
	];

}
