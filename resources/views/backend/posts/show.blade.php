@extends('backend.layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-default" href="{{ route('posts.create') }}"> <i class="fa fa-plus"></i> </a>
                    <a class="btn btn-sm btn-default" href="{{ route('posts.edit', [$show->id]) }}"> <i class="fa fa-edit"></i> </a>
                    <span  title="delete post">
                        <a data-toggle="modal" data-target="#myModal{{ $show->id }}" class="btn btn-sm btn-default" href=""> <i class="fa fa-trash"></i> </a>
                    </span>
                    <div class="modal fade" id="myModal{{ $show->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">
                                        delete
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    ask {{ $show->title }} !
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="{{ route('posts.destroy', [$show->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <a class="btn btn-default" data-dismiss="modal">
                                            cancel
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-default" href="{{ route('posts.index') }}"> <i class="fa fa-list"></i> </a>
                </div>
            </div>
            <div class="box-body">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Title : </strong>
                        {{ $show->title }}
                        <br><hr>
                    </div>
                    <div class="col-md-6">
                        <strong>keywords : </strong>
                        {{ $show->keywords }}
                        <br><hr>
                    </div>
                    <div class="col-md-12">
                        <strong>Content : </strong>
                        <textarea name="content" rows="8" cols="80" disabled>{{ $show->content }}</textarea>
                        <br><hr>
                    </div>
                    <div class="col-md-12">
                        <strong>description : </strong>
                        {{ $show->description }}
                        <br><hr>
                    </div>
                    <div class="col-md-4">
                        <strong>Category : </strong>
                        {{ $show->category->title }}
                        <br><hr>
                    </div>
                    <div class="col-md-4">
                        <strong>User : </strong>
                        {{ $show->user->name }}
                        <br><hr>
                    </div>
                    <div class="col-md-4">
                        <strong>Tags : </strong>
                        {{ $show->showTags() }}
                        <br><hr>
                    </div>
                    <div class="col-md-12">
                        <strong>image : </strong>
                        <img style="width: 200px; height: 150px;" src="{{ asset('uploads/' . $show->image) }}" alt="">
                        <br><hr>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            language: 'en',
        });
    </script>
@endsection
