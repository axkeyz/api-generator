<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\APIType;

class API extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apis';

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
    
    /**
     * Get the user that owns the api.
     * 
     * @return \App\Models\API
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the api type of the api.
     * 
     * @return \App\Models\API
     */
    public function type() {
        return $this->belongsTo(APIType::class, 'api_type_id');
    }
}
