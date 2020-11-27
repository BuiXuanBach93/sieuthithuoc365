 <div class="item clearfix itemsinglehright">
   <div class="img_">
      <div class="CropImg CropImg70 CropImgMB60">
            <a class="thumbs" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? $post['title'] : ''}}">
				<img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" data-src="{{ isset($post['image']) ? $post['image'] : ''}}" alt="{{ isset($post['title']) ? $post['title'] : ''}}" />
            </a>
      </div>
   </div>
   <div class="inf_">
      <a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? $post['title'] : ''}}">{{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 10) : ''}}</a>
      </br>
      <p class="created_time">
         <?php 
         $date=date_create($post['updated_at']);
         echo date_format($date,"Y/m/d");
         ?> 
      </p>
      <br>
      <p class="name_">
         {{ isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' }}                
      </p>
   </div>
</div>
