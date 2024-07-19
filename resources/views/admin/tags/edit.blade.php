@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa Thẻ
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Chỉnh sửa Thẻ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Thẻ</a></li>
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

    <form action="{{ route('admin.tags.update', $model->id) }}" method="POST">
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
                                <div class="col-md-6">
                                    <div class="row">

                                        <div>
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}">
                                        </div>

                                        <div class="mt-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="name" value="{{ $model->slug }}">
                                        </div>

                                        <div class="mt-3">
                                            <label for="name" class="form-label">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description">{{ $model->description }}</textarea>
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

@endsection
