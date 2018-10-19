@extends('backend.layout.app')


@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
            </div>
            <div class="box-body">

                <form method="get" action="{{ aurl('/posts') }}">
                    <div class="row">

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search In Posts By Name Or Keywords ..">
                      </div>

                      <div class="col-md-3">
                        <select class="form-control" name="cat">
                            <option value="">Search By Category</option>
                            @foreach ($cats as $c)
                                <option value="{{ $c->id }}" {{ request()->cat == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="col-md-3">
                        <select class="form-control" name="tag">
                            <option value="">Search By Tag Name</option>
                            @foreach ($tags as $c)
                                <option value="{{ $c->id }}" {{ request()->tag == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="col-md-2">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{ aurl('/posts') }}" class="btn btn-warning">Reset</a>
                      </div>
                      
                    </div>
                </form>
                <hr>
                You Have {{ $posts_count }} Post{{ $posts_count > 1 ? "'s" : ''}}
                <hr>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Keywords</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>User</th>
                      <th>Creation Date</th>
                      <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($index as $i)
                          <tr>
                              <td>{{ $i->title }}</td>
                              <td>{{ $i->keywords }}</td>
                              <td>{{ $i->category->title }}</td>
                              <td>{{ $i->showTags() }}</td>
                              <td>{{ $i->user->name }}</td>
                              <td>{{ $i->created_at }}</td>
                              <td>
                                  <a href="{{ route('posts.show', [$i->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              </td>
                              <td>
                                  <a href="{{ route('posts.edit', [$i->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                              </td>
                              <td>
                                  <form action="{{ route('posts.destroy', [$i->id]) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
                <hr>
                <div class="text-center">
                    {{ $index->appends(request()->except('page'))->render() }}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>


@endsection
