<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const PATH_PAGE = 5;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        view()->composer('client.layouts.app', function ($view) { // Đăng ký một view composer cho view frontend.layout
            app(HomeController::class)->viewLayout($view);
            // Sử dụng hàm view
        });

        $categories = Category::where('parent_id', null)
            ->with(['parent', 'children'])
            ->withCount('children')
            ->get();

        $tags = Tag::all();

        $articleNews = Articles::with('user', 'tag')
            ->paginate(self::PATH_PAGE);

        View::share(
            [
                'categories' => $categories,
                'tags'       => $tags,
                'articleNews' => $articleNews,
            ]
        );
    }
}
