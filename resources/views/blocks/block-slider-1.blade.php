{{--
  Title: Block-Slider-1
  Category: layout
  Icon: format-gallery
--}}

@if(Blocks::getSlider())
<div data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
  @foreach(Blocks::getSlider() as $slide)
    <div class="block-slider__column" @if($slide['title']) style="background-image: url({!! $slide['image'] !!})" @endif role="img">
      <div class="block-slider__banner">
        @if(( $slide['logo']))
          <span class="block-slider__logo">{!! wp_get_attachment_image( $slide['logo'], 'logo') !!}</span>
        @elseif($slide['title'])
          <h1 class="heading heading--1">{!! $slide['title'] !!}</h1>
        @endif
        @if($slide['content'])
          <p class="block-slider__content">{!! ($slide['content']) !!}</p>
        @endif
        <div class="block-slider__btns">
          @if(( $slide['button_text_1']))
            <a href="{!! $slide['button_url_1'] !!}" class="btn block-slider__btn">{!! $slide['button_text_1'] !!}</a>
          @endif
          @if(( $slide['button_text_2']))
            <a href="{!! $slide['button_url_2'] !!}" class="btn block-slider__btn">{!! $slide['button_text_2'] !!}</a>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
@endif
