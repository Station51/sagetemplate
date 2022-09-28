{{--
  Title: Block-Image-Grid-Split
  Category: layout
  Icon: format-gallery
--}}

@php
  $section_id = get_field('section_id'); 
  $background_color = get_field('background_color'); 
  $top_left_image = get_field('top_left_image');
  $top_right_image = get_field('top_right_image');
  $bottom_left_image = get_field('bottom_left_image');
  $bottom_right_image = get_field('bottom_right_image'); 
  $textPosition = get_field('text_position');
@endphp

<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section" @if($background_color) style="background-color: {!! $background_color !!}" @endif>
  <div class="container grid grid__outer @if($textPosition) text-left @endif">

    <article class="gallery-cont">
      <div class="gallery-imgs">
        <div class="gallery-img" style="background-image: url({!! $top_left_image !!})"></div>
        <div class="gallery-img" style="background-image: url({!! $top_right_image !!})"></div>
        <div class="gallery-img" style="background-image: url({!! $bottom_left_image !!})"></div>
        <div class="gallery-img" style="background-image: url({!! $bottom_right_image !!})"></div>
      </div>
    </article>

    @if(get_field('static_content')) 
      <article class="text-block">
        <div data-aos="fade-right" data-aos-duration="1000">
          <div class="heading heading--2">
            {!! get_field('header') !!}
            <img class="headline-icon" src="{!! get_field('divider_image') !!}" alt="">
          </div>
          {!! get_field('static_content') !!}

          @php 
            $buttonOne = get_field('button_one');
            $buttonTwo = get_field('button_two'); 
          @endphp
          <div class="the__btns">
            @if($buttonOne)
              <a href="{!! $buttonOne['url'] !!}" class="btn">{!! $buttonOne['title'] !!}</a>
            @endif
            @if($buttonTwo)
              <a href="{!! $buttonTwo['url'] !!}" class="btn">{!! $buttonTwo['title'] !!}</a>
            @endif
          </div>

        </div>
      </article>
    @endif

  </div>
</section>
