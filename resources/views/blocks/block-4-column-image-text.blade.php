{{--
  Title: Block-4-Column-Image-Text
  Category: common
  Icon: editor-paste-text
--}}

@php $section_id = get_field('section_id'); @endphp
@if(Blocks::getBlock3())
<section data-{{ $block['id'] }} id="{{ $block['id'] }} {{ $section_id }}" class="{{ $block['classes'] }}">
  <div class="grid wrapper">
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