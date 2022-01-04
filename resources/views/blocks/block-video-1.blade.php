{{--
  Title: Block-Video-1
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }}">
  <div class="hero">
    <h1 class="heading heading--1">Some text</h1>
    <p>Aliquam vestibulum et ligula a egestas. Sed id enim ligula. Phasellus elementum euismod lacus</p>
    <video class="hero__bg" autoplay muted loop >
      <source src="@asset('images/video/restaurant.mp4')" type="video/mp4">
        Sorry, you browser does not support embedded videos
    </video>
  </div>
</section>