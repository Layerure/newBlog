<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function cate()
    {
        return $this->belongsTo(__NAMESPACE__.'\Cate');
    }

    public function cate()
    {
        return $this->belongsTo(__NAMESPACE__.'\User');
    }



//    public function labels()
//    {
//        return $this->hasMany(__NAMESPACE__.'\Label');
//    }
}
