{{--
  Title: Block-Image-Split-Repeater
  Category: common
  Icon: awards
--}}

@php 
  $section_id = get_field('section_id');
  $sectionPadding = get_field('section_padding');
@endphp
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} {{ $sectionPadding }}">
@php 
  while( have_rows('steps') ): the_row();

  $addButton = get_sub_field('add_button');
  $buttonLink = get_sub_field('button_link');
  @endphp
  @if( get_row_index() % 2 == 0 )
  <div class="grid">
    <article class='block-image-split-repeater__picture'>
      <div class='block-image-split-repeater__container'>
         <img src="{!!the_sub_field('image')!!}" alt="">
      </div>
    </article>
    <article class='block-image-split-repeater__info'>
      <div class="block-image-split-repeater__title">
        <h2 class="heading heading--2">{!! the_sub_field('title') !!}</h2>
      </div>
      <div class="block-image-split-repeater__text">{!! the_sub_field('content') !!}</div>
      @if($addButton == 'yes')
        <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class='btn'>{!! $buttonLink['title'] !!}</a>
      @endif
    </article>
  </div>
  @else 
  <div class="grid">
    <article class='block-image-split-repeater__info'>
      <div class="block-image-split-repeater__title">
        <h2 class="heading heading--2">{!! the_sub_field('title') !!}</h2>
      </div>
      <div class="block-image-split-repeater__text">{!! the_sub_field('content') !!}</div>
      @if($addButton == 'yes')
        <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class='btn'>{!! $buttonLink['title'] !!}</a>
      @endif
    </article>
    <article class='block-image-split-repeater__picture'>
      <div class='block-image-split-repeater__container'>
      <img src="{!!the_sub_field('image')!!}" alt="">
      </div>
    </article>
  </div>
  @endif 
@endwhile
</section>