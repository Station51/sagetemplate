{{--
  Title: Block-Contact-Details-1
  Category: layout
  Icon: format-gallery
--}}

@php 
  $section_id = get_field('section_id');
  $background_color = get_field('background_color');
  $buttonLink = get_field('button_link');
@endphp

<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }}" @if($background_color) style="background-color: {!! $background_color !!}" @endif>
  <div class="container grid grid__outer grid-top">

    <article class="cta-block" @if($background_color) style="border: 1px solid {!! $background_color !!}" @endif>
      @if(get_field('phone_block_title'))
        <h4>{!! get_field('phone_block_title') !!}</h4>
      @endif

      @if(get_field('phone_block_content')) 
        <p>{!! get_field('phone_block_content') !!}</p>
      @endif

      @if(get_field('phone_block_telephone')) 
        <p class="phone"><i class="fa fa-phone"></i><a href="tel:{!! get_field('phone_block_telephone') !!}"">{!! get_field('phone_block_telephone') !!}</a></p>
      @endif

      @if(get_field('phone_block_email')) 
        <p class="email"><i class="fa fa-envelope"></i><a href="mailto:{!! get_field('phone_block_email') !!}"">{!! get_field('phone_block_email') !!}</a></p>
      @endif
    </article>

    <article class="cta-block" @if($background_color) style="border: 1px solid {!! $background_color !!}" @endif>
      @if(get_field('address_block_title'))
        <h4>{!! get_field('address_block_title') !!}</h4>
      @endif

      @if(get_field('address_block_content')) 
        <p>{!! get_field('address_block_content') !!}</p>
      @endif
    </article>

    <article class="cta-block" @if($background_color) style="border: 1px solid {!! $background_color !!}" @endif>
      @if(get_field('book_online_block_title'))
        <h4>{!! get_field('book_online_block_title') !!}</h4>
      @endif

      @if(get_field('book_online_block_content')) 
        <p>{!! get_field('book_online_block_content') !!}</p>
      @endif

      @if($buttonLink)
        <div class="block-contact-details-1__btns">
          <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class="btn block-contact-details-1__btn">{!! $buttonLink['title'] !!}</a>
        </div>
      @endif
    
    </article>

  </div>
</section>
