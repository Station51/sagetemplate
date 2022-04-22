{{--
  Title: Block-wysiwyg
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container">
    <article class="block-wysiwyg__content">

      @if(get_field('content'))
        <div class="block-wysiwyg__content">
          {!! get_field('content') !!}
        </div>
      @endif

    </article>
  </div>
</section>

