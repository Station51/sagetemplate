@extends('layouts.app')

@section('content')

@include('partials.blog-single-page-header')

<div class="container">
  <section class="section">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">

          @while(have_posts()) @php the_post() @endphp
            @include('partials.content-single-'.get_post_type())
          @endwhile

        </div>
      </div>

      <div class="col-lg-4">
        <div class="sidebar-cont">
            <h4>Sidebar goes here...</h4>

            @if (App\display_sidebar())

              <aside class="sidebar column">

              @include('partials.sidebar-blog')

              </aside>

            @else @php echo 'Missed'; @endphp

            @endif

        </div>
      </div>

    </div>
  </section>
</div>

@endsection
