{{--
  Title: Block-Menu-Filter
  Category: common
  Icon: awards
--}}
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  @php
    $menus = get_terms([
      'taxonomy' => 'menu_category'
    ]);
  @endphp
  @if(get_field("title")) 
    <div class="block-menu-filter__title">
      <h2 class="heading heading--2">{!! get_field("title") !!}</h2>
      <div class="block-menu-filter__title--underline"></div>
    </div>
  @endif
  <div class="block-menu-filter__btn--container">
    <button type="button" class="btn block-menu-filter__btn--filter filtr-item" data-filter="all">all</button>
    @foreach ($menus as $menu) 
    <button type="button" class="btn block-menu-filter__btn--filter filtr-item" data-filter="{{ $menu->slug }}">{!! $menu->name !!}</button>
    @endforeach
  </div>
  @php
  $menu = new WP_Query([
    'post_type' => 'menu',
    'posts_per_page' => -1,
  ]);
  @endphp
  @if($menu->have_posts()) 
    <div class="filter-container block-menu-filter__item container">
	@while ($menu->have_posts())
    @php
		  $menu->the_post();
      $price = get_field('price', get_the_ID());
      $text = get_field('text', get_the_ID());
    @endphp
    @foreach (get_the_terms(get_the_ID(), 'menu_category') as $cat) 
      @php $termsSLug =  $cat->name @endphp     
		@endforeach
    <div class="filtr-item block-menu-filter__item--section-center" data-category="{!! $termsSLug !!}">
      @if (has_post_thumbnail()) 
        <div class="block-menu-filter__item--image">{!! the_post_thumbnail() !!} 
          <div class="block-menu-filter__item--info">
            <header>
              <h3>{!! the_title() !!}</h3>
                <span class="block-menu-filter__item--price">£ {!! $price !!}</span>
            </header>
              <p class="block-menu-filter__item--text">{!! $text !!}</p>
          </div>
        </div>
	    @endif
    </div>
  @endwhile
  @php
	  wp_reset_postdata();
	@endphp
  </div>
@endif
</section>