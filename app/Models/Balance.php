<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'previous',
        'current',
        'user_id',
        'transaction_id',
        'system_id',
        'status',
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
     * Return transaction relationship.
     *
     * @return 
     */
    public function transaction() 
    {
        return $this->belongsTo(Transaction::class);
    }
}
