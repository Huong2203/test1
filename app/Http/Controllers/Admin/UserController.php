<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreUserRequest;
use App\Http\Requests\Admin\Categories\UpdateUserRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';
    const PATH_UPLOAD = 'users';

    const PATH_PAGE = 5;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->where('type', 'member')->latest('id')->paginate(self::PATH_PAGE);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = User::query()->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->except('cover');
        $data['type'] ??= "member";

        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        User::query()->create($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = User::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = User::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = User::query()->findOrFail($id);

        $data = $request->except('cover');
        $data['type'] ??= "member";

        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        $currentCover = $model->cover;

        $model->update($data);

        if($currentCover && Storage::exists($currentCover)){
            Storage::delete($currentCover);
        }

        return redirect()->route('admin.users.index')->with('success', 'Chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = User::query()->findOrFail($id);

        $model->delete();

        if($model->cover && Storage::exists($model->cover)){
            Storage::delete($model->cover);
        }

        return back();
    }
}
