@if (has_nav_menu('primary_navigation'))
<div class="container">
<div id="custom-nav">
  <div class="menu-container"> 
    <div class="navbar-brand">
      <a class="brand navbar-item" href="{{ home_url('/') }}"><img alt="{{ get_bloginfo('name', 'display') }}" src="" /></a>
      <button role="button"  aria-controls="nav-primary" aria-label="menu" class="menu-button hamburger--spin hamburgery">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>   
    <div id="site-header-menu" class="site-header-menu">
      <nav id="site-navigation" class="main-navigation parked" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'sage'); ?>">
        {!! wp_nav_menu($customprimarymenu) !!}
      </nav>
    </div>
  </div>
</div>
</div>
 @endif
