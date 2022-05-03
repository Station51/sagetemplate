{{--
  Title: block-rooms-1
  Category: common
  Icon: awards
--}}
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
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
  @if($room->have_posts()) 
    <div class="block-rooms-1__item container grid" data-aos="zoom-in" data-aos-duration="1000">
      @while ($room->have_posts())
        @php
          $room->the_post();
          $roomtitle = get_field('room_title', get_the_ID());
          $roomsnip = get_field('room_snippet', get_the_ID());
          $roomdesc = get_field('room_description', get_the_ID());
          $roomserv = get_field('room_services', get_the_ID());
        @endphp
        @foreach (get_the_terms(get_the_ID(), 'room_category') as $cat) 
          @php $termsSLug =  $cat->name @endphp     
        @endforeach

        <div class="block-rooms-1__item--section-center" data-category="{!! $termsSLug !!}">
          <div class="block-rooms-1__item--block">
            {!! the_post_thumbnail() !!}
            <div class="block-rooms-1__item--content">
              <header>
                <h3>{!! $roomtitle !!}</h3>
              </header>
              <div class="block-rooms-1__item--info">{!! $roomsnip !!}</div>
              <div><a href="<?php the_permalink(); ?>" class="btn">Learn more</a></div>
            </div>
          </div>
        </div>

      @endwhile
      @php
        wp_reset_postdata();
      @endphp
    </div>
  @endif
</section>