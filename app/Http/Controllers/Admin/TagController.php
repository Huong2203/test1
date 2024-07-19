<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    const PATH_VIEW = 'admin.tags.';
    const PATH_UPLOAD = 'categories';

    const PATH_PAGE = 5;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::query()->latest('id')->paginate(self::PATH_PAGE);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name'          => $request->name,
            'slug'          => $request->slug,
            'description'   => $request->description,
        ];

        if(empty($data['slug'])){
            $data['slug'] = Str::of($request->name)->slug('-');
        }

        Tag::query()->create($data);

        return redirect()->route('admin.tags.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Tag::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Tag::query()->findOrFail($id);

        $parentCategories = Tag::query()->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $model = Tag::query()->findOrFail($id);

        $model->update($request->all());

        return redirect()->route('admin.tags.index')->with('success', 'Chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Tag::query()->findOrFail($id);

        $model->delete();

        return back();
    }
}
