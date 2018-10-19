@extends('backend.layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-sm btn-default" href="{{ route('tags.create') }}"> <i class="fa fa-plus"></i> </a>
                    <a class="btn btn-sm btn-default" href="{{ route('tags.edit', [$show->id]) }}"> <i class="fa fa-edit"></i> </a>
                    <span  title="delete tag">
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
                                    ask {{ $show->name }} !
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="{{ route('tags.destroy', [$show->id]) }}">
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
                    <a class="btn btn-sm btn-default" href="{{ route('tags.index') }}"> <i class="fa fa-list"></i> </a>
                </div>
            </div>
            <div class="box-body">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Name : </strong>
                        {{ $show->name }}
                        <br><hr>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@endsection
