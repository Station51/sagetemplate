{{--
  Title: Block-Banner-Image
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-banner-image" @if(get_field('background_image')) style="background-image: url({{ get_field('background_image') }})" @endif role="img">
  <div class="container">
    <div class="flex">
      <div>
        @if(get_field('header_title')) 
        <span class="label label--white">
            {!! get_field('header_title') !!}
        </span>
        @endif
        <h1 class="heading heading--1">
          @if(get_field('h1_title')) 
            {!! get_field('h1_title') !!}
          @endif
        </h1>
        @if(get_field('subtitle')) 
          <p>{!! get_field('subtitle') !!}</p>
        @endif
        @if(get_field('button_link')) 
          @php $link = get_field('button_link') @endphp
          <a href="{!! $link['url'] !!}" target="{{ $link['target'] }}" class="btn" @if(get_field('button_background_color') && get_field('button_font_color')) style="background-color:{{ get_field('button_background_color') }}; color:{{ get_field('button_font_color') }};" @endif>
              {!! $link['title'] !!}
          </a>
        @endif
      </div>
    </div>
    <div class='header-overlay'></div>
  </div>
</section>