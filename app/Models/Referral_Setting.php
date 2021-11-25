<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral_Setting extends Model
{
    use HasFactory;

    protected $table = 'referral_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'percent',
        'system_id',
        'status'
    ];
}
