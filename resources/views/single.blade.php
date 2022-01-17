@extends('layouts.app')

@section('content')

@include('partials.blog-single-page-header')

<div class="container">
  <section class="section">

    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
    @endwhile

  </section>
</div>

@endsection
