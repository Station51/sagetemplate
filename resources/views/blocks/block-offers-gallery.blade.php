{{--
Title: Block Offers Gallery
Category: common
Icon: awards
--}}

@php
  $menus = get_terms([
    'taxonomy' => 'offers'
  ]);
@endphp

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container">

    @foreach (get_the_terms(get_the_ID(), 'offers') as $cat)
      @php $termsSLug = $cat->name @endphp
    @endforeach
    @php
    $offerEvents = new WP_Query([
      'post_type' => 'offers',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ]);
    @endphp
    <div class="block-offers-gallery__flex">
      @while ($offerEvents->have_posts())
      @php
      $offerEvents->the_post();
      $id = get_the_ID();
      $open_offer = get_field('open_offer', $id);
      @endphp
      <article class="block-offers-gallery__article">
        <div class="block-offers-gallery__article--main-img">
          <h3 class="project-info" >{!! the_title() !!}</h3>
          {!! wp_get_attachment_image( get_field('offer_image', $id), 'slide_main') !!}
        </div>


        <div class="content-wrap">
          <p class="block-offers-gallery__article--subtitle">{!!get_field('offer_subtitle', $id)!!}</p>
          <p class="block-offers-gallery__article--text accordion__item accordion__item--activ">{!!wp_trim_words( get_field('offer_text', $id), 35) !!}
          </p>
        
          <div class="block-offers-gallery__article--buttons">
            <a class="btn btn--blue @if($open_offer) modal-link @endif" href="{!! the_permalink() !!}">{!! get_field('button_text', $id) !!}</a>
          </div>
        </div>
        
      </article>
      @endwhile
    </div>
  </div>
</section>
