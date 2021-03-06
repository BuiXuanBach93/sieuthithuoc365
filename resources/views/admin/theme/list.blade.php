@extends('admin.layout.admin')

@section('title', 'Danh sách theme' )

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Theme
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Danh sách Theme</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a  href="{{ route('themes.create') }}"><button class="btn btn-primary">Thêm mới</button> </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="theme" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Tên theme</th>
                                <th>Mã theme</th>
                                <th>Hình ảnh</th>
                                <th>Đường dẫn dùng thử</th>
                                <th>Nhóm giao diện</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Tên theme</th>
                                <th>Mã theme</th>
                                <th>Hình ảnh</th>
                                <th>Đường dẫn dùng thử</th>
                                <th>Nhóm giao diện</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @include('admin.partials.popup_delete')
@endsection
@push('scripts')
    <script>
        $(function() {
            var table = $('#theme').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable_theme') !!}',
                columns: [
                    { data: 'theme_id', name: 'theme_id' },
                    { data: 'name', name: 'name' },
                    { data: 'code', name: 'code' },
                    { data: 'image', name: 'image', orderable: false,
                        render: function ( data, type, row, meta ) {
                            return '<img src="'+data+'" width="100" />';
                        },
                        searchable: false  },
                    { data: 'url_test', name: 'url_test' },
                    { data: 'name_group', name: 'name_group' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush
