{{--
  Title: Block-Contact-Details-with-Forms
  Category: layout
  Icon: format-gallery
--}}

@php $section = get_field('header') @endphp
<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section container contact-us">
  <h1 class="heading heading--2">
    {!! $section['title'] !!}
  </h1>
  <p class="contact-us__paragraph intro">{!! $section['subtitle'] !!}</p>
  <article>
    <div class="container container__contact grid grid--3">
      <div class="contact-us-col">
        @if(get_field('company_name', 'option'))
        <p class="contact-us__label">Contact Details:</p>
        <span class="contact-us__p">{!! get_field('company_name', 'option') !!}</span>
        @endif
        <ul class='contact-us__inner'>
          @if(get_field('address', 'option'))
          <li class="contact-us__p address">{!! get_field('address', 'option') !!}</li>
          @endif
          @if(get_field('email', 'option'))
          <li class="contact-us__p mail">
            <a href="mailto:{{ get_field('email', 'option') }}" target="_blank">
                  E: {!! get_field('email', 'option') !!}
                </a>
          </li>
          @endif
          @if(get_field('telephone', 'option'))
          <li class="contact-us__p telephone">
            <a href="tel:{{ get_field('telephone', 'option') }}">
                  T: {!! get_field('telephone', 'option') !!}
                </a>
          </li>
          @endif
        </ul>
        {!! do_shortcode(get_field('newsletter_form')) !!}
      </div>
      <div class="contact-info__form">
        <p class="contact-us__label">Contact Us:</p>
        {!! do_shortcode(get_field('contact_form')) !!}
      </div>
      <div>
        @php
        while( have_rows('opening_times') ): the_row()
        @endphp
        <p class="contact-us__label contact-us__open">{!! the_sub_field('label') !!}</p>
        @php
        while( have_rows('items') ): the_row()
        @endphp
        <div class="contact-us__times grid grid--3">
          <p class="contact-us__times--col">{!! the_sub_field('title') !!}</p>
          <p class="contact-us__times--day">{!! the_sub_field('day') !!}</p>
          <p class="contact-us__times--clock">{!! the_sub_field('time') !!}</p>
        </div>
        @endwhile
        @endwhile
      </div>
    </div>
  </article>
</section>
<section class="google-map">
  {!! get_field('google_map') !!}
</section>
