@extends('admin.layout.admin')

@section('title', 'Chỉnh sửa '.$post->title)

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh sửa bài viết {{$post->title}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bài viết</a></li>
            <li class="active">Chỉnh sửa</li>
        </ol>
    </section>

    <section class="content">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#post" aria-controls="post" role="tab" data-toggle="tab">Nội dung bài viết</a>
                </li>
                <li role="presentation" >
                    <a href="#facebook" aria-controls="facebook" role="tab" data-toggle="tab">Facebook</a>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="post">
                    <div class="row">
                        <!-- form start -->
                        <form role="form" action="{{ route('posts.update', ['post_id' => $post->post_id]) }}" method="POST">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="col-xs-12 col-md-8">

                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Nội dung</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{$post->title}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội dung</label>
                                            <textarea class="editor" id="content" name="content" rows="10" cols="80"/>{{ $post->content }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">slug</label>
                                            <input type="text" class="form-control" name="slug" placeholder="đường dẫn tĩnh" value="{{ $post->slug }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mô tả</label>
                                            <textarea rows="4" class="form-control" name="description"
                                                      placeholder="">{{ $post->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tags (Viết tag cách nhau bởi dấu ,)</label>
                                            <input type="text" class="form-control" name="tags" value="{{ $post->tags }}" placeholder="Tags" >
                                        </div>

                                        <div class="form-group">
                                            <input type="button" onclick="return uploadImage(this);" value="Chọn ảnh"
                                                   size="20"/>
                                            <img src="{{ $post->image }}" width="80" height="70"/>
                                            <input name="image" type="hidden" value="{{ $post->image }}"/>
                                        </div>

                                        <div class="form-group" style="color: red;">
                                            @if ($errors->has('title'))
                                                <label for="exampleInputEmail1">{{ $errors->first('title') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </div>

                            <div class="col-xs-12 col-md-4">

                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary boxCateScoll">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Chọn danh mục</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">

                                        @foreach($categories as $cate)
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" name="parents[]" value="{{ $cate->category_id }}" class="flat-red"
                                                           @if(in_array($cate->category_id, $categoryPost)) checked @endif/>
                                                    {{ $cate->title }}
                                                </label>
                                            </div>
                                            @foreach($cate['sub_children'] as $child)
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" name="parents[]" value="{{ $child['category_id'] }}" class="flat-red"
                                                               @if(in_array($child['category_id'], $categoryPost)) checked @endif/>
                                                        {{ $child['title'] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endforeach

                                    </div>
                                </div>

                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Chọn template</label>
                                            <select class="form-control" name="template">
                                                <option value="default">Mặc định</option>
                                                @foreach($templates as $template)
                                                    <option value="{{ $template->slug }}"
                                                            @if($template->slug == $post->template) selected @endif >{{ $template->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- Bổ sung -->
                                <div class="box box-primary">
                                    <div class="box-body">
                                        @foreach ($typeInputs as $typeInput)
                                            <div class="form-group">
                                                <label>{{ $typeInput->title }}</label>

                                                @if($typeInput->type_input == 'one_line')
                                                    <input type="text" class="form-control" name="{{$typeInput->slug}}" placeholder="{{ $typeInput->placeholder }}"
                                                           value="{{ $post[$typeInput->slug] }}" />
                                                @endif

                                                @if($typeInput->type_input == 'multi_line')
                                                    <textarea rows="4" class="form-control" name="{{$typeInput->slug}}" placeholder="{{ $typeInput->placeholder }}">{{ $post[$typeInput->slug] }}</textarea>
                                                @endif

                                                @if($typeInput->type_input == 'image')
                                                    <input type="button" onclick="return uploadImage(this);" value="Chọn ảnh"
                                                           size="20"/>
                                                    <img src="{{ $post[$typeInput->slug] }}" width="80" height="70"/>
                                                    <input name="{{$typeInput->slug}}" type="hidden" value="{{ $post[$typeInput->slug] }}"/>
                                                @endif

                                                @if($typeInput->type_input == 'editor')
                                                    <textarea class="editor" id="{{$typeInput->slug}}" name="{{$typeInput->slug}}" rows="10" cols="80"/>{{ $post[$typeInput->slug] }}</textarea>
                                                @endif

                                                @if(!in_array($typeInput->type_input, array('one_line', 'multi_line', 'image', 'editor'), true) && strpos($typeInput->type_input, 'listMultil') >= 0)
                                                    <select name="{{$typeInput->slug}}[]" class="select2 form-control" multiple="multiple">
                                                        <?php $slugSubPost = str_replace('listMultil', '', $typeInput->type_input);?>
                                                        @foreach(\App\Entity\SubPost::showSubPost($slugSubPost, 100) as $subPost)
                                                            <option value="{{ $subPost->slug }}"
                                                                    @if(in_array($subPost->slug, explode(',', $post[$typeInput->slug])) > 0 ) selected @endif>
                                                                {{ $subPost->title }}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif (!in_array($typeInput->type_input, array('one_line', 'multi_line', 'image', 'editor'), true))
                                                    <select name="{{$typeInput->slug}}" class="form-control">
                                                        @foreach(\App\Entity\SubPost::showSubPost($typeInput->type_input, 100) as $subPost)
                                                            <option value="{{ $subPost->title }}"
                                                                    @if($post[$typeInput->slug] == $subPost->title) selected @endif>
                                                                {{ $subPost->title }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        @endforeach

                                        <?php $productListOld = explode(',', $post->product_list)?>
                                        <div class="form-group">
                                            <label>Sản phẩm mua cùng:</label>
                                            <select class="select2 form-control " name="product_list[]" multiple="multiple">
                                                @foreach($productList as $productSearch)
                                                    <option value="{{ $productSearch->slug }}"
                                                            {{ (in_array($productSearch->slug, $productListOld) != false) ? 'selected' : '' }}>
                                                        {{ $productSearch->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                </div>
                                <!-- /.box -->

                            </div>

                            <div class="col-xs-12 col-md-8">
                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Hỗ trợ seo</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Thẻ title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ $post->meta_title }}" placeholder="Thẻ title" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Thẻ description</label>
                                            <input type="text" class="form-control" name="meta_description" value="{{ $post->meta_description }}" placeholder="Thẻ description" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Thẻ keyword</label>
                                            <input type="text" class="form-control" name="meta_keyword" value="{{ $post->meta_keyword }}" placeholder="Thẻ keyword" >
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </form>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="facebook">
                    @include('admin.partials.up_post_facebook', ['postId' => $post->post_id])
                </div>
            </div>
        </div>
    </section>
@endsection

