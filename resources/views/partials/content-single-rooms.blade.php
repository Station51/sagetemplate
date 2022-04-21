{{-- @if(Blocks::getGallery())
  <div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
    @foreach(Blocks::getGallery() as $image )
      <div class="block-rooms-1__column" style="background-image: url({!! $image !!})" role="img">
        <div class="block-rooms-1__banner"><h2>{!! get_the_title() !!}</h2></div>
      </div>
    @endforeach
  </div>
@endif --}}

@php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ) @endphp

<section class="block-banner-basic" style="background-image: url({!! $backgroundImg[0] !!})" role="img">
  <article class="block-banner-basic__column">
    <div class="block-banner-basic__banner">
        <div class="banner-content">
            <div class="text-block">
                <h2>{!! get_the_title() !!}</h2>
            </div>
        </div>
    </div>
    </article>
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
              <div class="rooms-page-slider__column" style="background-image: url({!! $image !!})" role="img">
                <div class="rooms-page-slider__banner"></div>
              </div>
            @endforeach
          </div>
        @endif

      </div>
      {{-- <div class="rm-serv">{!! get_field('room_services') !!}</div> --}}
      <div class="rm-serv">
        {!! get_field('room_services') !!}

        <div class="block-rooms-1__btns">
          @if(get_field('breakfast_menu_url', 'option'))
            <a href="{!! get_field('breakfast_menu_url', 'option') !!}" target="_blank" class="btn block-rooms-1__btn">View Breakfast Menu</a>
          @endif
          
          @if(get_field('button_url'))
            <a href="{!! get_field('button_url') !!}" class="btn block-rooms-1__btn">Book Now</a>
          @endif
        </div>
      </div>
    </div>

    {{-- <div class="block-rooms-1__btns">
      @if(get_field('breakfast_menu_url', 'option'))
        <a href="{!! get_field('breakfast_menu_url', 'option') !!}" target="_blank" class="btn block-rooms-1__btn">View Breakfast Menu</a>
      @endif
      
      @if(get_field('button_url'))
        <a href="{!! get_field('button_url') !!}" class="btn block-rooms-1__btn">Book Now</a>
      @endif
    </div> --}}

    {{-- <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
    @php comments_template('/partials/comments.blade.php') @endphp --}}
  </article>
</div>