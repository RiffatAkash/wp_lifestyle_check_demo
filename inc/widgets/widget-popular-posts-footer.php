<?php

/**
 * Sparkling Top Posts Widget
 * Sparkling Theme
 */
class sparkling_popular_posts_for_footer extends WP_Widget {

    function __construct() {

        $widget_ops = array('classname' => 'sparkling-popular-posts_for_footer', 'description' => esc_html__("Sparkling Popular Posts Widget For Footer", 'sparkling'));
        parent::__construct('sparkling_popular_posts_for_footer', esc_html__('Sparkling Popular Posts Widget For Footer', 'sparkling'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Popular Posts', 'sparkling');
        $limit = isset($instance['limit']) ? $instance['limit'] : 5;

        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;

        /**
         * Widget Content
         */
        ?>

        <!-- popular posts -->
        <div class="popular-posts-wrapper">

            <?php
            $popularpost = new WP_Query(array('posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));


            $featured_args = array(
                'posts_per_page' => $limit,
                'orderby' => getPostViews(get_the_ID()),
                'order' => 'DESC',
                'ignore_sticky_posts' => 1
            );
            //  print_r($featured_args);

            $featured_query = new WP_Query(array('posts_per_page' => $limit, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));



//            $featured_query = new WP_Query($featured_args);

            /**
             * Check if zilla likes plugin exists
             */
            if ($featured_query->have_posts()) : while ($featured_query->have_posts()) : $featured_query->the_post();
                    ?>

                    <?php if (get_the_content() != '') : ?>

                        <!-- post -->
                        <div class="post">

                            <!-- image -->
                            <div class="post-image <?php echo get_post_format(); ?>">

                                <a href="<?php echo get_permalink(); ?>"><?php
                                    if (get_post_format() != 'quote') {
                                        echo get_the_post_thumbnail(get_the_ID(), 'tab-small');
                                    }
                                    ?></a>

                            </div> <!-- end post image -->

                            <!-- content -->
                            <div class="post-content">

                                <a href="<?php echo get_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 15); ?></a>
                                <span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('d F , Y'); ?></span>
                                <span class="popular-tags"><?php echo the_tags('', '  '); ?></span>




                            </div><!-- end content -->

                        </div><!-- end post -->


                    <?php endif; ?>

                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>

        </div> <!-- end posts wrapper -->

        <?php
        echo $after_widget;
    }

    function form($instance) {

        if (!isset($instance['title']))
            $instance['title'] = esc_html__('Popular Posts', 'sparkling');
        if (!isset($instance['limit']))
            $instance['limit'] = 5;
        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
                    name="<?php echo $this->get_field_name('title'); ?>"
                    id="<?php $this->get_field_id('title'); ?>"
                    class="widefat" />
        </p>

        <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Limit Posts Number', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
                    name="<?php echo $this->get_field_name('limit'); ?>"
                    id="<?php $this->get_field_id('limit'); ?>"
                    class="widefat" />
        <p>

            <?php
        }

    }
    ?>