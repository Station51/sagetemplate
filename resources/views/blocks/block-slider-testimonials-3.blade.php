{{--
  Title: Block-Slider-Testimonials-3
  Category: layout
  Icon: format-gallery
--}}


@if(get_field('background_image'))
  @php $bgImg = get_field('background_image'); @endphp
@endif
@php $section_id = get_field('section_id'); @endphp
@if(Blocks::getSliderTestimonials())
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }}" @if($bgImg) style="background-image: url({!! $bgImg !!})" @endif role="img">
  <article class="block-slider-testimonials-3__inner">
    <div data-aos="zoom-in" data-aos-duration="1000">
      <div class="intro">
        @if(get_field('main_title'))
          <h3>{!! get_field('main_title') !!}</h3>
        @endif
        @if(get_field('sub_title'))
          <h4>{!! get_field('sub_title') !!}</h4>
        @endif
      </div>

      <div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} slider-testimonials3">
        @foreach(Blocks::getSliderTestimonials() as $testimonial)
          <div class="block-slider-testimonials-3__column">
            <div class="block-slider-testimonials-3__banner">
              @if($testimonial['content'])
                <div class="block-slider-testimonials-3__content">{!! ($testimonial['content']) !!}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </article>
  
</section>
@endif

