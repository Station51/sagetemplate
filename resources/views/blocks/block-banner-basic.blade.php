{{--
  Title: Block Banner Basic
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} block-banner-basic" @if(get_field('background_image')) style="background-image: url({{ get_field('background_image') }})" @endif role="img">
    <article class="block-banner-basic__column">
        <div class="block-banner-basic__banner">
            <div class="banner-content">
                @if(get_field('the_content')) 
                <div class="text-block">
                    {!! get_field('the_content') !!}
                </div>
                @endif
            </div>
        </div>
    </article>
</section>