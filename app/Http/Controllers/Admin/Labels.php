<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Label;

class Labels extends Controller
{

    public function __construct()
    {

    }


    #标签添加
    public function add(Request $req)
    {
        $title = $req->title;
        $res = Label::create([
                    'title' => $title,
                ]);

        if ($res) {
            return "success";
        }

        return "error";
    }


    #标签修改
    public function edit(Request $req)
    {
        $title = $req->title;
        $id = $req->id;
        $res = Label::where('id', $id)->update([
                    'title' => $title,
                ]);

        if ($res) {
            return "success";
        }
        return "error";
    }


    #标签展示
    public function list(Request $req)
    {

        $list = Label::get();
        return $list;
    }


    #标签删除
    public function delete(Request $req)
    {
        $id = $req->id;
        $res = Label::find($id)->delete();
        if ($res) {
            return "success";
        }
        return "error";
    }
}
