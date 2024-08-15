<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Service extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'excerpt'];

    protected $fillable = [
    	'excerpt',
        'name',
        'slug',
        'price',
        'time',
        'change_date',
    ];

    protected $casts = [
	    'name' => 'array',
	    'excerpt' => 'array',
	];

	protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value))),
        );
    }
}
