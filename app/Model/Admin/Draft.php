<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    public function cate()
    {
        return $this->belongsTo(__NAMESPACE__.'\Cate');
    }

    public function user()
    {
        return $this->belongsTo(__NAMESPACE__.'\User');
    }
}
