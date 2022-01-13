<div class="social">
  @if(get_field('facebook_url', 'option'))
    <a class="social__link" href="{{ get_field('facebook_url', 'option') }}" target="_blank" aria-label="Visit our Facebook Page" rel="noopener">
      <span class="fa-fw fa-2x">
        <i class="fa-inverse fab fa-facebook-f social__icon"  data-fa-transform="shrink-2"></i>
      </span>
      <span class="social__icon">Facebook</span>
    </a>
  @endif
  @if(get_field('instagram_url', 'option'))
    <a class="social__link" href="{{ get_field('instagram_url', 'option') }}" target="_blank" aria-label="Visit our Instagram Page" rel="noopener">
      <span class="fa-fw fa-2x">
        <i class="fa-inverse fab fa-instagram social__icon" data-fa-transform="shrink-2"></i>
      </span>
      <span class="social__icon">Instagram</span>
    </a>
  @endif
  @if(get_field('twitter_url', 'option'))
    <a class="social__link" href="{{ get_field('twitter_url', 'option') }}" target="_blank" aria-label="Visit our Twitter Page" rel="noopener">
      <span class="fa-fw fa-2x">
        <i class="fa-inverse fab fa-twitter social__icon" data-fa-transform="shrink-2"></i>
      </span>
      <span class="social__icon">Twitter</span>
    </a>
  @endif
</div>
