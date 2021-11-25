<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'address',
        'acronym',
        'system_id',
        'status'
    ];

    /**
     * Return transaction relationship.
     *
     * @return 
     */
    public function transaction() 
    {
        return $this->hasMany(Transaction::class);
    }
}
