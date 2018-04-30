<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{

    public function articles()
    {
        return $this->hasMany(__NAMESPACE__.'\Article');
    }
}
