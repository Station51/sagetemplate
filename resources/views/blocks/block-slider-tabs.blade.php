{{--
Title: Block-Slider-Tabs
Category: common
Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section block-slider-tabs">
  <div class="container">
    @if(get_field('label'))
    <div class="heading heading--line" smooth-parallax="1" start-position-x="-0.1" end-position-x="0">{!!
      the_field('label') !!}
    </div>
    @endif
    <div class="tabs">
      @php
      while( have_rows('rooms_name') ): the_row()
      @endphp
      <button class="tab btn carousel-btn">{{the_sub_field('room_name') }}</button>
      @endwhile
    </div>
    <div class="content">
      @php
      while( have_rows('block') ): the_row()
      @endphp
      <div class="content-item carousel">
        <div class="images-inner">
          @php
          $images = get_sub_field('images');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          $addButton = get_sub_field('add_button');
          $buttonLink = get_sub_field('button_link');
          @endphp
          <div class="slider-single">
            @foreach( $images as $image_id )
            {!!wp_get_attachment_image( $image_id, $size )!!}
            @endforeach
          </div>
          <div class="slider-nav">
            @foreach( $images as $image_id )
            {!!wp_get_attachment_image( $image_id, $size )!!}
            @endforeach
          </div>
        </div>
        <div class="content-inner">
          <div class="text-container">
            @if(get_sub_field('header'))
            <h2 class="heading heading--2">{!! the_sub_field('header') !!}</h2>
            @endif

            @if(get_sub_field('subtitle'))
            <p class="content-inner__subtitle">{!! the_sub_field('subtitle') !!}</p>
            @endif

            @if(get_sub_field('description'))
            <p class="content-description">{!! the_sub_field('description') !!}</p>
            @endif
          </div>
          @if($addButton == 'yes')
          <div class="btn-wrapper">
            <a href="{!! $buttonLink['url'] !!}" target="{{ $addButton['target'] }}" class="btn btn--content" style="background-color: {!! the_sub_field('background_button_color') !!}; color: {!! the_sub_field('text_color') !!}; border: 2px solid {!! the_sub_field('border_button_color') !!}">{!! $buttonLink['title'] !!}</a>
          </div>
          @endif
        </div>
      </div>
      @endwhile
    </div>
  </div>
</section>

<script>
  const element = document.querySelector('.carousel'); 
    element.classList.add('active'); 
    const carouselBtn=document.querySelector('.carousel-btn'); 
    carouselBtn.classList.add('active');


  let tabs = document.querySelectorAll('.tab');
  let content = document.querySelectorAll('.content-item');
  for (let i = 0; i < tabs.length; i++) {            
      tabs[i].addEventListener('click', () => tabClick(i));
  }

  function tabClick(currentTab) {
      removeActive();
      tabs[currentTab].classList.add('active');
      content[currentTab].classList.add('active');
      console.log(currentTab);
  }

  function removeActive() {
      for (let i = 0; i < tabs.length; i++) {
          tabs[i].classList.remove('active');
          content[i].classList.remove('active');
      }
  }
</script>