{{--
  Title: Block-Banner-Video-1
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }}">
  <div class="hero">
    @if(get_field('heading'))
      <h1 class="heading heading--1">{!! get_field('heading') !!}</h1>
    @endif
    @if(get_field('subtitle'))
      <p>{!! get_field('subtitle') !!}</p>
    @endif
    <video class="hero__bg" autoplay muted loop  @if(get_field('poster')) poster="{!! get_field('poster') !!}"@endif>
      @if(get_field('video'))
        <source src="{!! get_field('video') !!}" type="video/mp4">
        Sorry, you browser does not support embedded videos
      @endif
    </video>
  </div>
</section>