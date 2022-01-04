{{--
  Title: Block-5
  Category: common
  Icon: awards
--}}
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} connect">
  @if(get_field('image') && ( get_field('radio_button') == 'image' ))
    <img class="video-container" src="{!! wp_get_attachment_image( get_field('image'), 'hero') !!}">
  @elseif(get_field('video') && ( get_field('radio_button') == 'video' ) ) 
    <video autoplay muted loop class="video-container"
    poster="{!! wp_get_attachment_image( get_field('image'), 'hero') !!}">
    <source src=" {!! get_field('video') !!}" type="video/mp4" />
    Sorry, you browser does not support embedded videos
  </video>
  @endif
  <div class="video-banner">
    <div class="section-title video-title">
      @if(get_field('title'))
        <h2 class="heading heading--2">
          {!! get_field('title') !!}
        </h2>
      @endif
    </div>
    @if(get_field('text'))
      <p class="video-text">{!! get_field('text') !!}</p>
    @endif
    @if(get_field('url') && get_field('cta'))
      <a href="{!! get_field('url') !!}" class="btn">{!! get_field('cta') !!}</a>
    @endif
  </div>
</section>