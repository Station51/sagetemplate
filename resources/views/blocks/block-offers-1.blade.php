{{--
  Title: Block Offers 1
  Category: common
  Icon: awards
--}}

@php 
  $section_id = get_field('section_id');
  $background_color = get_field('background_color');
@endphp
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section" @if($background_color) style="background-color: {!! $background_color !!}" @endif>
  <article class="container grid grid__outer">
    @php 
      if( have_rows('the_offer') ):
        while( have_rows('the_offer') ) : the_row(); 
        
        $buttonLink = get_sub_field('button_link');
        @endphp

            @if(get_sub_field('image'))
              @php
                $imageOne = get_sub_field('image');    
              @endphp
            @endif
              
            <div class="block-offers-1__content" style="background-image: url({!! $imageOne !!})" role="img" data-aos="flip-left"" data-aos-duration="1000">
              <div class="block-offers-1__content-item">

                <h3>{!! get_sub_field('offer_title') !!}</h3>

                @if(get_sub_field('button_type') == 'popup')
                  @if(get_sub_field('popup_button_text'))
                    <a class="btn {!! get_sub_field('popup_class') !!}">{!! get_sub_field('popup_button_text') !!}</a>
                  @endif
                @else
                  @if($buttonLink)
                    <a class="btn" target="{{ $buttonLink['target'] }}" href="{!! $buttonLink['url'] !!}">{!! $buttonLink['title'] !!}</a>
                  @endif
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
