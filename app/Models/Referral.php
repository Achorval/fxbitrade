<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'refererUsername',
        'system_id'
    ];

    /**
     * Return user relationship.
     *
     * @return 
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return status relationship.
     *
     * @return 
     */
    public function status() 
    {
        return $this->belongsTo(Status::class);
    }
}
