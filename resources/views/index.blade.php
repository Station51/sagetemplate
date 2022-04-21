@php
  $layout = get_field('blog_layout', 'option');
@endphp

@extends( ($layout == 'Tiles') ? 'layouts.blog-tiles' : 'layouts.app')

@section('content')
@include('partials.blog-index-page-header')

<div class="blog--main blog--container">
  @if (!have_posts())
  <div class="alert alert-warning">
    {{ __('Sorry, no results were found.', 'sage') }}
  </div>
  {!! get_search_form(false) !!}
  @endif

  @if($layout == 'Tiles')
    <div class="tiles-layout grid">
      @while (have_posts()) @php the_post() @endphp
      @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  @else
    @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
    @endwhile
  @endif

  {!! get_the_posts_navigation() !!}

</div>
@endsection