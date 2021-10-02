<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvents extends Model
{
    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'user_events';

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}
