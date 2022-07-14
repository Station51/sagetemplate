{{--
  Title: Block Offers 1
  Category: common
  Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section">
  <article class="container grid grid__outer">
    @php 
      if( have_rows('the_offer') ):
        while( have_rows('the_offer') ) : the_row(); @endphp

            @if(get_sub_field('image'))
              @php
                $imageOne = get_sub_field('image');    
              @endphp
            @endif
              
            <div class="block-offers-1__content" style="background-image: url({!! $imageOne !!})" role="img" data-aos="flip-left"" data-aos-duration="1000">
              <div class="block-offers-1__content-item">

                <h3>{!! get_sub_field('offer_title') !!}</h3>
                @if(get_sub_field('popup_required') == 'yes')
                  <a class="btn {!! get_sub_field('popup_class') !!}">{!! get_sub_field('button_text') !!}</a>
                @else
                  <a class="btn" href="{!! get_sub_field('button_url') !!}">{!! get_sub_field('button_text') !!}</a>
                @endif

              </div>
            </div>
        @php // End loop.
        endwhile;
      else :
        // Do nothing
      endif;
    @endphp
  </article>
</section>
