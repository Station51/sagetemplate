<footer class="footer-info">
  {{-- <div class="container footer-info__inner"> --}}
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
      @php dynamic_sidebar('sidebar-footer') @endphp
      <div></div>
    </div>
  </div>
</footer>
<footer class="sub-footer grid"><div>&copy; @php echo date("Y"); @endphp Sage Starter Theme </div><div>@php dynamic_sidebar('sub-footer') @endphp</div><div> Developed by <a class="hop-link" href="https://www.hopsoftware.com/digital">Hop Digital</a></div></footer>

