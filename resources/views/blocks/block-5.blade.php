{{--
  Title: Block-5
  Category: common
  Icon: awards
--}}
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} connect">
    <img class="video-container" src="@asset('images/banners/bedroom.jpg')" alt="">
    {{-- <video autoplay muted loop class="video-container"
      poster="@asset('images/banners/bedroom.jpg')">
      <source src="@asset('images/video/restaurant.mp4')" type="video/mp4" />
      Sorry, you browser does not support embedded videos
    </video> --}}
    <div class="video-banner">
      <div class="section-title video-title">
        <h2 class="heading heading--2">let's get in touch</h2>
        <div class="underline"></div>
      </div>
      <p class="video-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, nisi omnis maiores hic nemo
        minus porro odit culpa quis sapiente impedit quam non cum ex consectetur. Dolorum quaerat corrupti, magnam
        tempore esse nobis cum! Quibusdam in fugiat laborum iusto qui?</p>
      <a href="/" class="btn">contact us</a>
    </div>
</section>