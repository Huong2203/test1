<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    const PATH_PAGE = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articleRandom = Articles::inRandomOrder()
            ->with('user' ,'tag')
            ->first();

        $articleHot = Articles::with('user', 'tag')
            ->where('is_hot', 1)
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        $articleHotNew = Articles::with('user', 'tag')
            ->where('is_hot', 1)
            ->whereDate('created_at', '=', today())
            ->orderByDesc('created_at')
            ->limit(2)
            ->get();

        return view('home', compact('articleRandom', 'articleHot', 'articleHotNew'));
    }

    public function viewLayout(View $view){
        $category = Category::all();
        $temp = recursive($category);
        $categoryFont = frontend_recursive_menu($temp);

        $view->with('categoryFont', $categoryFont);
    }
}
