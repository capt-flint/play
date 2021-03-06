<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
