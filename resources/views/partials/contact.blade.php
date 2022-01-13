<h5>Contact</h5>
<ul class='contact-info'>
  @if(get_field('address', 'option')) 
    <li>{!! get_field('address', 'option') !!}</li>
  @endif
  @if(get_field('telephone', 'option')) 
    <li>
      <a href="tel:{{ get_field('telephone', 'option') }}">
        {!! get_field('telephone', 'option') !!}
      </a>
    </li>
  @endif
  @if(get_field('email', 'option')) 
    <li>
      <a href="mailto:{{ get_field('email', 'option') }}" target="_blank">
        {!! get_field('email', 'option') !!}
      </a>
    </li>
  @endif
</ul>