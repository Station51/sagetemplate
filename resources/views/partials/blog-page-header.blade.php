
@if(!is_single() && $blog_featured_image )
  <div class="block-banner-1" style="background-image: url({!! $blog_featured_image !!});">
    <div class="container flex">
      <div class="header-overlay"></div>
      <h1>Blog Page</h1>
    </div>
  </div>
@endif
