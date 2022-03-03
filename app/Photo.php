<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
        'description',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($name)
    {
        $slug = Str::slug($name, '-');

        $oldPhoto = Photo::where('slug', $slug)->first();

        $counter = 0;
        while ($oldPhoto) {
            $newSlug = $slug . '-' . $counter;
            $oldPhoto = Photo::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
