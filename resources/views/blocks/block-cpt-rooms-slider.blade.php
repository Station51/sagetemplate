{{--
  Title: Block-CPT-Rooms-Slider
  Category: common
  Icon: awards
--}}

@php 
  $section_id = get_field('section_id');
  $background_color = get_field('background_color');
  $tile_border_color = get_field('tile_border_color');
  $layout = get_field('cta_layout'); 
@endphp

<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section" @if($background_color) style="background-color: {!! $background_color !!}" @endif>
  <div class="container">
    <article class="block-cpt-rooms-slider__content">
      <h2 class="section-header">{!! get_field('headline') !!}</h2>
      <img class="headline-icon" src="@asset('images/icons/reverse-line-arrow-left.svg')" alt="arrow left" />

      @if(get_field('intro'))
        <div class="block-cpt-rooms-slider__intro">
          <p>{!! get_field('intro') !!}</p>
        </div>
      @endif
    </article>

    @php
      $rooms = get_terms([
        'taxonomy' => 'room_category'
      ]);

      $room = new WP_Query([
        'post_type' => 'rooms',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ]);
    @endphp

    <article class="room-block-slider">

      @if($room->have_posts()) 

          @while ($room->have_posts())
            @php
              $room->the_post();
              $roomtitle = get_field('room_title', get_the_ID());
              $readmorebuttontext = get_field('read_more_button_text', get_the_ID());
              $roomprice = get_field('room_price', get_the_ID());
              $buttonurl = get_field('button_url', get_the_ID());
              $roomsnip = get_field('room_snippet', get_the_ID());
              $roomdesc = get_field('room_description', get_the_ID());
              $roomgallery = get_field('gallery', get_the_ID());
            @endphp

            <div class="block-cpt-rooms-slider__tile {{ $layout }}-btn-option" @if($tile_border_color) style="border: 1px solid {!! $tile_border_color !!}" @endif>
              
              <div class="block-cpt-rooms-slider__image">
                {!! the_post_thumbnail() !!}
              </div>

              <div class="block-cpt-rooms-slider__room_content">
                <h3>{!! $roomtitle !!}</h3>
                <div class="block-cpt-rooms-slider__room_snippet">{!! $roomsnip !!}</div>
                @if($layout == 'read')
                  {{-- <div class="btn-wrapper"><a class="btn read-more view-post">{{ $readmorebuttontext ?: "Read more" }}</a></div> --}}
                  <div class="btn-wrapper"><a class="basic-btn read-more modal-link" href="{!! the_permalink() !!}">{{ $readmorebuttontext ?: "Read more" }}</a></div>
                @else
                  <div class="grid btn-wrapper"><div class="price"><span>from</span>{!! $roomprice !!}</div><a class="basic-btn" target="_blank" href="{!! $buttonurl !!}">Book</a></div>
                @endif
              </div>
            
            </div>

          @endwhile
          @php
            wp_reset_postdata();
          @endphp

      @endif

    </article>
  </div>
</section>