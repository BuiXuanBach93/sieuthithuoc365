

 <footer>
         <div class="info ">
            <div class="container">
            <div class="wrapper row ">
               <div class="col-md-10 col-sm-12 services">
                     <div class="col col-xs-12 col-sm-6 col-md-3 contactInfo">
                        <p class="tit_2">Thông tin liên hệ</p>
                        <span class="addres_">{{ isset($information['dia-chi']) ? $information['dia-chi'] : '' }}</span>
                        <span class="tele_">{{ isset($information['dien-thoai']) ? $information['dien-thoai'] : '' }}</span>
                        <span class="email_">{{ isset($information['email']) ? $information['email'] : '' }}</span>
                     </div>
                     <div class="col col-xs-12  col-sm-6 col-md-3 aboutUs">
                        <p class="tit_2">Về chúng tôi</p>
                        <ul>
                           @foreach(\App\Entity\Post::categoryShow('ve-chung-toi',5) as $post)
                           <li class="menu-31  selected"><a href="{{ route('post', ['cate_slug' => 've-chung-toi', 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 10) : ''}}">{{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 10) : ''}}</a></li>
                           @endforeach
                        </ul>
                     </div>
                     <div class="col col-xs-12 col-sm-6 col-md-3 support">
                        <p class="tit_2">Dịch vụ & hỗ trợ</p>
                        <ul>
                           
                           @foreach(\App\Entity\Post::categoryShow('dich-vu-ho-tro',5) as $post)
                           <li class="menu-31  selected"><a href="{{ route('post', ['cate_slug' => 'dich-vu-ho-tro', 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 10) : ''}}">{{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 10) : ''}}</a></li>
                           @endforeach
                           
                        </ul>
                     </div>
                     <div class="col col-xs-12 col-sm-6 col-md-3 tags">
                        <p class="tit_2">Từ khóa sản phẩm</p>
                        <div style="margin-top: 20px;" class="tagsearch-footer">
                              @foreach(explode(',', $information['footer-tags']) as $tag)
                                  <a href="{{ route('tags_product', ['tags' => $tag]) }}" title="{{ $tag }}"><span class="tag">{{ $tag }}</span></a>
                              @endforeach
                            </div>
                     </div>
               </div>
               <div class="col-md-2 fanpages">
                  <div class="">
                     <div class="footer_r clearfix ">
                  <p class="tit_2 col-xs-12">Liên kết mạng xã hội</p>
                  <div class="block-fanpage ">
                     <ul class="social-connect">
                        <li>
                           <a href="https://www.facebook.com/sieuthithuoc365.com" rel="nofollow" target="_blank">
                              <i class="fa fa-facebook" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://nhathuocuytin24h.business.site" rel="nofollow" target="_blank">
                              <i class="fa fa-google" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://www.linkedin.com/company/nhathuocuytin24h" rel="nofollow" target="_blank">
                              <i class="fa fa-linkedin" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://twitter.com/uythuoc" rel="nofollow" target="_blank">
                              <i class="fa fa-twitter" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://www.pinterest.com/nhathuocuytin" rel="nofollow" target="_blank">
                              <i class="fa fa-pinterest" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li>
                           <a href="https://www.instagram.com/thuocuytin24h" rel="nofollow" target="_blank">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
                  </div>
               </div>
               
            </div>
             </div>
         </div>
         <div class="register_new_footer">
            <div class="container">
            <div class="get_news row">
               <div class="col-md-6">
                  <form  id="frmGetNews" method="post" accept-charset="utf-8" class="" onsubmit="return subcribeEmailSubmit(this)">
                     {{ csrf_field() }}
                     <p class="tit_f">Đăng ký nhận bản tin</p>
                     <p>Chúng tôi sẽ gửi tất cả các thông tin khuyến mại và chương trình sale off của chúng tôi với bạn</p>
                     <div>
                        <input type="email" id="EmailGetNews" value="" placeholder="Email của bạn..." class="emailSubmit">
                        <button class="button" style="border: none">Đăng ký</button>
                     </div>
                  </form>
                  <div class="ban_quyen_hidden col-xs-12">
                   <p>{{ isset($information['copy-right']) ? $information['copy-right'] : '' }}</p>
                  </div>
               </div>
               <div class="col-md-6 paymentSupport">
                  <p class="tit_f">Thanh toán</p>
                  <p class="tit_m">Chúng tôi cung cấp các giải pháp thanh toán tiện lợi cho bạn</p>
                  <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" alt="icon thanh toan" data-src="{!! isset($information['thuong-hieu']) ? $information['thuong-hieu'] : '' !!}">
               </div>
               <div class="col-xs-12">
                  <div >
                  <a href="//www.dmca.com/Protection/Status.aspx?ID=9d418c0e-b1a8-4630-bb75-d06fc06eb1b8" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w100-5x1-07.png?ID=9d418c0e-b1a8-4630-bb75-d06fc06eb1b8"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
               </div>   
               </div>
               <div class="ban_quyen col-xs-12">
                   <p>{{ isset($information['copy-right']) ? $information['copy-right'] : '' }}</p>
               </div>
            </div>
         </div>
         </div>

      </footer>
      <a href="tel:{{ isset($information['hotline']) ? $information['hotline'] : '' }}" class="call_me">
      <img alt="phone" src="nhathuoc365/templates/version3/scss/images/phone_1.png" style="animation: 5s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;">
     {{ isset($information['hotline']) ? $information['hotline'] : '' }}    </a>

