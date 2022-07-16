<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use App\Models\API;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

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
    ];

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
     * Get the apis created by the user.
     * 
     * @return \App\Models\User
     */
    public function apis(){
        return $this->hasMany(API::class);
    }

    /**
     * Get the login providers of the user.
     * 
     * @return \App\Models\User
     */
    public function providers()
    {
        return $this->hasMany(Provider::class,'user_id','id');
    }
}
