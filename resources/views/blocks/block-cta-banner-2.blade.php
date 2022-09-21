{{--
  Title: Block-CTA-Banner-2
  Category: common
  Icon: awards
--}}

@php
$section_id = get_field('section_id');
$image = get_field('image');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$attachment_title = get_the_title($attach_id); 
$addButton = get_field('add_button');
$buttonLink = get_field('button_link');     
@endphp

<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} connect">
  @if(get_field('image') && ( get_field('radio_button') == 'image' ))
    {!! wp_get_attachment_image( $image, $size, $attachment_title ) !!}
  @elseif(get_field('video') && ( get_field('radio_button') == 'video' ) ) 
    <video autoplay muted loop class="video-container" poster="get_field('image')">
    <source src="{!! get_field('video') !!}" type="video/mp4" />
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
    @if($addButton == 'yes')
      <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class="btn">{!! $buttonLink['title'] !!}</a>
    @endif
  </div>
</section>