@php
  $layout = get_field('nav_layout', 'option');
@endphp

@if($layout == 'Side')
  <header class="nav"> 
    @include('partials.nav-side-slide')
  </header>
@else
  <header class="header banner parked">
    <div id="site-header" class="header__wrapper">
      @include('partials.nav-drop')
    </div>
  </header>
@endif


{{-- <header class="header banner parked">
  <div id="site-header" class="header__wrapper">
    @php
      $layout = get_field('nav_layout', 'option');
    @endphp

    @if($layout == 'Side')
      @include('partials.nav-side-slide')
    @else
      @include('partials.nav-drop')
    @endif

  </div>
</header> --}}