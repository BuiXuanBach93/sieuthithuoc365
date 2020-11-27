<div class="tuvan row" id="bottomform">
   <p class="title_1">LIÊN HỆ - TƯ VẤN</p>
   <p>Hãy nhập thông tin của bạn, chúng tôi sẽ gọi lại trong giây lát</p>

   <form id="frm_dathang" name="frm_dathang" method="POST" action="{{ route('sub_contact') }}" onSubmit="return contact(this);">
        {!! csrf_field() !!}
      <div class="row">
         <div class="col-md-6">
            <div class="tuvan_left">
               <img src="nhathuoc365/modules/product/assets/images/user.png" alt="">
               <input type="text" id="name_customer" name="name" placeholder="Tên của bạn" required>
               <input type="hidden" class="form-control"  name="from" value="bottom-box" />
            </div>
         </div>
         <div class=" col-md-6">
            <div class="tuvan_left">
               <img src="nhathuoc365/modules/product/assets/images/add_user.png" alt="">
               <input type="text" id="address" name="address" placeholder="Địa chỉ">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="tuvan_left">
               <img src="nhathuoc365/modules/product/assets/images/phone_user.png" alt="">
               <input type="text" id="phone" name="phone" placeholder="Số điện thoại (Bắt buộc)" required>
            </div>
         </div>
         <div class=" col-md-6">
            <div class="tuvan_left">
               <img src="nhathuoc365/modules/product/assets/images/mes_user.png" alt="">
               <input type="text" placeholder="Email" name="email">
            </div>
         </div>
      </div>
      <input type="hidden" name="product_id" value="{{$product['post_id']}}">
      <div class="row">
         <textarea class="form-control" rows="5" name="message" placeholder="Ghi chú">{{ isset($product['title']) ? $product['title'] : ''}}</textarea>
         <div class="a_right4" style="margin-bottom: 20px;">
           
            <button id="btn_dathang" class="btnProduct" data-loading-text="Loading...">TƯ VẤN</button>
          
         </div>
         
      </div>
   </form>



   

</div>