{{--
  Title: Block-Slider-Filter-Items
  Category: common
  Icon: awards
--}}

@if(Blocks::getSliderFilterType()) 
  @php 
    $section_id = Blocks::getSliderFilterType()['section_id'];
    $brand = Blocks::getSliderFilterType()['brand'];
  @endphp
@endif

<div id="{{ $section_id }}" class="block-slider-filter-items-wrap section-bottom">
  <div class="menu-cont menu-color-{{ $brand }}">
    <button class="all active" data-filter="all">All</button> <button class="light" data-filter="light">Light Roast</button> <button class="moderate" data-filter="moderate">Moderate Roast</button> <button class="heavy" data-filter="heavy">Heavy Roast</button> <button class="decaf" data-filter="decaf">Decaf</button>
  </div>
  @if(Blocks::getSliderFilterItems())
    <section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} coffee-slider items-slider">
      
      @if($brand == 'all')
        @foreach(Blocks::getSliderFilterItems() as $ouritem)
          <div class="tile {!! $ouritem['item_type'] !!} {!! $ouritem['brand'] !!}">
            <div class="ouritem">
              <article class="outer-wrap">
                <div class="inner-wrap">
                  <div class="read-more-block">
                    <div class="img-cont">
                      <img src="{!! $ouritem['item_image'] !!}" alt="item image">
                    </div>
                    <h4>{!! $ouritem['title'] !!}</h4>
                    <p>{!! $ouritem['content'] !!}</p>
                  </div>
                </div>
              </article>
              <div class="btn-cont">
                <a class="read-more-btn">Read more</a>
                @php $link = $ouritem['the_button']; @endphp
                <a class="btn" target="{!! $link['target'] !!}" href="{!! $link['url'] !!}">{!! $link['title'] !!}</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif

      @if($brand == 'azzuro')
        @foreach(Blocks::getSliderFilterItems() as $ouritem)
          @if($ouritem['brand'] == 'azzuro')
            <div class="tile {!! $ouritem['item_type'] !!} {!! $ouritem['brand'] !!}">
              <div class="ouritem">
                <article class="outer-wrap">
                  <div class="inner-wrap">
                    <div class="read-more-block">
                      <div class="img-cont">
                        <img src="{!! $ouritem['item_image'] !!}" alt="item image">
                      </div>
                      <h4>{!! $ouritem['title'] !!}</h4>
                      <p>{!! $ouritem['content'] !!}</p>
                    </div>
                  </div>
                </article>
                <div class="btn-cont">
                  <a class="read-more-btn">Read more</a>
                  @php $link = $ouritem['the_button']; @endphp
                  <a class="btn" target="{!! $link['target'] !!}" href="{!! $link['url'] !!}">{!! $link['title'] !!}</a>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endif

      @if($brand == 'julius')
        @foreach(Blocks::getSliderFilterItems() as $ouritem)
          @if($ouritem['brand'] == 'julius')
            <div class="tile {!! $ouritem['item_type'] !!} {!! $ouritem['brand'] !!}">
              <div class="ouritem">
                <article class="outer-wrap">
                  <div class="inner-wrap">
                    <div class="read-more-block">
                      <div class="img-cont">
                        <img src="{!! $ouritem['item_image'] !!}" alt="item image">
                      </div>
                      <h4>{!! $ouritem['title'] !!}</h4>
                      <p>{!! $ouritem['content'] !!}</p>
                    </div>
                  </div>
                </article>
                <div class="btn-cont">
                  <a class="read-more-btn">Read more</a>
                  @php $link = $ouritem['the_button']; @endphp
                  <a class="btn" target="{!! $link['target'] !!}" href="{!! $link['url'] !!}">{!! $link['title'] !!}</a>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endif

    </section>
  @endif
</div>
