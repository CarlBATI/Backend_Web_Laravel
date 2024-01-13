<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;

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
        'birthday',
        'avatar',
        'about_me'
    ];

    /**
     * Get the user's birthday.
     *
     * @link https://laravel.com/docs/10.x/eloquent-mutators#defining-an-accessor
     */
    protected function birthday(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value),
            set: fn (string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

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

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
    * Check if the user has a specific role.
    *
    * @param  string  $role
    * @return bool
    */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
