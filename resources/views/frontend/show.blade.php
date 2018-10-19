@extends('frontend.layout.app')


@section('content')
    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="masonry">
                        <div class="masonry-filter-container d-flex align-items-center">
                            <span>Category:</span>
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters" data-filter-all-text="All Categories"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="masonry__container row">

                            @foreach ($posts as $post)
                            {{dd($post->m_like_count)}}
                            
                            {{ dd(auth()->user()->likes()->get())}}
                            @if(!auth()->user()->likes()->where('post_id', $post->id)->count())
                                <div class="masonry__item col-lg-4 col-md-6" data-masonry-filter="{{ $post->category->title }}">
                                    <article class="feature feature-1">
                                        <a href="#" class="block">
                                            <img alt="Image" src="{{ asset('uploads/'.$post->image) }}" />
                                        </a>
                                        <div class="feature__body boxed boxed--border">
                                            <span>{{ $post->created_at->format('d M Y, h:i') }}</span>
                                            <h5>{{ str_limit($post->description, 10) }}</h5>
                                            <a href="{{url("posts/$post->id/".str_slug($post->title))}}">
                                                Read More
                                            </a>
                                        </div>
                                    </article>
                                </div>
                                @endif
                                <!--end item-->
                            @endforeach
                        </div>
                        <!--end of masonry container-->
                        {{ $posts->appends(request()->except('page'))->render() }}

                        {{-- @include('vendor.pagination.frontend', ['paginator' => $posts]) --}}

                        {{-- <div class="pagination">
                            <a class="pagination__prev" href="#" title="Previous Page">&laquo;</a>
                            <ol>
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li class="pagination__current">3</li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                            </ol>
                            <a class="pagination__next" href="#" title="Next Page">&raquo;</a>
                        </div> --}}
                    </div>
                    <!--end masonry-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection
