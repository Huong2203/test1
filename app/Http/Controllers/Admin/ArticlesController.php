<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    const PATH_VIEW = 'admin.articles.';

    const PATH_UPLOAD = 'articles';
    const PATH_PAGE = 5;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Articles::query()
            ->join('categories', 'categories.id', '=', 'articles.category_id')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->join('tags', 'tags.id', '=', 'articles.tag_id')
            ->select('articles.*', 'categories.name as category_name', 'users.name as user_name', 'tags.name as tags_name')
            ->latest('id')
            ->paginate(self::PATH_PAGE);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::query()->get();
        $status = Articles::$status;
        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('tags', 'status', 'parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }

    }

    public function store(Request $request)
    {
        $data = $request->except('image', 'banner');
        $data['user_id'] = Auth::user()->id;
        if(empty($data['slug'])){
            $data['slug'] = Str::of($request->title)->slug('-');
        }

        if($request->hasFile('image')){
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        if($request->hasFile('banner')){
            $data['banner'] = Storage::put(self::PATH_UPLOAD, $request->file('banner'));
        }

        Articles::query()->create($data);

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Articles::query()
            ->where('id', $id)
            ->select(
                'id', 'image', 'banner', 'title', 'slug', 'category_id', 'user_id', 'tag_id', 'created_at', 'updated_at'
            )
            ->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tag::query()->get();
        $status = Articles::$status;
        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        $model = Articles::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('tags', 'status', 'parentCategories', 'model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->except('image', 'banner');
        $data['user_id'] = Auth::user()->id;
        if(empty($data['slug'])){
            $data['slug'] = Str::of($request->title)->slug('-');
        }

        if($request->hasFile('image')){
            $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        if($request->hasFile('banner')){
            $data['banner'] = Storage::put(self::PATH_UPLOAD, $request->file('banner'));
        }

        $model = Articles::query()->findOrFail($id);

        $model->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Articles::query()->findOrFail($id);

        $model->delete();

        return back();
    }
}
