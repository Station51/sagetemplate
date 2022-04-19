@if (has_nav_menu('primary_navigation'))
  {{-- <nav class="nav-slide">
    <div class="logo-cont">
        <div class="nav-brand-logo"><a class="mob-home-btn" href="/"><img src="<php echo get_theme_mod('ptm_mobile_menu_logo');?>"></a></div>
    </div>
    <!-- <div class="nav-menu-head"><php echo get_theme_mod('ptm_mobile_menu_company_name');?></div> -->
    <div class="nav-cont">
        <php wp_nav_menu ( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu', ) ); ?> 
        <div class="nav-phone-cta">
            <a href="tel:+<php echo get_theme_mod('ptm_phone_number');?>"><i class="fa fa-phone"></i> <php echo get_theme_mod('ptm_phone_number');?></a>
        </div>
    </div>
  </nav> --}}

    <button class="hamburger hamburger--spin menu-btn" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>

    <nav class="nav-slide">
        <div class="logo-cont">
            <div class="nav-brand-logo">
              <a class="mob-home-btn" href="/">@if(get_field('logo', 'option')){!! wp_get_attachment_image(get_field('logo', 'option', 'icon')) !!} @endif</a>
            </div>
            <div class="nav-menu-head">@if(get_field('company_name', 'option')){!! get_field('company_name', 'option') !!} @endif</div>
        </div>
        <div class="nav-cont">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation']) !!}
            {{-- <php wp_nav_menu ( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu', ) ); ?>  --}}
            <div class="nav-phone-cta">
              <a href="tel:{{ get_field('telephone', 'option') }}"><i class="fa fa-solid fa-phone"></i> {!! get_field('telephone', 'option') !!}</a>
            </div>
        </div>
    </nav>

    <div class="brand-logo">
      <a class="nav-home-btn" href="/">@if(get_field('logo', 'option')){!! wp_get_attachment_image(get_field('logo', 'option', 'icon')) !!} @endif</a>
      <div class="company-name">@if(get_field('company_name', 'option')){!! get_field('company_name', 'option') !!} @endif</div>
    </div>

    <div class="header-cta-section">
        <div class="header-phone">
            @if(get_field('telephone', 'option')) 
              <a href="tel:{{ get_field('telephone', 'option') }}"><i class="fa fa-solid fa-phone"></i> {!! get_field('telephone', 'option') !!}</a>
            @endif
        </div>
        <div class="header-social">
            @if(get_field('logo', 'option'))
                <a href="{{ get_field('facebook_url', 'option') }}" target="_blank"><i class="fa-inverse fab fa-facebook-f social__icon"  data-fa-transform="shrink-2"></i></a>
            @endif
            @if(get_field('instagram_url', 'option'))
                <a href="{{ get_field('instagram_url', 'option') }}" target="_blank"><i class="fa-inverse fab fa-instagram social__icon" data-fa-transform="shrink-2"></i></a>
            @endif
            @if(get_field('twitter_url', 'option'))
                <a href="{{ get_field('twitter_url', 'option') }}" target="_blank"><i class="fa-inverse fab fa-twitter social__icon" data-fa-transform="shrink-2"></i></a>
            @endif       
        </div>
        <div class="header-btn-cont">
            <a class="btn book-btn" target="_blank" href="<php echo get_theme_mod('ptm_button_url');?>"><span class="book-btn-text">Book Now</span><i class="fa-solid fa fa-calendar social__icon"></i></a>
        </div>
    </div>

  {{-- <div class="container">
    <div id="custom-nav">
      <div class="menu-container"> 
        <div class="navbar-brand">
          <a class="brand navbar-item" href="{{ home_url('/') }}">
            @if(get_field('logo', 'option')){!! wp_get_attachment_image(get_field('logo', 'option', 'icon')) !!} @endif
          </a>
          <button role="button"  aria-controls="nav-primary" aria-label="menu" class="menu-button hamburger--spin hamburgery">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>   
        <div id="site-header-menu" class="site-header-menu">
          <nav id="site-navigation" class="main-navigation parked" role="navigation" aria-label="<php esc_attr_e('Primary Menu', 'sage'); ?>">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation']) !!}
          </nav>
        </div>
      </div>
    </div>
  </div> --}}
@endif
