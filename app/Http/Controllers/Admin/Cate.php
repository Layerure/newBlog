<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate as Category;

class Cate extends Controller
{
    #栏目添加
    public function add(Request $req)
    {
        $title = $req->title;
        $description = $req->description;
        $res = Category::create([
            'title' => $title,
            'description' => $description
        ]);

        if ($res) {
            return "success";
        }

        return "error";
    }

    #栏目修改
    public function edit(Request $req)
    {
        $title = $req->title;
        $description = $req->description;
        $id = $req->id;
        $res = Category::where('id', $id)->update([
            'title' => $title,
            'description' => $description
        ]);

        if ($res) {
            return "success";
        }
        return "error";
    }

    #栏目删除
    public function delete(Request $req)
    {
        $id = $req->id;
        $res = Category::find($id)->delete();
        if ($res) {
            return "success";
        }
        return "error";
    }

    #栏目展示
    public function list(Request $req)
    {
        $list = Category::get();
        return $list;
    }

}
