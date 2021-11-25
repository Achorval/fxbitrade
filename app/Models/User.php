<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'system_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return balance relationship.
     *
     * @return 
     */
    public function balance() 
    {
        return $this->hasMany(Balance::class);
    }

    /**
     * Return transaction relationship.
     *
     * @return 
     */
    public function transaction() 
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Return referral relationship.
     *
     * @return 
     */
    public function referral() 
    {
        return $this->hasMany(Referral::class);
    }
}
