<?php
namespace App\Repositories;

use App\Model\Admin\ArticleTag;


class ArticleRepository
{
    public function __construct()
    {

    }

    #将文章与标签插入表中
    public function setArticleTag($articleId, $labelIds)
    {
        foreach ($labelIds as $labelId) {
            ArticleTag::create([
                'article_id' => $articleId,
                'tag_id' => $labelId
            ]);
        }
    }

    #修改
    public function deleteArticleTag($articleId)
    {
        ArticleTag::where('article_id', $articleId)->destroy();
    }



}