<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title', 'content', 'cate_id', 'user_id'
    ];
    public function cate()
    {
        return $this->belongsTo(__NAMESPACE__.'\Cate');
    }

    public function user()
    {
        return $this->belongsTo(__NAMESPACE__.'\User');
    }

    public function labels()
    {
        return $this->belongsToMany(
            __NAMESPACE__.'\Label', 'article_tag',
            'article_id', 'tag_id'
        );
    }

    #将文章以及标签存入关系表
    public function setArticleTag()
    {

    }




}
