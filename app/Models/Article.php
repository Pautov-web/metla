<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'content'];

    protected $fillable = [
        'user_id',
    	'slug',
        'name',
        'content',
        'img',
        'publish'
    ];

    protected $casts = [
	    'name' => 'array',
	    'content' => 'array',
	];

	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value))),
        );
    }
}
