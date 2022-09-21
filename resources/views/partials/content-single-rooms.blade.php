@php 
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
  $buttonLink = get_field('button_link')
@endphp

<section class="block-banner-image" style="background-image: url({!! $backgroundImg[0] !!})" role="img">
  <div class="container flex">
    <div class="header-overlay"></div>
    <h1 class="heading heading--1">{!! App::title() !!}</h1>
  </div>
</section>

<div class="container">
  <article @php post_class() @endphp>
    <header>
      <h1 class="entry-title">{!! get_field('room_title') !!}</h1>
    </header>
    <div class="entry-content grid">
      <div class="rm-desc">
        {!! get_field('room_description') !!}

        @if(Blocks::getGallery())
          <div class="section-slider">
            @foreach(Blocks::getGallery() as $image )
              <div class="rooms-page-slider__column" style="background-image: url({!! $image['url'] !!})" role="img">
                <div class="rooms-page-slider__banner"></div>
              </div>
            @endforeach
          </div>
        @endif

      </div>

      <div class="rm-serv">
        {{-- {!! get_field('room_services') !!} --}}

        @if($buttonLink)
          <div class="block-rooms-1__btns">
            <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class="btn block-rooms-1__btn">{{ $buttonLink['title'] }}</a>

            {{-- @if(get_field('breakfast_menu_url', 'option'))
              <a href="{!! get_field('breakfast_menu_url', 'option') !!}" class="btn block-rooms-1__btn">View Breakfast Menu</a>
            @endif --}}
          </div>
        @endif
        
      </div>
    </div>
  </article>
</div>