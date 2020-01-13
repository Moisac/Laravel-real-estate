<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{   

    protected $table = 'posts';

    protected $fillable = [

        'post_title',
        'user_id',
        'post_content',
        'post_type',
        'post_price',
        'post_year',
        'post_therm',
        'post_furnished',
        'post_floor',
        'post_features',
        'post_location',
        'building_type',
        'post_promote',
        'images'

    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
