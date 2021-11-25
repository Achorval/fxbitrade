<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type_id',
        'currency_id',
        'plan_id',
        'address',
        'reference',
        'amount',
        'description',
        'system_id',
        'status_id'
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
     * Return user relationship.
     *
     * @return 
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return type relationship.
     *
     * @return 
     */
    public function type() 
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Return currency relationship.
     *
     * @return 
     */
    public function currency() 
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Return currency relationship.
     *
     * @return 
     */
    public function plan() 
    {
        return $this->belongsTo(Plan::class);
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
