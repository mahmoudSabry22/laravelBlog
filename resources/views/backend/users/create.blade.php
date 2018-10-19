@extends('backend.layout.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
                <div class="box-tools pull-right">
                    <div class="actions">
                        <a class="btn btn-sm btn-default" href="{{route('users.index')}}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <form method="post" action="{{ route('users.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name <span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Email <span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" placeholder="image" required>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="control-label col-md-2">Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type" required>
                                    <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Password <span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Password Confirmation <span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('users.index') }}" class="btn btn-info">cancel</a>
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
