{{--
  Title: Block-Slider-Testimonials-1
  Category: layout
  Icon: format-gallery
--}}


@if(get_field('background_image'))
  @php $bgImg = get_field('background_image'); @endphp
@endif

@if(Blocks::getSliderTestimonials())
<section @if($bgImg) style="background-image: url({!! $bgImg !!})" @endif role="img" class="block-slider-testimonials-wrap">
  <article class="block-slider-testimonials-wrap__inner">
    <div data-aos="zoom-in" data-aos-duration="1000">
      <div class="intro">
        @if(get_field('main_title'))
          <h3>{!! get_field('main_title') !!}</h3>
        @endif
        @if(get_field('sub_title'))
          <h4>{!! get_field('sub_title') !!}</h4>
        @endif
      </div>

      <div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider-testimonials-1">
        @foreach(Blocks::getSliderTestimonials() as $testimonial)
          <div class="block-slider-testimonials-1__column">
            <div class="block-slider-testimonials-1__banner">
              @if($testimonial['content'])
                <div class="block-slider-testimonials-1__content">{!! ($testimonial['content']) !!}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </article>
  
</section>
@else @php echo 'Missed' @endphp
@endif

{{-- <div class="block-slider-test-1">
  @foreach(Blocks::getSliderTestimonials() as $testimonial)
    <div>{!! ($testimonial['content']) !!}</div>
  @endforeach
</div> --}}
