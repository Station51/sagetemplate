<footer class="footer-info">
  <div class="container footer-info__inner">
    @if(get_field('logo', 'option')) 
      <div class="footer-info__logo">
        <a class="footer-info__logo--brand" href="{{ home_url('/') }}">
          {!! wp_get_attachment_image(get_field('logo', 'option', 'thumbnail')) !!}
        </a>
      </div>
    @endif
    <div class="footer-info__contact">
      @include('partials/contact')
    </div>
    <div class="footer-info__social">
      @include('partials/social')
    </div>
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
</footer>
<footer class="sub-footer grid"><div>&copy; @php echo date("Y"); @endphp Sage Starter Theme </div><div>@php dynamic_sidebar('sub-footer') @endphp</div><div> Developed by <a class="hop-link" href="https://www.hopsoftware.com/digital">Hop Digital</a></div></footer>

