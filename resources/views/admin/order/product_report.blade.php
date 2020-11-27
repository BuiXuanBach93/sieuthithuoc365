@extends('admin.layout.admin')

@section('title', 'Biến động sản phẩm')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Báo cáo doanh số theo sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Báo cáo sản phẩm</li>
        </ol>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tìm kiếm</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="{{ route('productReport') }}" method="get">
                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Ngày tìm kiếm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control pull-right" placeholder="31-01-2020" 
                                           name="search_time"/>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                     <div class="box-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th>Tên Sản phẩm</th>
                                <th>{{$toDate1}} -> {{$fromDate1}}</th>
                                <th>{{$toDate2}} -> {{$fromDate2}}</th>
                                <th>{{$toDate3}} -> {{$fromDate3}}</th>
                                <th>{{$toDate4}} -> {{$fromDate4}}</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($productItemsBlock1 as $id => $item)
                                    <tr>
                                        <td>
                                           <p>{{ $item->product_id }}</p>
                                        </td>
                                        <td>
                                           <p @php if($item->highlight == 1): @endphp style="background-color:yellow;" @php endif; @endphp
                                           >{{ $item->short_name}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->block1}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->block2}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->block3}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->block4}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

