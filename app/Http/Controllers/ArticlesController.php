<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function detail($slug)
    {
        $article = Articles::query()->where('slug', $slug)->first();

        return view('product-detail', compact('article'));
    }
}
