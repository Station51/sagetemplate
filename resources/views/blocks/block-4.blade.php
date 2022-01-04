{{--
  Title: Block-4
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
@php 
  while( have_rows('steps') ): the_row() 
  @endphp
  @if( get_row_index() % 2 == 0 )
  <div class="grid">
    <article class='block-4__picture'>
      <div class='block-4__container'>
         <img src="{!!the_sub_field('image')!!}" alt="">
      </div>
    </article>
    <article class='block-4__info'>
      <div class="block-4__title">
        <h2 class="heading heading--2">{!! the_sub_field('title') !!}</h2>
      </div>
      <p class="block-4__text">{!! the_sub_field('content') !!}
      </p>
      <a href="{!! the_sub_field('url') !!}" class='btn'>{!! the_sub_field('cta') !!}</a>
    </article>
  </div>
  @else 
  <div class="grid">
    <article class='block-4__info'>
      <div class="block-4__title">
        <h2 class="heading heading--2">{!! the_sub_field('title') !!}</h2>
      </div>
      <p class="block-4__text">{!! the_sub_field('content') !!}
      </p>
      <a href="{!! the_sub_field('url') !!}" class='btn'>{!! the_sub_field('cta') !!}e</a>
    </article>
    <article class='block-4__picture'>
      <div class='block-4__container'>
      <img src="{!!the_sub_field('image')!!}" alt="">
      </div>
    </article>
  </div>
  @endif 
@endwhile
</section>