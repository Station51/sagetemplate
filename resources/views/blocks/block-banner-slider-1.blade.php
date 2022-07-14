{{--
  Title: Block-Banner-Slider-1
  Category: layout
  Icon: format-gallery
--}}

@if(Blocks::getBannerSlider())
<div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
  @foreach(Blocks::getBannerSlider() as $slide)
    <div class="block-banner-slider-1__column">
      <div class="block-banner-slider-1__banner">
        <div class="overlay"></div>

        @php
          $image = $slide['image'];
          $size = 'large'; // (thumbnail, medium, large, full or custom size)
        @endphp

        {!! wp_get_attachment_image( $image, $size) !!}

        <div class="content-cont">
          @if($slide['content'])
            <div class="block-banner-slider-1__content">{!! ($slide['content']) !!}</div>
          @endif
          @if(( $slide['popup_button'] ) == 'yes')
            @if(( $slide['popup_button_text']))
              <div class="block-banner-slider-1__btns">
                <a href="" class="btn block-banner-slider-1__btn {!! $slide['popup_class'] !!}">{!! $slide['popup_button_text'] !!}</a>
              </div>
            @endif
          @else
            @if(( $slide['button_text_1']))
              <div class="block-banner-slider-1__btns">
                <a href="{!! $slide['button_url_1'] !!}" class="btn block-banner-slider-1__btn">{!! $slide['button_text_1'] !!}</a>
                @if(( $slide['button_text_2']))
                  <a href="{!! $slide['button_url_2'] !!}" class="btn block-banner-slider-1__btn">{!! $slide['button_text_2'] !!}</a>
                @endif
              </div>
            @endif
          @endif
        </div>

      </div>
    </div>
  @endforeach
</div>
@endif
