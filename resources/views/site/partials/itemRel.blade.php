<div class="item">
	<div class="CropImg CropImg100">
         <div class="thumbs">
            <a  href="{{ route('product',['cate_slug' => $product->slug]) }}" title="{{ isset($product['title']) ? $product['title'] : ''}}">
            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" data-src="{{ isset($product['image']) ? $product['image'] : ''}}" alt="{{ isset($product['title']) ? $product['title'] : ''}}" >
            </a>
         </div>
    </div>
    @if ($product['popular_tag'] == 1) 
    <span class="same-product-prd_bc">Bán chạy</span>
    @endif
    @if ($product['is_promotion'] == 1) 
    <span class="same-product-prd_pr">Khuyến mại</span>
    @endif
	<a href="{{ route('product',['cate_slug' => $product->slug]) }}" title="{{ isset($product['title']) ? $product['title'] : ''}}">
	  {{ isset($product['title']) ? $product['title'] : ''}}         
	</a>
	<div class="">
	@if (time() <= strtotime($product->deal_end))
		<span class="price">{{ number_format( $product['price_deal'] , 0) }} đ</span>
		<span class="price_old">
		   {{ number_format( $product['price'] , 0) }} đ
		   </span>
	@elseif($product['discount'] > 0)
	   <p class="price">{{ number_format( $product['discount'] , 0) }} đ</p>
	   <p class="price_old">
	   <del>{{ number_format( $product['price'] , 0) }} đ   </del>         
	   </p>
	@else
	  @if($product['price'] > 0)
        <div class="price">{{ number_format( $product['price'] , 0) }} đ</div>
      @else
        @if ($product['just_view'] == 0)  
          <span class="price">Giá: Liên hệ</span>
        @else
          <span class="price">Xem chi tiết</span>
        @endif     
      @endif    
	  <p>
	  	 <del style="color: #fff">0</del>       
	  </p>
	@endif
	</div>
</div>


