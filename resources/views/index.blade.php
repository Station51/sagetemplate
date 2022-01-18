@extends('layouts.app')

@section('content')
  @include('partials.blog-index-page-header')

  <div class="container">
    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">

            @if (!have_posts())
              <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
              </div>
              {!! get_search_form(false) !!}
            @endif

            @while (have_posts()) @php the_post() @endphp
              
              <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body justify-content-center align-items-center">
        
                      @if( $blog_single_featured_image )
                        <img src="{!! $blog_single_featured_image !!}" alt="">
                      @endif
        
                        <div class="blog-thumb-content">
                            <h3>@php the_title(); @endphp</h3>
                            @php the_excerpt(); @endphp
        
                            <a href="@php the_permalink(); @endphp" class="btn btn-clean">Read more</a>
                        </div>
                    </div>
                </div>
              </div>

              {{-- @include('partials.content-'.get_post_type()) --}}
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

        {!! get_the_posts_navigation() !!}

      </div>
    </section>
  </div>
@endsection
