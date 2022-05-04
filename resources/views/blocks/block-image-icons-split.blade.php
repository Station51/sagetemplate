{{--
  Title: Block-Image-Icons-Split
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container grid grid__outer">
    <div class="block-image-icons-split_content">
      @if(get_field('title')) 
        <h2 class="heading heading--2">
            {!! get_field('title') !!}
        </h2>
      @endif
      @if(get_field('content'))
        <p class="block-image-icons-split__content-paragraph">
          {!! get_field('content') !!}
        </p>
      @endif

      @if(get_field('title_first_row'))
        <div class="block-image-icons-split__content-item">
          <span class="fa-layers fa-3x">
            <i class="far fa-building"></i>
          </span>
          <div class="u-display-flex u-flex-direction-col">
            <span class="block-image-icons-split__content-item-label">
              {!! get_field('title_first_row') !!}
            </span>
            <p>
              @if(get_field('subtitle_first_row'))
                {!! get_field('subtitle_first_row') !!}
              @endif
            </p>
          </div>  
        </div>
      @endif

      @if(get_field('title_second_row'))
        <div class="block-image-icons-split__content-item">
          <span class="fa-layers fa-3x">
            <i class="far fa-building"></i>
          </span>
          <div class="u-display-flex u-flex-direction-col">
            <span class="block-image-icons-split__content-item-label">
              {!! get_field('title_second_row') !!}
            </span>
            <p>
              @if(get_field('subtitle_second_row'))
               {!! get_field('subtitle_second_row') !!}
              @endif
            </p>
          </div>  
        </div>
      @endif
      @if(get_field('button_name'))
        <a href="{!! get_field('button_url') !!}" class="btn">{!! get_field('button_name') !!}</a>
      @endif
    </div>
    @if(get_field('image'))
      @php
        $image = get_field('image');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        $attachment_title = get_the_title($attach_id);      
      @endphp
        {!! wp_get_attachment_image( $image, $size, $attachment_title ) !!}
    @endif
  </div>
</section>

