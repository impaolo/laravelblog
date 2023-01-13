<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostController extends Controller
{
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Post');
            $content->description('Detail');

            $content->body(Admin::show(Post::findOrFail($id)));

        });
    }
}