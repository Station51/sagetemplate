{{--
  Title: Block-CTA-1
  Category: common
  Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
@if(get_field('section_bg_color') == 'dark')
  <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section section-dark">
@elseif(get_field('section_bg_color') == 'medium')
  <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section section-medium">
@else
  <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section">
@endif

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

      @if(get_field('button_name'))
        <a href="{!! get_field('button_url') !!}" class="btn">{!! get_field('button_name') !!}</a>
      @endif

  </article>
</section>

