@extends('frontend.layout.app')


@section('content')
<section class="unpad">
                <article>
                    <div class="imagebg text-center height-60" data-overlay="5">
                        <div class="background-image-holder">
                            <img alt="background" src="{{asset('uploads/'.$post->image)}}" />
                        </div>
                        <div class="container pos-vertical-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="article__title">
                                        <h1>{{$post->title}}</h1>
                                        <span>{{$post->created_at->format('d M Y, h:i ')}} in </span>
                                        <span>
                                            <a href="#">{{$post->category->title}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                        <div class="pos-absolute pos-bottom col-12 text-center">
                            <div class="article__author">
                                <img alt="Image" src="{{asset('uploads/'.$post->user->image)}}" />
                                <h6 class="type--uppercase">{{$post->user->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                    <div class="article__body">


                                @if (session()->has('message'))
                                    <div class="alert bg--success">
                                        <div class="alert__body">
                                            {{ session()->get('message') }}
                                        </div>
                                    </div>
                                    <br>
                                @endif

                                        {!! $post->content !!}

                                    </div>
                                    <!--<div class="article__share text-center">
                                        <a class="btn bg--facebook btn--icon" href="#">
                                            <span class="btn__text">
                                                <i class="socicon socicon-facebook"></i>
                                                Share on Facebook
                                            </span>
                                        </a>
                                        <a class="btn bg--twitter btn--icon" href="#">
                                            <span class="btn__text">
                                                <i class="socicon socicon-twitter"></i>
                                                Share on Twitter
                                            </span>
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
                    </div>
                </article>
            </section>

            <section class="space--sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h4>

                        @if (auth()->check())
                            @if (!auth()->user()->likes()->where('post_id', $post->id)->count())
                                Did You Enjoy The Post So
                                <a href="{{ route('likes.add', ['post_id' => $post->id]) }}">Like It</a>
                            @else
                                Did'nt You You Enjoy The Post So
                                <a href="{{ route('likes.remove', ['post_id' => $post->id]) }}">UnLike It</a>
                            @endif
                        @endif

                        <span>It Has {{ $post->m_like_count }} Like</span>
                    </h4>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="comments">
                             
                                <h3> {{$post->Mcomments->count()}} Comment</h3>
                                @include('frontend.includes.messages')
                                <ul class="comments__list">
                                    @foreach($post->Mcomments as $thepost)
                                    <li>
                                        
                                        <div class="comment">
                                            <div class="comment__avatar">  
                                                <img alt="Image" src="{{asset('uploads/'.$thepost->comment_user->image)}}" />
                                            </div>
                                            <div class="comment__body">
                                                <h5 class="type--fine-print">{{$thepost->comment_user->name}}</h5>
                                                <div class="comment__meta">
                                                    <span>{{$thepost->created_at->format('d M Y, h:i ')}}</span>
                                                    <a href="#">Reply</a>
                                                    @if(auth()->user()->id == $thepost->comment_user->id)
                                                    <a href="{{route('Comment.delete',$thepost->id)}}" class="text-right">Delete</a>
                                                    @endif
                                                </div>
                                                <p>
                                                    {{$thepost->comment}}
                                                </p>
                                            </div>
                                        </div>
                                        
                                @endforeach        
                                        <!--end comment-->
                                    </li>

                                   
                                </ul>
                                
                            </div>
                            <!--end comments-->
                            @if(auth()->check())
                            <div class="comments-form">
                                <h4>Leave a comment</h4>
                                <form class="row" method="Post" action="{{url('commnet/create/'.$post->id)}}" >
                                   @csrf 
                                    
                                    <div class="col-md-12">
                                        <label>Comment:</label>
                                        <textarea rows="4" name="comment" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn--primary" type="submit">Submit Comment</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="bg--secondary">
                <div class="container">
                    <div class="row text-block">
                        <div class="col-md-12">
                            <h3>More recent stories</h3>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        @foreach($postsHasSameTags as $theposts)
                        <div class="col-md-4">
                            <article class="feature feature-1">
                                <a href="#" class="block">
                                    <img alt="Image"  src="{{asset('uploads/' . $theposts->image)}}" />
                                </a>
                                <div class="feature__body boxed boxed--border">
                                    <span>{{$theposts->created_at->format('d M Y, h:i ')}}</span>
                                    <h5>{{$theposts->title}}</h5>
                                    <a href="{{url("posts/$theposts->id/".str_slug($theposts->title))}}">
                                        Read More
                                    </a>
                                </div>
                            </article>
                        </div>
                       @endforeach 
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
@endsection
