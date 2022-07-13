{{--
  Title: Block-Gallery-1
  Category: common
  Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
@if(Blocks::getGallery())
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }} section">
  <h2 class="section-header heading heading--2">@if(get_field('title')){!! get_field('title') !!}@endif</h2>
    <p class="gallery-copy">@if(get_field('content')){!! get_field('content') !!}@endif</p>
    <div class="gallery-imgs">
      @foreach(Blocks::getGallery() as $images )
        <div class="gallery-img">
          {!! wp_get_attachment_image($images, 'full') !!}
        </div>
      @endforeach
    </div>
</section>
@endif