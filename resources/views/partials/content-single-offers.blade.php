<div id="modal-ready">
  <div class="hide-modal">
    @php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ) @endphp

    <section class="block-banner-image" style="background-image: url({!! $backgroundImg[0] !!})" role="img">
      <div class="container flex">
        <div class="header-overlay"></div>
        <h1 class="heading heading--1">{!! App::title() !!}</h1>
      </div>
    </section>
  </div>

  @php $buttonLink = get_field('modal_button_link') @endphp

  <div class="container modal-container">
    <article @php post_class() @endphp>
      <div class="entry-content grid">
        <div class="rm-gallery">

          <div class="post-thumb">
            {!! the_post_thumbnail() !!}
          </div>

        </div>

        <div class="rm-info">
          <header>
            <h1 class="entry-title">{!! the_title() !!}</h1>
          </header>
          <h4>{!!get_field('offer_subtitle')!!}</h4>
          {!!get_field('offer_text')!!}

          @if($buttonLink)
            <div class="block-rooms-1__btns">
              <a href="{!! $buttonLink['url'] !!}" target="{{ $buttonLink['target'] }}" class="btn block-rooms-1__btn">{{ $buttonLink['title'] }}</a>
            </div>
          @endif
          
        </div>
      </div>
    </article>
  </div>
</div>