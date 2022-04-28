{{-- <footer class="footer-info">
  <div class="container">
    <div class="grid">
      <div class="logo-contact">
        <div class="footer-info__logo">
          @if(get_field('logo', 'option')) 
            <a class="footer-info__logo--brand" href="{{ home_url('/') }}">
              {!! wp_get_attachment_image(get_field('logo', 'option', 'thumbnail')) !!}
            </a>
          @endif
        </div>
        <div class="footer-info__info">{{ get_field('text_footer', 'option') }}</div>
        <div class="footer-info__contact">
          @include('partials/contact')
        </div>
        <div class="footer-info__social">
          @include('partials/social')
        </div>
      </div>
      <div class="footer-info__instagram footer-info--row">
        <h3 class="heading-instagram">Instagram</h3>
        {!! do_shortcode(get_field('instagram_shortcode', 'option')) !!}
      </div>

      <div class="last-col">
        <div class="footer-info__sidebar">@php dynamic_sidebar('sidebar-footer') @endphp
        </div>
        <div class="sign-up-form">
          <label>Subscribe to our newsletter</label>
          {!! do_shortcode(get_field('sign_up_form_footer', 'option')) !!}
        </div>
      </div>

    </div>
  </div>
  <div class="sub-footer grid"><div>&copy; @php echo date("Y"); @endphp Sage Starter Theme </div><div>@php dynamic_sidebar('sub-footer') @endphp</div><div> Developed by <a class="hop-link" href="https://www.hopsoftware.com/digital">Hop Digital</a></div></div>
</footer>

 --}}


<footer class="footer-info section">
  <div class="container footer-info__inner">
    <div class="footer-info__logo logo-brand f-col footer-info--row">
      <a class="footer-info__logo--brand" href="{{ home_url('/') }}">
        @if(get_field('logo', 'option'))
          {!! wp_get_attachment_image(get_field('logo', 'option'), 'logo') !!}
          @else
          <img src="@asset('images/svg/logo-beige.svg')" />
          @endif
        </a>
      <p class="footer-info--brand__text">{{ get_field('text_footer', 'option') }}
      </p>
      <p class="footer-info--brand__address"> <span class="fa-fw fa-1x">
        <i class="fa-inverse fa fa-map-marker social__icon" data-fa-transform="shrink-2" aria-hidden="true"></i>
      </span>Boat of Garten, near Aviemore, PH24 3BH</p>
      <p class="footer-info--brand__address">
        <a class="footer-info--brand__address--link" href="tel:{{ get_field('telephone', 'option') }}">
          <i class="fa-inverse fa fa-phone social__icon" data-fa-transform="shrink-2" aria-hidden="true"></i>
          {!! get_field('telephone', 'option') !!}
         </a>
      </p>
      <p class="footer-info--brand__address">
        <a class="footer-info--brand__address--link" href="mailto:{{ get_field('email', 'option') }}" target="_blank">
          <i class="fa-inverse fa fa-envelope social__icon" data-fa-transform="shrink-2" aria-hidden="true"></i>
           {!! get_field('email', 'option') !!}
        </a>
      </p>
    </div>
    <div class="footer-info__instagram footer-info--row">
      <h3 class="heading-instagram">Instagram</h3>
      {!! do_shortcode(get_field('instagram_shortcode', 'option')) !!}
    </div>
    {{-- @if(do_shortcode(get_field('newsletter_form', 'option'))) --}}
    <div class="footer-info__contact footer-info--row contact-form-widget">
      <h3 class="footer-info__contact-title contact-widget">Contact Us</h3>
      {!! do_shortcode('[contact-form-7 id="397" title="Footer contact form"]') !!}
    </div>
    {{-- @endif --}}
    <div class="last-col">
      <div class="footer-info__sidebar">@php dynamic_sidebar('sidebar-footer') @endphp
      </div>
      <div class="sign-up-form">
        <label>Subscribe to our newsletter</label>
        {!! do_shortcode('[contact-form-7 id="398" title="Footer newsletter"]') !!}
      </div>
    </div>
  </div>
  {{-- @if(wp_get_attachment_image(get_field('logo_1', 'option'), 'logo'))
  <div class="footer-info__logo--partners logo_1 f-col">
    {!! wp_get_attachment_image(get_field('logo_1', 'option'), 'logo') !!}
  </div>
  @endif
  @if(wp_get_attachment_image(get_field('logo_2', 'option'), 'logo'))
  <div class="footer-info__logo--partners logo_2 f-col">
    {!! wp_get_attachment_image(get_field('logo_2', 'option'), 'logo') !!}
  </div>
  @endif
  @if(wp_get_attachment_image(get_field('logo_3', 'option'), 'logo'))
  <div class="footer-info__logo--partners logo_3 f-col">
    {!! wp_get_attachment_image(get_field('logo_3', 'option'), 'logo') !!}
  </div>
  @endif
  </div> --}}
</footer>
<div class="copyright-footer grid"><div>&copy; @php echo date("Y"); @endphp Sage Starter Theme </div><div>@php dynamic_sidebar('sub-footer') @endphp</div><div> Developed by <a class="hop-link" href="https://www.hopsoftware.com/digital">Hop Digital</a></div></div>