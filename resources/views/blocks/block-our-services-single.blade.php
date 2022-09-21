{{--
  Title: Block Our Services Single
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container">
    @if(get_field('headline'))
      <h2>{!! get_field('headline') !!}</h2>
      <img class="headline-icon" src="@asset('images/icons/reverse-line-arrow-left.svg')" alt="" />
    @endif

    @if(get_field('intro'))
      <div class="intro_container">
        {!! get_field('intro') !!}
      </div>
    @endif

    @if(Blocks::getOurServicesSingle())
      <div class="services-center container flex-1 section-center">
        <!-- single service -->
        @foreach(Blocks::getOurServicesSingle() as $service)
        <article class="service">
          @if( $service['icon'])
          <div data-aos="zoom-in" class="icon">
            <img width="82" height="82" src="{!! $service['icon'] !!}" alt="icon">
          </div>
          @endif
          @if($service['title'])
            <h4>{!! $service['title'] !!}</h4>
          @endif
          @if($service['content'])
            <p>{!! $service['content'] !!}</p>
          @endif
          @if($service['add_button'] == 'yes')
            <a class="btn white-btn service-btn" target="{{ $service['button_link']['target'] }}" href="{!! $service['button_link']['url'] !!}">{!! $service['button_link']['title'] !!}</a>
          @endif
        </article>
        @endforeach
        <!-- end of single service -->
      </div>
    @endif
  </div>
</section>