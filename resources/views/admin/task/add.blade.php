@extends('admin.layout.admin')

@section('title', 'Thêm mới công việc')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới Task
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Công việc</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- form start -->
            <form role="form" action="{{ route('task.store') }}" method="POST">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
                <div class="col-xs-12 col-md-6">
    
                    <!-- Nội dung thêm mới -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nội dung</h3>
                        </div>
                        <!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên task</label>
                                    <input type="text" class="form-control" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung task</label>
                                    <textarea rows="4" class="form-control" name="content"
                                              placeholder=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ghi chú</label>
                                    <textarea rows="4" class="form-control" name="note"
                                              placeholder=""></textarea>
                                </div>
                                
                                <label class="control-label">Dự kiến hoàn thành</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datePickerId"
                                           name="end_date_str"/>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Người phụ trách</label>
                                    <select name="assignee" class="form-control">
                                    @foreach(\App\Entity\User::getBackOfficeUsers() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group" style="color: red;">
                                    @if ($errors->has('name'))
                                        <label for="exampleInputEmail1">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </div>
                    </div>
                    <!-- /.box -->

                </div>
            </form>
        </div>
    </section>
@endsection

