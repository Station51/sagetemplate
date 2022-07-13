{{--
  Title: Block-Banner-Slider-BG-Image
  Category: layout
  Icon: format-gallery
--}}

@if(Blocks::getSlider())
<div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
  @foreach(Blocks::getSlider() as $slide)
    <div class="block-banner-slider-bg-image__column" @if($slide['image']) style="background-image: url({!! $slide['image'] !!})" @endif role="img">
      <div class="block-banner-slider-bg-image__banner">
        @if(( $slide['logo']))
          <span class="block-banner-slider-bg-image__logo">{!! wp_get_attachment_image( $slide['logo'], 'logo') !!}</span>
        @elseif($slide['title'])
          <h1 class="heading heading--1">{!! $slide['title'] !!}</h1>
        @endif
        @if($slide['content'])
          <p class="block-banner-slider-bg-image__content">{!! ($slide['content']) !!}</p>
        @endif
        <div class="block-banner-slider-bg-image__btns">
          @if(( $slide['button_text_1']))
            <a href="{!! $slide['button_url_1'] !!}" class="btn block-banner-slider-bg-image__btn">{!! $slide['button_text_1'] !!}</a>
          @endif
          @if(( $slide['button_text_2']))
            <a href="{!! $slide['button_url_2'] !!}" class="btn block-banner-slider-bg-image__btn">{!! $slide['button_text_2'] !!}</a>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
@endif
