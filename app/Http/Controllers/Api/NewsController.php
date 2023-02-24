<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return response()->json(["success" => true, "data" => $news], 200);
    }

    public function news(News $news)
    {
        return response()->json(["success" => true, "data" => $news], 200);
    }
}
