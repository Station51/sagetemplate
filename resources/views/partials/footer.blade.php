<footer class="content-info">
  <div class="container">
    @if(get_field('company_logo_image', 'option')) 
      <div class="content-info__logo">
        <a class="content-info__logo--brand" href="{{ home_url('/') }}">
          {{ get_field('company_logo_image', 'option') }}
        </a>
      </div>
    @endif
    {{-- @php dynamic_sidebar('sidebar-footers') @endphp --}}
    <div class="content-info__social">
       @include('partials/social')
    </div>
  </div>
</footer>

