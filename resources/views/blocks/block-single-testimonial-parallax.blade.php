{{--
Title: Block-Single-Testimonial-Parallax
Category: common
Icon: awards
--}}
@php $testimonial = get_field('testimonial_banner') @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }}"
  class="{{ $block['classes'] }} @if($testimonial['background_attachment']) attachment-fixed @endif"
  @if($testimonial['background_image'])
  style="background-image: url({{ $testimonial['background_image'] }}); height: {{ $testimonial['image_height'] }}px;"
  @endif role="img">
  <div class="header-overlay" style="background-color:{{ $testimonial['overlay_color'] }}"></div>
  <div class="container flex">
    @if($testimonial['testimonial_text'])
    <div class="quote"><img src="@asset('images/icons/quote2.png')" /></div>
    <h2 class="heading heading--1">
      {!! $testimonial['testimonial_text'] !!}
    </h2>
    <div class="quote"><img src="@asset('images/icons/quote1.png')" /></div>
    @endif
  </div>
</section>