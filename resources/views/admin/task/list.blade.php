@extends('admin.layout.admin')

@section('title', 'Danh sách Task')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Task
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Danh sách task</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a  href="{{ route('task.create') }}"><button class="btn btn-primary">Thêm mới</button> </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Tên Task</th>
                                <th>Nội dung</th>
                                <th>Người phụ trách</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Dự kiến hoàn thành</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $id => $task )
                                <tr>
                                    <td>{{ ($id+1) }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->content }}</td>
                                    <td>{{ $task->assignee_name }}</td>
                                    <td @php if($task->status == 0): @endphp style="background-color:#ec1c24;" @php endif; @endphp
                                            @php if($task->status == 1): @endphp style="background-color:yellow;" @php endif; @endphp >
                                            @php 
                                                if($task->status == 0) {
                                                    echo "New";
                                                }
                                                if($task->status == 1){
                                                    echo "Inprocessing";
                                                }
                                                if($task->status == 2){
                                                    echo "Pending";
                                                }
                                                 if($task->status == 3){
                                                    echo "Done";
                                                }
                                            @endphp
                                    </td>
                                    
                                    <td>{{ $task->created_at }}</td>  
                                    <td>{{ $task->end_date }}</td>    
                                    <td>
                                        <a href="{{ route('task.edit', ['task_id' => $task->task_id]) }}">
                                            <button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </a>
                                        <a  href="{{ route('task.destroy', ['task_id' => $task->task_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Tên Task</th>
                                <th>Nội dung</th>
                                <th>Người phụ trách</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Dự kiến hoàn thành</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @include('admin.partials.popup_delete')
@endsection

