<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\ArticleTag;
use App\Repositories\ArticleRepository;
use App\Http\Requests\Admin\SaveArticle;

class Articles extends Controller
{
    protected static $artRepo;

    public function __construct(ArticleRepository $artRepo)
    {
        self::$artRepo = $artRepo;
    }

    public function add(SaveArticle $req)
    {
        $title = trim($req->title);
        $content = $req->content;
        $cate_id = $req->cate_id;
        $user_id = $req->user_id;
        $label_ids = $req->labelId;
        $label_ids = [1,2,3];
        $res = Article::create([
                    'title' => $title,
                    'content' => $content,
                    'cate_id' => $cate_id,
                    'user_id' => $user_id
                ]);

        $artRepo = self::$artRepo;

        #将文章id与对应的标签id插入表中
        $artRepo->setArticleTag($res->id, $label_ids);
    }

    public function edit(SaveArticle $req)
    {
        $id = $req->id;
        $title = trim($req->title);
        $content = $req->content;
        $cate_id = $req->cate_id;
        $user_id = $req->user_id;
        $label_ids = $req->labelId;
        $res = Article::where('id', $id)
                ->update([
                    'title' => $title,
                    'content' => $content,
                    'cate_id' => $cate_id,
                    'user_id' => $user_id
                ]);
        $artRepo = self::$artRepo;
        $artRepo->deleteArticleTag($id);
        $artRepo->setArticleTag($res->id, $label_ids);
    }

    public function delete(Request $req)
    {
        Article::destroy($req->id);
        $artRepo = self::$artRepo;
        $artRepo->deleteArticleTag($id);
    }

    public function list(Request $req)
    {

        $list = Article::get();
        return $list;
    }



}
