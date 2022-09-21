{{--
  Title: Block-Image-Wysiwyg
  Category: common
  Icon: awards
--}}

@php 
  $section_id = get_field('section_id');
  $sectionPadding = get_field('section_padding');
  $buttonLink = get_field('button_link');
@endphp
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} {{ $sectionPadding }}">
  <div class="container">
    <article class="block-image-wysiwyg__content">

      @if(get_field('section_title'))
        <h2>{!! get_field('section_title') !!}</h2>
      @endif

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
          
          @if(get_field('add_button') == 'yes')
            <div class="block-image-wysiwyg__btns">
              @if(get_field('button_type') == 'popup')
                <a href="" class="btn block-image-wysiwyg__btn {!! get_field('popup_class') !!}">{!! get_field('popup_button_text') !!}</a>
              @else
                <a href="{!! $buttonLink['url'] !!}" target="{!! $buttonLink['target'] !!}" class="btn block-image-wysiwyg__btn">{!! $buttonLink['title'] !!}</a>
              @endif
            </div>
          @endif
          
        </div>
      @endif

    </article>
  </div>
</section>

