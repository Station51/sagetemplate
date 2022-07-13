{{--
Title: Block-Gallery-Things-To-Do
Category: common
Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section">
  @php
  $menus = get_terms([
  'taxonomy' => 'things_todo_category'
  ]);
  $section = get_field('gallery');
  @endphp
  <div class="container">
    @if( $section['header'])
    <h2 class="heading heading--2 ">
      {!! $section['header'] !!}
      <span class="tilda"></span>
    </h2>
    @endif
    @if($section['text']) <p class="block-gallery-things-to-do__info intro"> {!! $section['text'] !!}</p> @endif
  </div>
  <div class="container">
    <div class="block-gallery-things-to-do__btn--container">
      <button type="button" class="btn block-gallery-things-to-do__btn--filter active filtr filtr-item" data-filter="all">all</button>
      @foreach ($menus as $menu)
      <button type="button" class="btn block-gallery-things-to-do__btn--filter filtr filtr-item" data-filter="{{ $menu->slug }}">{!!
        $menu->name !!}</button>
      @endforeach
    </div>
    @php
    $menu = new WP_Query([
    'post_type' => 'gallery',
    'posts_per_page' => -1,
    ]);
    @endphp
    @if($menu->have_posts())
    <div class="filter-container block-gallery-things-to-do__item container">
      @while ($menu->have_posts())
      @php
      $menu->the_post();
      $text = get_field('overlay_text', get_the_ID());
      $buttonText = get_field('overlay_button', get_the_ID());
      $buttonUrl = get_field('overlay_button_url', get_the_ID());
      @endphp
      @foreach (get_the_terms(get_the_ID(), 'things_todo_category') as $cat)
      @php $termsSLug = $cat->name @endphp
      @endforeach
      <div class="filtr-item block-gallery-things-to-do__item--section-center" data-category="{!! $termsSLug !!}">
        @if (has_post_thumbnail())
        <div class="block-gallery-things-to-do__item--image">
          <span class="overlay-things">
              <h2>{!! the_title() !!}</h2>
            @if($text)
              <p>{!! $text !!}</p>
            @endif
            @if($buttonText)
              <a href="{!! $buttonUrl !!}" target="_blank" rel="noopener noreferrer nofollow">{!! $buttonText !!}</a>
            @endif
          </span>
          {!! the_post_thumbnail() !!}
        </div>
        @endif
      </div>
      @endwhile
      @php
      wp_reset_postdata();
      @endphp
    </div>
    @endif
  </div>
</section>