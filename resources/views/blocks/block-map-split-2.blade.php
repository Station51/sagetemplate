{{--
  Title: Block-Map-Split-2
  Category: layout
  Icon: format-gallery
--}}

@php 
  $section_id = get_field('section_id');
  $image = get_field('header_image');
  $size = 'large'; // (thumbnail, medium, large, full or custom size)
  $attachment_title = get_the_title($attach_id); 
  $mapPosition = get_field('map_position');
@endphp
<section>
  {!! wp_get_attachment_image( $image, $size, $attachment_title ) !!}
</section>
<div class="container form-cont">
  <section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section-bottom">
    <article class="grid grid__outer {{ ($mapPosition) ? 'left' : 'right' }}">
  
        @if(get_field('google_map_iframe'))
          <div class="map-wrapper">
            <div class="intro">
              @if(get_field('form_title')) 
                <h3>{!! get_field('form_title') !!}</h3>
              @endif
              @if(get_field('form_intro')) 
                <p>{!! get_field('form_intro') !!}</p>
              @endif
            </div>
            <div class="info-cont">
              <h4>Contact info:</h4>
              @if(get_field('telephone', 'option')) 
                <div class="info-div">
                  <a divhref="tel:{{ get_field('telephone', 'option') }}">
                    {!! get_field('telephone', 'option') !!}
                  </a>
                </div>
              @endif
              @if(get_field('email', 'option')) 
                <div class="info-div">
                  <a href="mailto:{{ get_field('email', 'option') }}" target="_blank">
                    {!! get_field('email', 'option') !!}
                  </a>
                </div>
              @endif
              <div class="info-div">Showroom:</div>
            </div>
            <div class="iframe-cont">
              {!! get_field('google_map_iframe') !!}
            </div>
          </div>
        @endif
  
        @if(get_field('contact_form')) 
          <div class="form-wrapper">
            <div class="form-block" data-aos="flip-up">
              {!! get_field('contact_form') !!}
            </div>
          </div>
        @endif
  
    </article>
  </section>
</div>
