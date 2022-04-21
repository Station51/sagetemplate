{{--
  Title: Block-Image-Wysiwyg
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container">
    <article class="block-image-wysiwyg__content">

      @if(get_field('image'))
        @php
          $image = get_field('image');
          $size = 'large'; // (thumbnail, medium, large, full or custom size)
          $attachment_title = get_the_title($attach_id);      
        @endphp
          {!! wp_get_attachment_image( $image, $size, $attachment_title ) !!}
      @endif

      @if(get_field('content'))
        <div class="block-image-wysiwyg__content">
          {!! get_field('content') !!}
          
          @if(get_field('button_text'))
            <div class="block-image-wysiwyg__btns">
              @if(get_field('button_type') == 'popup')
                <a href="" class="btn block-image-wysiwyg__btn {!! get_field('popup_class') !!}">{!! get_field('button_text') !!}</a>
              @else
                <a href="{!! get_field('button_url') !!}" class="btn block-image-wysiwyg__btn">{!! get_field('button_text') !!}</a>
              @endif
            </div>
          @endif
          
        </div>
      @endif

    </article>
  </div>
</section>

