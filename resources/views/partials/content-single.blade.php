<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @php the_content() @endphp
    <a class="button btn--blog btn" href="/blog">Our blog</a>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
