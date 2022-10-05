{{--
  Title: Block Slider Testimonials CPT
  Category: layout
  Icon: format-gallery
--}}

@php $section_id = get_field('section_id'); @endphp
@if(Blocks::getSliderTestimonialsCPT())
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} block-slider-testimonials-cpt" @if(get_field('background_colour')) style="background-color: {!! get_field('background_colour') !!}" @endif role="img" class="block-slider-testimonials-cpt-wrap">
  <article class="block-slider-testimonials-cpt-wrap__inner">
    <div>
      <div class="block-slider-testimonials-cpt__column slider-testimonialscpt">
        @foreach(Blocks::getSliderTestimonialsCPT() as $testimonial)
        <div class="block-slider-testimonials-cpt__banner">
          @if($testimonial['content'])
            <div class="block-slider-testimonials-cpt__content">
              <span class="block-slider-testimonials-cpt__content--text">
                <p>"{{ ($testimonial['content']) }}"</p>
              </span>
              <div class="block-slider-testimonials-cpt__bottom">
                <p class="block-slider-testimonials-cpt__name">{!! ($testimonial['name']) !!}</p>
                <p class="block-slider-testimonials-cpt__place">{!! ($testimonial['location']) !!}</p>
              </div>
            </div>
          @endif
        </div>
        @endforeach
      </div>
    </div>
  </article>
</section>
@else 
<h1>missed</h1>
@endif

