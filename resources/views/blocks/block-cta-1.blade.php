{{--
  Title: Block-CTA-1
  Category: common
  Icon: awards
--}}

@php 
  $section_id = get_field('section_id');
  $section_bg_color = get_field('section_bg_color');
  $buttonLink = get_field('button_link');
@endphp

<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section {{ $section_bg_color }}">
  <article class="container cta flex" data-aos="zoom-in"" data-aos-duration="1000">

      @if(get_field('title')) 
        <h3 class="heading heading--2">
            {!! get_field('title') !!}
        </h3>
      @endif
      @if(get_field('content'))
        <p class="block-cta-1__content">
          {!! get_field('content') !!}
        </p>
      @endif

      @if($buttonLink)
        <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class="btn">{!! $buttonLink['title'] !!}</a>
      @endif

  </article>
</section>

