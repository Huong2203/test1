<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class ArticlesDetailController extends Controller
{
    const PATH_VIEW = 'articles-detail';
    const PATH_PAGE = 5;

    public function index($slug_cate, $slug_articles)
    {
        // Xử lý logic để lấy dữ liệu và trả về view
        $model = Articles::where('slug', $slug_articles)->first();

        return view(self::PATH_VIEW, compact('model'));
    }

    public function detail($slug_articles)
    {
        // Xử lý logic để lấy dữ liệu và trả về view
        $model = Articles::where('slug', $slug_articles)->first();

        return view(self::PATH_VIEW, compact('model'));
    }
}
