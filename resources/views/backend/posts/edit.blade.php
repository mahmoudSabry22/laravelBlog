@extends('backend.layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <a class="btn btn-sm btn-default" href="{{route('posts.index')}}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <form method="post" action="{{ route('posts.update', [$edit->id]) }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- <input type="hidden" name="_method" value="PATCH"> --}}

                    <div class="form-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Title <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" name="title" value="{{ $edit->title }}" class="form-control" placeholder="title" required>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Category <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <select class="form-control" name="category_id">
                                    <option value="">Select Post Category</option>
                                    @foreach ($cats as $c)
                                        <option value="{{ $c->id }}" {{ $edit->category_id == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tag_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Tags <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <select class="form-control" name="tag_id[]" multiple>
                                    @foreach ($tags as $t)
                                        <option value="{{ $t->id }}" {{ in_array($t->id, $edit->getTagsIds() ?? []) ? 'selected' : '' }}>{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tag_id'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('tag_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <br>
                                <img src="{{ asset('uploads/' . $edit->image) }}" style="width:200px" alt="">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Keywords <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" name="keywords" value="{{ $edit->keywords }}" class="form-control" placeholder="keywords">
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Description <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control" placeholder="description" rows="8" cols="80">{{ $edit->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Content <span style="color:red">*</span> </label>
                            <div class="col-md-10">
                                <textarea name="content" class="form-control" placeholder="content" rows="8" cols="80">{{ $edit->content }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-success">Edit <i class="fa fa-edit"></i></button>
                                <a href="{{ route('posts.index') }}" class="btn btn-info">cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
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
