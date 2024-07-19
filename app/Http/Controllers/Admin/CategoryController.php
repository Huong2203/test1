<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';
    const PATH_UPLOAD = 'categories';

    const PATH_PAGE = 5;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::query()->with(['parent', 'children'])->latest('id')->paginate(self::PATH_PAGE);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $data = [
            'name'          => $request->name,
            'slug'          => $request->slug,
            'description'   => $request->description,
            'parent_id'              => $request->parent_id,
        ];

        if(empty($data['slug'])){
            $data['slug'] = Str::of($request->name)->slug('-');
        }

        Category::query()->create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Category::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Category::query()->findOrFail($id);

        $parentCategories = Category::query()->with('children')->whereNull('parent_id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

        $model = Category::query()->findOrFail($id);

        $model->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Category::query()->findOrFail($id);

        $model->delete();

        return back();
    }
}
