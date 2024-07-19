@extends('admin.layouts.master')

@section('title')
    Danh sách Bài viết
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Bài viết</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>

                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example"
                           class="table table-bordered dt-responsive nowrap table-striped"
                           style="width:100%">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Banner</th>
                            <th>Slug</th>
                            <th>Poster</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ \Storage::url($item->image) }}" alt="" width="60px"></td>
                                <td><img src="{{ \Storage::url($item->banner) }}" alt="" width="60px"></td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->tags_name != "" ? $item->tags_name : "Null" }}</td>
                                <td>
                                    @switch($item->status)
                                        @case('draft')
                                            <span class="badge text-bg-dark">Draft</span>
                                            @break
                                        @case('published')
                                            <span class="badge text-bg-success">Public</span>
                                            @break
                                        @case('archived')
                                            <span class="badge text-bg-info">Archived</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.articles.show', $item->id) }}" class="btn btn-info mb-3">Xem</a>
                                    <a href="{{ route('admin.articles.edit', $item->id) }}"
                                       class="btn btn-warning mb-3">Sửa</a>

                                    <a href="{{ route('admin.articles.destroy', $item->id) }}"
                                       onclick="return confirm('Chắc chắn chưa?')"
                                       class="btn btn-danger mb-3">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    {{ $data->links() }}

                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('theme/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
