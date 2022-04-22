{{--
  Title: Block Offers 1
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <article class="container grid grid__outer">

    @php 
      // Check rows exists.
      if( have_rows('the_offer') ):

      // Loop through rows.
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

          {{-- @if(get_sub_field('popup_required') == 'yes')
            <!-- Modal -->
            <div class="offermodal modal">
              <div class="modal-overlay"></div>
              <div class="modal-card">
                <div class="modal-body">
                  <div class="modal-header">{!! get_sub_field('offer_title') !!}</div>
                  <div class="modal-content">{!! get_sub_field('popup_content') !!}</div>
                  <div class="modal-footer" >
                    <button class="popup-close">X</button>
                  </div>
                </div>
              </div>
            </div>
          @endif --}}

      @php // End loop.
      endwhile;

      // No value.
      else :
          echo 'Missed';
      // Do something...
      endif;
    @endphp

  </article>

</section>

