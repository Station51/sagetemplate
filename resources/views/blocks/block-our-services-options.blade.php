{{--
  Title: Block Our Services CPT
  Category: common
  Icon: awards
--}}

@if(Blocks::getOurServicesCPT())
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="services-center container flex-1 section-center">
    <!-- single service -->
    @foreach(Blocks::getOurServicesCPT() as $service)
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
      @if($service['button_text'])
        <a class="btn white-btn service-btn" href="{!! $service['button_url'] !!}">{!! $service['button_text'] !!}</a>
      @endif
    </article>
    @endforeach
    <!-- end of single service -->
</section>
@endif