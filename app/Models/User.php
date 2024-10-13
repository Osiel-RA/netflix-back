<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'status_id',
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
     * Define the relationship with the Status model.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Define the relationship with the Profile model.
     */
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    /**
     * Define the relationship with the Payment model.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Define the relationship with the UserCard model.
     */
    public function userCards()
    {
        return $this->hasMany(UserCard::class);
    }

    public function tokens()
    {
        return $this->morphMany(PersonalAccessToken::class, 'tokenable');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'username_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * User password encryption
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
