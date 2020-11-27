<section class="dd-menu">
   <div class="wrapper container">
      <div class="contain_slide clearfi row">
         <div class="col-md-3">
         </div>
         <div class="col-md-9 slide-h" style="padding:0;">
            <div id="slide_homel" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  @foreach(\App\Entity\SubPost::showSubPost('slider', 10) as $id => $slide)
                  <div class="item {{ ($id == 0) ? 'active' : '' }}">
                     <a href="{{ $slide['duong-dan'] }}">
                     <img class="img-responsive" src="{{ $slide['image'] }}" />
                     </a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>