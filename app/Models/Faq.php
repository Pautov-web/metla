<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['question', 'answer'];

    protected $fillable = [
    	'question',
        'answer',
    ];

    protected $casts = [
	    'question' => 'array',
	    'answer' => 'array',
	];
}
