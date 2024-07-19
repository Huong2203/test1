@extends('admin.layouts.master')

@section('title')
    Thêm mới Bài viết
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <div>
                                                <label for="name" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" id="name">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Content</label>
                                                <textarea id="content" rows="5" name="content"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <label for="name" class="form-label">Thump Image</label>
                                                <div class="text-center">
                                                    <img id="avatarImage" src=""
                                                         class="rounded avatar-xxl" alt="Thump Image" width="50%">
                                                </div>
                                                <div class="text-center mt-5">
                                                    <input type="file" name="image" id="avatarInput">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Post Image</label>
                                                <div class="text-center">
                                                    <img id="bannerImage" src=""
                                                         class="rounded avatar-xxl" alt="Post Image" width="50%">
                                                </div>
                                                <div class="text-center mt-5">
                                                    <input type="file" name="banner" id="bannerInput">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="name">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Tag</label>
                                                <select class="form-select" aria-label="Default select example" name="tag_id">
                                                    <option value="" selected>Trống</option>
                                                    @foreach($tags as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Status</label>
                                                <select class="form-select" aria-label="Default select example" name="status">
                                                    @foreach($status as $item)
                                                        <option value="{{ $item['status'] }}" {{ $item['status'] == 'published' ? 'selected' : "" }}>{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Category</label>
                                                <select class="form-select" aria-label="Default select example" name="category_id">
                                                    <option value="" selected>Trống</option>

                                                    @foreach($parentCategories as $parent)

                                                        @php($each = "")

                                                        @include('admin.articles.nested-category', ['category' => $parent])
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <button class="btn btn-primary" type="submit">Save</button>
                                                        </div><!-- end card header -->
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ), {
                ckfinder: {
                    uploadUrl: '{{route('admin.articles.upload').'?_token='.csrf_token()}}'
                }
            },{
                alignment: {
                    options: [ 'right', 'right' ]
                }} )
            .then( editor => {
                console.log( editor );
            })
            .catch( error => {
                console.error( error );
            })
    </script>

    {{-- Đổi ảnh khi chọn --}}
    <script>
        const avatarInput = document.getElementById('avatarInput');
        const avatarImage = document.getElementById('avatarImage');

        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                avatarImage.src = e.target.result;
            }

            reader.readAsDataURL(file);
        });

        const bannerInput = document.getElementById('bannerInput');
        const bannerImage = document.getElementById('bannerImage');

        bannerInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                bannerImage.src = e.target.result;
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
