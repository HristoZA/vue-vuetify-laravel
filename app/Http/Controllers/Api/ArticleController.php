<?php

namespace App\Http\Controllers\Api;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    function index(Request $request) {
        $user = auth()->user();
        $articles = Article::where('user_id', $user->id)->get();
        return $this->sendResponse("Successfully retrieved articles", $articles, 200);
    }
}
