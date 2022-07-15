<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Bootstrap any model features.
     *
     * @return void
     */
    public static function boot(){
        parent::boot();
    
        static::creating(function ($issue) {
            // Set id as UUID
            $issue->id = Str::uuid();
        });
    }
}
