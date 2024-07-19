<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;

class CategoriesController extends Controller
{
    const PATH_VIEW = 'categories';
    const PATH_PAGE = 5;

    public function index($slug) {
        $data = Articles::query()
            ->join('categories', 'categories.id', '=', 'articles.category_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->join('tags', 'tags.id', '=', 'articles.tag_id')
            ->select('articles.*', 'categories.name as category_name', 'users.name as user_name', 'tags.name as tags_name')
            ->latest('id')
            ->paginate(self::PATH_PAGE);

        $cate = Category::where('slug', $slug)->first();

        return view(self::PATH_VIEW, compact('data', 'cate'));
    }
}
