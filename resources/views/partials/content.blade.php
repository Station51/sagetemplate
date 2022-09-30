@php
  $layout = get_field('blog_layout', 'option');
@endphp

@if($layout == 'Tiles')

  <article @php post_class('tile') @endphp>
    <header>
      @if(has_post_thumbnail())
      <div class="single-post__img" style="background-image: url({!! the_post_thumbnail_url('blog-small') !!});"></div>
      @endif
    </header>
    <div class="inner-wrap">
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      {{-- @include('partials/entry-meta') --}}
      <div class="entry-summary">
        @php the_excerpt() @endphp
      </div>
      <div class="blog-post-btn-cont">
        <a class="button btn--blog btn" href="{{ get_permalink() }}">Continue Reading</a>
      </div>
    </div>
  </article>

@else

  <article @php post_class() @endphp>
    <header>
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      @if(has_post_thumbnail())
        <img class="single-post__img" src="{!! the_post_thumbnail_url('blog-small') !!}" alt="{!! the_title() !!}">
      @endif
      {{-- @include('partials/entry-meta') --}}
    </header>
    <div class="entry-summary">
      @php the_excerpt() @endphp
      <a class="button btn--blog btn" href="{{ get_permalink() }}">Continue Reading</a>
    </div>
  </article>

@endif
