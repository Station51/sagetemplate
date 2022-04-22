{{--
  Title: Block-Contact-Details-1
  Category: layout
  Icon: format-gallery
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section-color">
  <div class="container grid grid__outer grid-top">

    <article class="cta-block">
      @if(get_field('phone_block_title'))
        <h4>{!! get_field('phone_block_title') !!}</h4>
      @endif

      @if(get_field('phone_block_content')) 
        <p>{!! get_field('phone_block_content') !!}</p>
      @endif

      @if(get_field('phone_block_telephone')) 
        <p class="phone"><i class="fas fa-phone-alt"></i><a href="tel:{!! get_field('phone_block_telephone') !!}"">{!! get_field('phone_block_telephone') !!}</a></p>
      @endif

      @if(get_field('phone_block_email')) 
        <p class="email"><i class="fa fa-envelope"></i><a href="mailto:{!! get_field('phone_block_email') !!}"">{!! get_field('phone_block_email') !!}</a></p>
      @endif
    </article>

    <article class="cta-block">
      @if(get_field('address_block_title'))
        <h4>{!! get_field('address_block_title') !!}</h4>
      @endif

      @if(get_field('address_block_content')) 
        <p>{!! get_field('address_block_content') !!}</p>
      @endif
    </article>

    <article class="cta-block">
      @if(get_field('book_online_block_title'))
        <h4>{!! get_field('book_online_block_title') !!}</h4>
      @endif

      @if(get_field('book_online_block_content')) 
        <p>{!! get_field('book_online_block_content') !!}</p>
      @endif

      <div class="block-contact-details-1__btns">
        @if(get_field('book_online_button_text'))
          <a href="{!! get_field('book_online_button_url') !!}" class="btn block-contact-details-1__btn">{!! get_field('book_online_button_text') !!}</a>
        @endif
      </div>
    </article>

  </div>
</section>
