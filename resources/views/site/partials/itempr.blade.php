<div class="col-xs-6 col-md-3 itemProductheight2">
	<div class="item">
    @if (time() <= strtotime($product->deal_end))
        <?php $sale = ($product['price_deal'] / ($product['price'] / 100))?>
        <span class="prd_discount"><br><span style=""><?php echo ceil(100 - $sale) ?>%</span></span>
    @elseif($product['discount'] > 0)
      <?php $sale = ($product['discount'] / ($product['price'] / 100))?>
      <span class="prd_discount"><br><span style=""><?php echo ceil(100 - $sale) ?>%</span></span>
    @endif
    @if ($product['popular_tag'] == 1) 
    <span class="prd_bc">Bán chạy</span>
    @endif
    @if ($product['is_promotion'] == 1) 
    <span class="prd_pr">Khuyến mãi</span>
    @endif
   <figure>
            <a class="img_prd" href="{{ route('product',['cate_slug' => $product->slug]) }}" title="{{ isset($product['title']) ? $product['title'] : ''}}">
            <img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" data-src="{{ isset($product['image']) ? $product['image'] : ''}}" alt="{{ isset($product['title']) ? $product['title'] : ''}}" >
            </a>
   </figure>
   <div class="info">
      <a title="{{ isset($product['title']) ? $product['title'] : '' }}" href="{{ route('product',['cate_slug' => $product->slug]) }}" style="">
          {{ isset($product['title']) ? \App\Ultility\Ultility::textLimit($product['title'], 8) : '' }}
      </a>
      <p>
          @if (time() <= strtotime($product->deal_end))
              <span class="price">{{ number_format( $product['price_deal'] , 0) }} đ</span>
              <span class="price_old">
               {{ number_format( $product['price'] , 0) }} đ
               </span>
          @elseif($product['discount'] > 0)
           <span class="price">{{ number_format( $product['discount'] , 0) }} đ</span>
           <span class="price_old">
           {{ number_format( $product['price'] , 0) }} đ
           </span>
         @else
            @if($product['price'] > 0)
                 <span class="price">{{ number_format( $product['price'] , 0) }} đ</span>
             @else
                  @if ($product['just_view'] == 0)  
                    <span class="price">Giá: Liên hệ</span>
                  @else
                    <span class="price">Xem chi tiết</span>
                  @endif
             @endif     
         @endif
         
      </p>
   </div>
   <a href="{{ route('product',['cate_slug' => $product->slug]) }}" class="buy_mb">Mua hàng</a>
   </div>
</div>