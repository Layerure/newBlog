<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['title'];
}


public function articles()
{
    return $this->belongsToMany(
        __NAMESPACE__.'\Article', 'article_tag',
        'tag_id', 'article_id'
    );
}

