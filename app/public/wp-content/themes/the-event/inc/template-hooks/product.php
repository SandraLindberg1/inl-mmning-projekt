<?php
/**
 * Product hook
 *
 * @package the_event
 */

if ( ! function_exists( 'the_event_add_product_section' ) ) :
    /**
    * Add product section
    *
    *@since The Event 1.0.0
    */
    function the_event_add_product_section() {

        // Check if product is enabled on frontpage
        $product_enable = apply_filters( 'the_event_section_status', 'enable_product', '' );

        if ( ! $product_enable )
            return false;

        if ( ! class_exists( 'WooCommerce' ) )
            return;

        // Get product section details
        $section_details = array();
        $section_details = apply_filters( 'the_event_filter_product_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render product section now.
        the_event_render_product_section( $section_details );
    }
endif;

if ( ! function_exists( 'the_event_get_product_section_details' ) ) :
    /**
    * product section details.
    *
    * @since The Event 1.0.0
    * @param array $input product section details.
    */
    function the_event_get_product_section_details( $input ) {

        $args = array();
        $post_ids = array();

        for ( $i = 1; $i <= 4; $i++ )  :
            $post_id = the_event_theme_option( 'product_content_product_' . $i );

            if ( ! empty( $post_id ) ) :
                $post_ids[] = $post_id;
            endif;
        endfor;
        
        $args = array(
            'post_type'         => 'product',
            'post__in'          =>  ( array ) $post_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    
            
        if ( ! empty( $args ) )
            $input = $args;
       
        return $input;
    }
endif;
// product section content details.
add_filter( 'the_event_filter_product_section_details', 'the_event_get_product_section_details' );


if ( ! function_exists( 'the_event_render_product_section' ) ) :
  /**
   * Start product section
   *
   * @return string product content
   * @since The Event 1.0.0
   *
   */
   function the_event_render_product_section( $args = array() ) {
        if ( empty( $args ) )
            return;

        $query = new WP_Query( $args );
        $title = the_event_theme_option( 'product_title', '' );
        $sub_title = the_event_theme_option( 'product_sub_title', '' );
        add_action( 'the_event_woocommerce_sale', 'woocommerce_show_product_loop_sale_flash', 10 );
        add_action( 'the_event_woocommerce_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );

        if ( $query->have_posts() ) : ?>
            <div id="front-products" class="page-section relative woocommerce">
                <div class="wrapper">
                    <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                        <div class="section-header align-center">
                            <?php if ( ! empty( $sub_title ) ) : ?>
                                <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                            <?php endif;

                            if ( ! empty( $title ) ) : ?>
                                <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                            <?php endif; ?>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="section-content column-4">
                        <?php while ( $query->have_posts() ) : $query->the_post();  ?>
                                <article class="hentry">
                                    <div class="post-wrapper">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="featured-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php 
                                                        the_post_thumbnail( 'the-event-medium', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); 

                                                        /**
                                                         * Hook: the_event_woocommerce_sale.
                                                         *
                                                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                                                         */
                                                        do_action( 'the_event_woocommerce_sale' );
                                                    ?>
                                                </a>
                                            </div><!-- .recent-image -->
                                        <?php endif; ?>

                                        <div class="entry-container">

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            </header>

                                            <div class="entry-content">
                                                <?php  
                                                    /**
                                                     * Hook: woocommerce_after_shop_loop_item_title.
                                                     *
                                                     * @hooked woocommerce_template_loop_rating - 5
                                                     * @hooked woocommerce_template_loop_price - 10
                                                     */
                                                    do_action( 'woocommerce_after_shop_loop_item_title' );
                                                ?>
                                            </div><!-- .entry-content -->
                                            
                                            <div class="entry-meta">
                                                <?php  
                                                    /**
                                                     * Hook: the_event_woocommerce_add_to_cart.
                                                     *
                                                     * @hooked woocommerce_template_loop_add_to_cart - 10
                                                     */
                                                    do_action( 'the_event_woocommerce_add_to_cart' );

                                                ?>
                                            </div>

                                        </div><!-- .entry-container -->
                                    </div><!-- .post-wrapper -->
                                </article>
                            <?php endwhile; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #popular-posts -->

        <?php endif; 
        wp_reset_postdata();
    }
endif;