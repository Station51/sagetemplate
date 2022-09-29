{{--
  Title: Block-4-Column-Image-Text
  Category: common
  Icon: editor-paste-text
--}}

@php
  $section_id = get_field('section_id');
  $background_color = get_field('background_color');
@endphp
@if(Blocks::getBlock3())
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }}">
  <div class="grid wrapper" @if($background_color) style="background-color: {!! $background_color !!}" @endif>
  @foreach(Blocks::getBlock3() as $article)
  <article class='article'>
    <span class='article-icon'>
      {!! wp_get_attachment_image($article['icon'], 'icon') !!}
    </span>
    <h4 class='article-title'> {{ $article['title'] }}</h4>
    <p class='article-text'>{{ $article['content'] }}</p>
  </article>
  @endforeach
</div>
</section>
@endif