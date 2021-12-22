{{--
  Title: Block Banner 1
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-banner-1" @if(get_field('background_image')) style="background-image: url({{ get_field('background_image') }})" @endif role="img">
  <div class="container flex">
    <span class="label label--white">
      @if(get_field('header_title')) 
        {!! get_field('header_title') !!}
      @endif
    </span>
    <h1 class="heading heading--1">
      @if(get_field('h1_title')) 
        {!! get_field('h1_title') !!}
      @endif
    </h1>
    <p> 
      @if(get_field('subtitle')) 
       {!! get_field('subtitle') !!}
      @endif
    </p>
    <a 
      href="@if(get_field('button_url')) {!! get_field('button_url') !!} @endif" 
      class="btn" @if(get_field('button_background_color') && get_field('button_font_color')) style="background-color:{{ get_field('button_background_color') }}; color:{{ get_field('button_font_color') }};" @endif>
        @if(get_field('button_name')) 
          {!! get_field('button_name') !!}
        @endif
    </a>
  </div>
</section>