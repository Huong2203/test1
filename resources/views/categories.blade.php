@extends('client.layouts.app')

@section('content')

    @section('title')
        <title>{{ $cate->name }} / Reader</title>
    @endsection

    <!-- /navigation -->
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-8  mb-5 mb-lg-0">
                    <h1 class="h2 mb-4">Showing items from <mark>{{ $cate->name }}</mark></h1>
                    @foreach($data as $item)
                        <article class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-3">
                                    <a href="{{ route('categories.articles.detail', ['slug_cate' => $cate->slug, 'slug_articles' => $item->slug]) }}">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="{{ Storage::url($item->user->cover) }}">
                                            <span>{{ $item->user->name }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ date('H:i:s', strtotime($item->created_at)) }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($item->created_at)) }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="tags.html">{{ $item->tag->name }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @include('client.layouts.row-justify-content-center')


            </div>
        </div>
    </section>
@endsection
