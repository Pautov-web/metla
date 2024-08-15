<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'surname',
        'patronymic',
        'date_of_birth',
        'address',
        'passport_number',
        'passport_series',
        'passport_date',
        'passport_address',
        'passport_check',
        'bank_number',
        'bank_bic',
        'bank_name',
        'size',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Есть ли права у пользователя.
     *
     * @var permission array|string
     * return boolean
     */
    public function hasPermission(string|array $permission)
    {
        if(is_array($permission))
            return $this->role->permissions()->whereIn('slug', $permission)->exists();

        return $this->role->permissions()->where('slug', $permission)->exists();
    }


    protected function documents(): Attribute
    {
        return Attribute::make(
            get: fn () => !is_null($this->passport_photo_1) 
            && !is_null($this->passport_photo_2)
            && !is_null($this->contract_photo)
            && !is_null($this->employment_photo) ? true : false,
        );
    }
}
