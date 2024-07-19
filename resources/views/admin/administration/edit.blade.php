@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa Tài khoản
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Chỉnh sửa Tài khoản</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tài khoản</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
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

    <form action="{{ route('admin.administration.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                                        <div class="col-5">
                                            <div class="text-center">
                                                <img id="avatarImage" src="{{ \Storage::url($model->cover) }}"
                                                     class="rounded avatar-xxl" alt="Ảnh đại diện" width="50%">
                                            </div>
                                            <div class="text-center mt-5">
                                                <input type="file" name="cover" id="avatarInput">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}">
                                            </div>

                                            <div class="mt-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ $model->email }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            <!--end col-->
        </div>

    </form>
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
    </script>
@endsection
