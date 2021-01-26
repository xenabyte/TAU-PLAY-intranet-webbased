<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //

    protected $fillable = [
        'channel_name', 'channel_image', 'channel_url', 'category_id', 'channel_type', 'status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function viewer()
    {
        return $this->hasMany('App\Viewer');
    }
}
