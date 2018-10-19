@extends('backend.layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <a class="btn btn-sm btn-default" href="{{route('tags.index')}}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <form method="post" action="{{ route('tags.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name <span style="color:red">*</span> </label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('tags.index') }}" class="btn btn-info">cancel</a>
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
