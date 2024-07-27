<?php
/**
 * Block Name: Blog Posts
 *
 * This is the template that displays the Blog Posts block.
 */


 ?>

 <div class="post-widget">
       <!-- related posts -->
       <div class="related-posts">

              <div class="related-posts-slider">
                     <div class="post-slick slick-default-nav">
                     
                            <?php $selected_posts = get_field('blog_posts');
                            if ($selected_posts) { ?>
                                   
                                   <?php
                                   $counter = 0;
                                   foreach ($selected_posts as $post) {
                                          if ($counter < 20) {
                                                 setup_postdata($post);

                                                 $post_id = $post->ID;
                                                 $post_title = get_the_title($post_id); 
                                                 $post_permalink = get_permalink($post_id);
                                                 $post_thumbnail = get_the_post_thumbnail($post_id, 'full');
                                                 $post_excerpt = get_the_excerpt($post_id);
                                                 $categories = get_the_category($post_id);
                                                 $category_links = array();
                                                 
                                                 if (!empty($categories)) {
                                                     foreach ($categories as $category) {
                                                         $category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                                                     }
                                                 }
                                                 
                                                 $category_list = join(' ', $category_links);

                                                 $short_description = get_field('short_description', $post_id);
                                                 $buttonText = get_field('button_text', $post_id);
                                                 ?>
                                                        <div class="related-posts-item">
                                                               <div class="related-posts-item-inner">
                                                 
                                                                      <div class="related-posts-img">
                                                                             <a href="<?php echo $post_permalink; ?>">
                                                                             <?php
                                                                             if ($post_thumbnail) {
                                                                                    echo '<div class="post-thumbnail">' . $post_thumbnail . '</div>';
                                                                             } ?>
                                                                             </a>
                                                                      </div>

                                                                      <div class="related-post-text">
                                                                            <?php if (!empty($category_list)) { ?>
                                                                                    <div class="related-posts-cat">
                                                                                    <?php echo $category_list; ?>
                                                                                    </div>
                                                                             <?php } ?>

                                                                             <?php
                                                                                    $topics_terms = get_the_terms($post->ID, 'topics');
                                                                                    if (!empty($topics_terms) && !is_wp_error($topics_terms)) {
                                                                                           ?>
                                                                                           <div class="related-posts-cat">
                                                                                           <?php foreach ($topics_terms as $term) : ?>
                                                                                                  <a href="<?php echo get_term_link($term); ?>">
                                                                                                  <?php echo $term->name; ?>
                                                                                                  </a>
                                                                                           <?php endforeach; ?>
                                                                                           </div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                    <h3><a href="<?php echo $post_permalink; ?>"><?php echo $post_title; ?></a></h3>

                                                                                    <div class="related-posts-short-desc">
                                                                                           <?php echo $post_excerpt; ?>
                                                                                    </div>
                                                                             </div>

                                                              
                                                                      <div class="related-post-link btn">
                                                                             <a href="<?php echo $post_permalink; ?>">
                                                                                    <?php
                                                                                           if($buttonText) {
                                                                                                  echo $buttonText;
                                                                                           } else {
                                                                                                  esc_html_e( 'Read more', 'aquaAr' );
                                                                                           }
                                                                                    ?>
                                                                             </a>
                                                                      </div>

                          
                                                               </div>
                                                        </div>
                                                        
                                          
                                                 <?php $counter++;
                                          }
                                   }
                                   
                                   wp_reset_postdata(); ?>
                                   
                            <?php } ?>

                     
                     </div>
              </div>

        </div><!-- / related posts -->
                     
 </div>



