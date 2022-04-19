@php
  $layout = get_field('nav_layout', 'option');
@endphp

@if($layout == 'Side')
  <header id="side-slide" class="nav">
    <div class="cover"></div>
    @include('partials.nav-side-slide')
  </header>
@else
  <header class="header banner parked">
    <div id="site-header" class="header__wrapper">
      @include('partials.nav-drop')
    </div>
  </header>
@endif
