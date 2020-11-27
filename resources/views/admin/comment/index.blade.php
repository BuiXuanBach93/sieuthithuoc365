@extends('admin.layout.admin')

@section('title', 'Danh sách comment')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý bình luận
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Danh sách Bình luận</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a  href="{{ route('comments.create') }}"><button class="btn btn-primary">Thêm mới</button> </a>
                        <a  href="{{ route('randomComment') }}" title="Tạo bình luận từ bình luận sẵn có"><button class="btn btn-primary">Tự tạo bình luận</button> </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="posts" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Bài viết</th>
                                <th>Người bình luận</th>
                                <th>Nội dung bình luận</th>
                                <th>Đánh giá</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <!-- form start -->
            <form role="form" action="{{ route('randomCommentFromForm') }}" method="POST">
                {!! csrf_field() !!}
                <div class="col-xs-12 col-md-6">

                    <!-- Nội dung thêm mới -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tự động sinh bình luận</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung comment</label>
                                <p>
                                    <i>Mỗi câu bình luận cách nhau bằng dấu (;). Và lưu ý phải nhập từ 2 bình luận trở lên <br> ví dụ: </i>
                                    <i>Tủ ở đây chất đẹp, giá lại hợp lý, vote cho shop nha;</i>
                                    <i>Tủ bếp ở đây nhà mình mua lâu rồi mà vẫn rất bền và đẹp, :);</i>
                                    <i>Tủ bếp chất đẹp, nhân viên tư vấn nhiệt tình;</i>
                                </p>
                                <textarea class="form-control" rows="10" placeholder="Nội dung comment" required name="content_comment"></textarea>
                            </div>

                            <div class="form-group" style="color: red;">
                                @if ($errors->has('content'))
                                    <label for="exampleInputEmail1">{{ $errors->first('title') }}</label>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tự động sinh bình luận</button>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>

            </form>
        </div>
    </section>
    @include('admin.partials.popup_delete')

@endsection

@push('scripts')
<script>
    $(function() {
        $('#posts').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable_comment') !!}',
            columns: [
                { data: 'comment_id', name: 'comment_id' },
                { data: 'title', name: 'title' },
                { data: 'name', name: 'name',
                    render: function ( data ) {
                    if (data != null) {
                        return data;
                    }
                    
                    return 'Ẩn danh';
                    }, },
                { data: 'content', name: 'content' },
                { data: 'rating', name: 'rating' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush

