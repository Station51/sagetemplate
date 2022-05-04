
@if(!is_single() && $blog_index_featured_image )
  <div class="block-banner-image blog-banner" style="background-image: url({!! $blog_index_featured_image !!});">
    <div class="container flex">
      <div class="header-overlay"></div>
      <h1 class="heading heading--1">{!! App::title() !!}</h1>
    </div>
  </div>
@endif
