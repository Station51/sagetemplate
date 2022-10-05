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
      {!! do_shortcode(get_field('footer_contact_form', 'option')) !!}
    </div>
    {{-- @endif --}}
    <div class="last-col">
      <div class="footer-info__sidebar">@php dynamic_sidebar('sidebar-footer') @endphp
      </div>
      <div class="sign-up-form">
        <label>Subscribe to our newsletter</label>
        {!! do_shortcode(get_field('footer_newsletter', 'option')) !!}
      </div>
    </div>
  </div>
</footer>
<div class="copyright-footer grid"><div>&copy; @php echo date("Y"); @endphp Sage Starter Theme </div><div>@php dynamic_sidebar('sub-footer') @endphp</div><div> Developed by <a class="hop-link" href="https://www.hopsoftware.com/digital">Hop Digital</a></div></div>
@include('partials/modal-room')