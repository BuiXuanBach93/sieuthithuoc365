@extends('admin.layout.admin')

@section('title', 'Chỉnh sửa Công việc')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh sửa Công việc {{ $task->title }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Công việc</a></li>
            <li class="active">Chỉnh sửa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- form start -->
            <form role="form" action="{{ route('task.update', ['task_id' => $task->task_id]) }}" method="POST">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <div class="col-xs-12 col-md-6">

                    <!-- Nội dung thêm mới -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nội dung</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên công việc</label>
                                <input type="text" class="form-control" name="title" placeholder="Tên task"
                                       value="{{ $task->title }}" required>
                            </div>
							
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea rows="4" class="form-control" name="content"
                                          placeholder="">{{ $task->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú</label>
                                <textarea rows="4" class="form-control" name="note"
                                          placeholder="">{{ $task->note }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Dự kiến hoàn thành</label>
                                <input readonly="readonly" type="text" class="form-control" name="end_date" value="{{ $task->end_date }}">
                            </div>
                            <label class="control-label">Cập nhật lại dự kiến hoàn thành</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datePickerId"
                                           name="end_date_str"/>
                                </div>

                            <div class="form-group" style="margin-top: 20px;">
                                    <label for="exampleInputEmail1">Người phụ trách</label>
                                    <select name="assignee" class="form-control">
                                            @foreach(\App\Entity\User::getBackOfficeUsers() as $user)
                                                <option value="{{ $user->id }}"
                                                @if($task->assignee == $user->id) selected @endif>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                     </select>
                             </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="0" {{ $task->status==0 ? 'selected' : '' }}>New</option>
                                    <option value="1" {{ $task->status==1 ? 'selected' : '' }}>Inprocessing</option>
                                    <option value="2" {{ $task->status==2 ? 'selected' : '' }}>Pending</option>
                                    <option value="3" {{ $task->status==3 ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày tạo</label>
                                <input readonly="readonly" type="text" class="form-control" name="created_at" value="{{ $task->created_at }}">
                            </div>

                            <div class="form-group" style="color: red;">
                                @if ($errors->has('name'))
                                    <label for="exampleInputEmail1">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>
                
            </form>
        </div>
    </section>
@endsection

