<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

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
