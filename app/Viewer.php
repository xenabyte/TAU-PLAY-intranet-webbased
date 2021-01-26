<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    //

    protected $fillable = [
        'channel_id', 'ip_address', 'user_agent', 'status'
    ];

    public function channel()
    {
        return $this->belongsTo('App\Channel', 'channel_id');
    }
}
