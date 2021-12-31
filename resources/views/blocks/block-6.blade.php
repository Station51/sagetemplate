{{--
  Title: Block-6
  Category: common
  Icon: awards
--}}

<section data-{{ $block['id'] }} id="{{ $block['id'] }}" class="{{ $block['classes'] }} section">
  <div class="block-5__title">
    <h2 class="heading heading--2">our menu</h2>
    <div class="block-5__title--underline"></div>
  </div>

  <div class="container container_filter">

    <div class="filters filter-button-group">
          <ul><h4>
            <li class="active" data-filter="*">All</li>

            <?php
              $terms = get_terms('porfiolio_category');
              foreach ($terms as  $term) { ?>
                <li data-filter=".<?php  echo $term->slug; ?>"><?php echo $term->name; ?></li>
          <?php  }

            ?>
            <!-- <li data-filter=".webdesign">Logo</li>
            <li data-filter=".webdev">videos</li>
            <li data-filter=".brand">Websites</li> -->
          </h4></ul>
        </div>

        <div class="content grid">
          <?php
          $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 8
          );

          $query = new WP_Query($args);

          while ($query->have_posts()) {
            $query->the_post();
         

            foreach (get_the_terms(get_the_ID(), 'porfiolio_category') as $cat) {
              $termsSLug =  $cat->name;
              }

            ?>

                <div class="single-content <?php echo  $termsSLug; ?>  grid-item">
                  <img class="p2" src="<?php the_post_thumbnail_url(); ?>">
                </div>

          <?php  }
    wp_reset_postdata();

            ?>




      </div>
</div>

</section>
