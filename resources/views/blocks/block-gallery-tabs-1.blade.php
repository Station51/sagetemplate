{{--
  Title: Block-Gallery-Tabs-1
  Category: common
  Icon: awards
--}}

@php $section_id = get_field('section_id'); @endphp
<section data-{{ $block['id'] }} id="{{ $section_id ? $section_id : $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="container">
    <h2 class="section-header heading--2">@if(get_field('title')){!! get_field('title') !!}@endif</h2>
    <p class="gallery-copy">@if(get_field('content')){!! get_field('content') !!}@endif</p>
    <div class="tabset"> <!-- Tabs -->
      
      @php // Check rows exists.
        // Tabs headings
        if( have_rows('gallery_tab') ):
          $tabNavButton = 0; @endphp

          {{-- <div class="tab-button-wrap"> --}}
          
          @php // Loop through rows.
          while( have_rows('gallery_tab') ) : the_row();
          $tabNavButton++;

              $tabtitle = get_sub_field('tab_title'); 
              
              if($tabNavButton == 1) : @endphp

                <input type="radio" name="tabset" id="tab-@php echo $tabNavButton @endphp" aria-controls="tpanel-@php echo $tabNavButton @endphp" checked>
                <label for="tab-@php echo $tabNavButton @endphp">{!! $tabtitle !!}</label>
                
              @php else: @endphp

                <input type="radio" name="tabset" id="tab-@php echo $tabNavButton @endphp" aria-controls="tpanel-@php echo $tabNavButton @endphp">
                <label for="tab-@php echo $tabNavButton @endphp">{!! $tabtitle !!}</label>

              @php endif; 

          endwhile; // End loop. 
          @endphp

          {{-- </div> --}}

        @php else :
            // Do nothing...
        endif;
        
        // Tab Panels
        if( have_rows('gallery_tab') ):
          $tabPanel = 0; @endphp

          <div class="tab-panels">

            @php // Loop through rows.
              while( have_rows('gallery_tab') ) : the_row(); 
                $tabPanel++; @endphp

                <section id="tpanel-@php echo $tabPanel @endphp" class="tab-panel">

                  @if(Blocks::getGalleryTabs())

                      <div class="gallery-imgs">
                        @foreach(Blocks::getGalleryTabs() as $image )
                          <div class="gallery-img">
                            {!! wp_get_attachment_image($image, 'full') !!}
                          </div>
                        @endforeach
                      </div>

                  @endif
                  
                </section>

              @php endwhile; @endphp 
  
          </div>

        @php else :
            // Do nothing...
        endif; @endphp

    </div> <!-- end Tabs -->
  </div>
</section>