@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', 'Mua thuốc theo toa (đơn)')
@section('meta_description', 'Mua thuốc theo đơn, nhà thuốc hỗ trợ bán thuốc theo đơn bác sỹ kê cho bệnh nhân')
@section('meta_url', 'https://thuocuytin.com.vn/trang/mua-thuoc-theo-toa' )
@section('canonical', 'https://thuocuytin.com.vn/trang/mua-thuoc-theo-toa' )
@section('content')

    <section class="main-ctn">
        <div class="wrapper container">

            <div class="breadcrumbs">
                <div class="wrapper">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" href="" title="Đăng nhập"><span itemprop="title">{{ $post->title }}</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section >
                <div class="">
                    <h1 class="title_contact" style="margin-bottom: 15px;text-transform: uppercase;font-weight: 600;">{{ $post->title }}</h1>
                    <div id="buyMedicine" class="contact-info col-xs-12 col-xs-offset-0 col-md-offset-2 col-md-10 col-lg-8 col-lg-offset-2">
                        <form  action="{{ route('sub_contact') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
							<div class="form-group row">
                                <div class="col-sm-12">
									<div id="uploadImage">
										<i class="fa fa-cloud-upload" aria-hidden="true"></i>
									</div>
									<!-- <button class="btn btn-default addAvatar">TẢI ẢNH ĐƠN THUỐC</button> -->
									<input type='file' id="imgInp" accept="image/*" onchange="readURL(this)" style="display: none" multiple/>
									
                                    <!-- <script>
                                        function readURL(input) {
											$('#uploadImage').empty();
                                            if (input.files && input.files[0]) {
												for(var i = 0; i< input.files.length; i++)
												{
													var file = input.files[i];
													
													var picReader = new FileReader();
													picReader.addEventListener("load",function(event){
														var picFile = event.target;
														$('#uploadImage').append("<img class='thumbnail' src='" + picFile.result + "'" +
														"title='" + picFile.name + "' width='200' style='float: left' />");
														$('#uploadImage').append('<input type="hidden" value="'+ picFile.result +'" name="images[]" />');
													});
													//Read the image
													picReader.readAsDataURL(file);
												}
												
                                            }
                                        }
                                        $('.addAvatar').click(function() {
                                            $('#imgInp').click();
                                            return false;
                                        });
                                    </script> -->
                                </div>
                            </div>
							
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control f14" name="name" placeholder="Họ và tên (*)" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            
							<div class="form-group row"> 
                                <div class="col-sm-12">
                                    <input type="number" class="form-control f14" name="phone" placeholder="Số điện thoại (*)" value="{{ old('phone') }}" required>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="email" class="form-control f14" name="email" placeholder="Email" value="{{ old('email') }}" >
                                </div>
                            </div>
							
							<div class="form-group row">
                                <div class="col-sm-12">
									<textarea class="form-control f14" name="message" placeholder="Ghi chú">{{ old('message') }}</textarea>
                                </div>
                            </div>
							
                            <input type="hidden" value="Tư vấn đơn thuốc" name="address" />
							<input type="hidden" value="1" name="is_upload_image" />
                            <div class="clearfix"></div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12 pdtop30">
                                    <button type="submit" class="btn btn-primary btnSubmit">Gửi đơn thuốc</button>

                                </div>
                            </div>
                          
                        </form>
                    </div><!--end: .contact-info-->
					<div class="row">
						<div class="col-xs-12">
							<div class="sumary_new">
								{!! isset($post['content']) ? $post['content'] : 'Đang cật nhập thông tin' !!}

							</div>
						</div>
					</div>
                </div>
            </section><!--end: #content-->
        </div>
    </section>

@endsection
