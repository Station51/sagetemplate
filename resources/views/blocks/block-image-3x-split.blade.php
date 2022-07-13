{{--
Title: Block-Image-3x-Split
Category: common
Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }}">
  @php
  $section_bottom = get_field('images_bottom');
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
  $attachment_title = get_the_title($attach_id);
  @endphp
  <div class="block-image-3x-split-h__wrapper" @if(get_field('background_colour'))
    style="background-color: {{ get_field('background_colour') }};" @endif>
    <div class="container grid grid__outer @if(get_field('switch_images')) isSwitched @endif">
      <div class="block-image-3x-split-h__content @if(get_field('switch_images')) isSwitched @endif" data-aos="fade"
        data-aos-duration="2000">
        @if(get_field('label_bottom'))
        <h3 class="heding heading--line" @if(get_field('header_text_color'))
          style="color: {{ get_field('header_text_color') }};" @endif smooth-parallax="1" start-position-x="-0.1"
          end-position-x="0">{!! get_field('label_bottom') !!}</h3>
        @endif
        @if(get_field('header_bottom'))
        <div class="heading heading--2" @if(get_field('header_text_color'))
          style="color: {{ get_field('header_text_color') }};" @endif data-aos="fade">
          {!! get_field('header_bottom') !!}
        </div>
        <span class="emblem"></span>
        @endif
        @if(get_field('sub_header_bottom'))
        <p class="block-image-3x-split-h__content-title" @if(get_field('header_text_color'))
          style="color: {{ get_field('header_text_color') }};" @endif data-aos="fade">
          {!! get_field('sub_header_bottom') !!}
        </p>
        @endif
        <article @if(get_field('text_column')=='two' ) style=" column-width: 210px;" @endif>
          @if(get_field('text_bottom'))
          <p class="block-image-3x-split-h__col" @if(get_field('text_color')) style="color: {{ get_field('text_color') }};"
            @endif>
            {!! get_field('text_bottom') !!}
          </p>
          @endif
        </article>
        @php $button = get_field('button') @endphp
        @php $buttonR = get_field('button_1') @endphp
        @if($button['button_text'])
        <a href="{{ $button[button_url] }}" class="btn" style="color: {{ $button['button_font_color'] }}; background-color: {{ $button['button_background_color'] }}; border: 2px solid {{ $button['button_border_color']  }};">{!! $button['button_text'] !!}</a>
        @endif
        @if($buttonR['button_text'])
        <a href="{{ $buttonR[button_url] }}" class="btn" style="color: {{ $buttonR['button_font_color'] }}; background-color: {{ $buttonR['button_background_color'] }}; border: 2px solid {{ $buttonR['button_border_color']  }};">{!! $buttonR['button_text'] !!}</a>
        @endif
      </div>
      <div class="block-image-3x-split-h__inner">
        <div class="block-image-3x-split-h__top-images">
          @php
          $imageID = $section_bottom['image_1'];
          $image = wp_get_attachment_image_src( $imageID, 'full' );
          $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
          @endphp
          @if($section_bottom['image_1'])
          <img class="block-image-3x-split-h__top-images--top" src="{!! $image[0] !!}" alt="{{ $alt_text }}"
            smooth-parallax="1" start-position-y="0.3" end-position-y="0" />
          @endif

          @php
          $image2 = $section_bottom['image_2'];
          $imageLeft = wp_get_attachment_image_src( $image2, 'full' );
          $alt_text2 = get_post_meta($image2 , '_wp_attachment_image_alt', true);
          @endphp

          <div class="block-image-3x-split-h__top-images--left" smooth-parallax="1" start-position-y="1"
            end-position-y="0.2">
            <img class="block-image-3x-split-h__top-images--left_inner" src="{!! $imageLeft[0] !!}"
              alt="{{ $alt_text2 }}" />
          </div>

          @php
          $image3 = $section_bottom['image_3'];
          $imageTop = wp_get_attachment_image_src( $image3, 'full' );
          $alt_text3 = get_post_meta($image3 , '_wp_attachment_image_alt', true);
          @endphp

          @if($section_bottom['image_3'])
          <div class="block-image-3x-split-h__top-images--bottom" smooth-parallax="1" start-position-y="-0.4"
            end-position-y="0">
            <img class="block-image-3x-split-h__top-images--bottom_inner" src="{!! $imageTop[0] !!}" alt="{{ $alt_text3 }}"
              smooth-parallax="1" start-position-y="-0.1" end-position-y="0" />
          </div>
          @endif

          @if($section_bottom['tartan'])
          <div class="block-image-3x-split__tartan">
            <img class="block-image-3x-split__tartan--inner" src="@asset('images/svg/white-tartan.svg')" alt="Tartan"
              smooth-parallax="1" start-position-y="-0.4" end-position-y="0.2" />
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>