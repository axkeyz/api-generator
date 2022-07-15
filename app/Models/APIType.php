<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'api_types';

    /**
     * Get the apis associated with the api type.
     */
    public function apis() {
        return $this->hasMany(API::class, 'api_type_id');
    }
}
