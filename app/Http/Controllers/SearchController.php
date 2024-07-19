<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const PATH_VIEW = 'search';
    const PATH_PAGE = 5;

    public function index(Request $request) {
        $search = $request->search;

        $data = Articles::query()
            ->join('categories', 'categories.id', '=', 'articles.category_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->join('tags', 'tags.id', '=', 'articles.tag_id')
            ->select('articles.*', 'categories.name as category_name', 'users.name as user_name', 'tags.name as tags_name')
            ->where('title', 'like', $search)
            ->orWhere('content', 'like', $search)
            ->paginate(self::PATH_PAGE);

        $cate = Category::where('slug', 'like', $search)->first();

        return view(self::PATH_VIEW, compact('data','search', 'search'));
    }
}
