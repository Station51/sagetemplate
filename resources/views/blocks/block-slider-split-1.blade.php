{{--
  Title: Block-Slider-Split-1
  Category: layout
  Icon: format-gallery
--}}

@php 
  $section_id = get_field('section_id'); 
  $buttonOneLink = get_field('button_one_link');
  $buttonTwoLink = get_field('button_two_link');
@endphp
@if(get_field('text_position') == 'left') 

  @if(get_field('section_bg_color') == 'dark')
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section-dark">
  @elseif(get_field('section_bg_color') == 'medium')
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section-medium">
  @else
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }}">
  @endif
  
    @if(get_field('section_layout_style') == 'space') 
      <div class="grid grid__outer space">
    @else
      <div class="grid grid__outer">
    @endif

      @if(get_field('static_content')) 
        <article class="text-block left">
          <div data-aos="fade-right" data-aos-duration="1000">
            {!! get_field('static_content') !!}
            @if (get_field('button_type') == 'popup')
              <div class="block-slider-split-1__btns">
                @if(get_field('button_popup_text'))
                  <a href="" class="btn block-slider-split-1__btn {!! get_field('popup_class') !!}">{!! get_field('button_popup_text') !!}</a>
                @endif
              </div>
            @else
              @if($buttonOneLink || $buttonTwoLink)
                <div class="block-slider-split-1__btns">
                  @if($buttonOneLink)
                    <a href="{!! $buttonOneLink['url'] !!}" target="{{ $buttonOneLink['target'] }}" class="btn block-slider-split-1__btn">{!! $buttonOneLink['title'] !!}</a>
                  @endif
                  @if($buttonTwoLink)
                    <a href="{!! $buttonTwoLink['url'] !!}" target="{{ $buttonTwoLink['target'] }}" class="btn block-slider-split-1__btn">{!! $buttonTwoLink['title'] !!}</a>
                  @endif
                </div>
              @endif
            @endif
          </div>
        </article>
      @endif

      @if(Blocks::getGallery())
        <article data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
            @foreach(Blocks::getGallery() as $image )
              <div class="block-slider-split-1__column" style="background-image: url({!! $image !!})" role="img">
                <div class="block-slider-split-1__banner"></div>
              </div>
            @endforeach
        </article>
      @endif

    </div>
  </section>

@else

  @if(get_field('section_bg_color') == 'dark')
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section-dark section-flip">
  @elseif(get_field('section_bg_color') == 'medium')
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section-medium section-flip">
  @else
    <section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section-flip">
  @endif

    @if(get_field('section_layout_style') == 'space') 
      <div class="grid grid__outer space">
    @else
      <div class="grid grid__outer">
    @endif

      @if(Blocks::getGallery())
        <article data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-slider">
            @foreach(Blocks::getGallery() as $image )
              <div class="block-slider-split-1__column" style="background-image: url({!! $image !!})" role="img">
                <div class="block-slider-split-1__banner"></div>
              </div>
            @endforeach
        </article>
      @endif

      @if(get_field('static_content')) 
        <article class="text-block right">
          <div data-aos="fade-left" data-aos-duration="1000">
            {!! get_field('static_content') !!}
            @if (get_field('button_type') == 'popup')
              <div class="block-slider-split-1__btns">
                @if(get_field('button_popup_text'))
                  <a href="" class="btn block-slider-split-1__btn {!! get_field('popup_class') !!}">{!! get_field('button_popup_text') !!}</a>
                @endif
              </div>
            @else
              @if($buttonOneLink || $buttonTwoLink)
                <div class="block-slider-split-1__btns">
                  @if($buttonOneLink)
                    <a href="{!! $buttonOneLink['url'] !!}" target="{{ $buttonOneLink['target'] }}" class="btn block-slider-split-1__btn">{!! $buttonOneLink['title'] !!}</a>
                  @endif
                  @if($buttonTwoLink)
                    <a href="{!! $buttonTwoLink['url'] !!}" target="{{ $buttonTwoLink['target'] }}" class="btn block-slider-split-1__btn">{!! $buttonTwoLink['title'] !!}</a>
                  @endif
                </div>
              @endif
            @endif
          </div>
        </article>
      @endif

    </div>
  </section>

@endif
