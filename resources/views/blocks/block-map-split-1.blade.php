{{--
  Title: Block-Map-Split-1
  Category: layout
  Icon: format-gallery
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }}">
  <article class="grid grid__outer">

    @if(get_field('map_position') == 'left') 

      @if(get_field('google_map_iframe'))
        <div class="iframe-cont">
          {!! get_field('google_map_iframe') !!}
        </div>
      @endif

      @if(get_field('contact_form')) 
        <div class="form-block" data-aos="flip-left">
          @if(get_field('form_title')) 
            <h3>{!! get_field('form_title') !!}</h3>
          @endif
          {!! get_field('contact_form') !!}
        </div>
      @endif
          
    @else

      @if(get_field('contact_form')) 
        <div class="form-block" data-aos="flip-right">
          @if(get_field('form_title')) 
            <h3>{!! get_field('form_title') !!}</h3>
          @endif
          {!! get_field('contact_form') !!}
        </div>
      @endif

      @if(get_field('google_map_iframe'))
        <div class="iframe-cont">
          {!! get_field('google_map_iframe') !!}
        </div>
      @endif

    @endif

  </article>
</section>
