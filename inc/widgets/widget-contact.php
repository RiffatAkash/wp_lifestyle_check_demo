<?php

/**
 * Sparkling Top Posts Widget
 * Sparkling Theme
 */
class sparkling_contact_form extends WP_Widget {

    function __construct() {

        $widget_ops = array('classname' => 'sparkling-contact', 'description' => esc_html__("Sparkling Contact Posts Widget", 'sparkling'));
        parent::__construct('sparkling_contact_posts', esc_html__('Sparkling Contact Posts Widget', 'sparkling'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Contact Posts', 'sparkling');
        $description = isset($instance['description']) ? $instance['description'] : esc_html__('Contact Posts', 'sparkling');
        $address = isset($instance['address']) ? $instance['address'] : esc_html__('', 'sparkling');
        $email = isset($instance['email']) ? $instance['email'] : esc_html__('', 'sparkling');
        $phone = isset($instance['phone']) ? $instance['phone'] : esc_html__('', 'sparkling');
        

        echo $before_widget;
        
        echo '<h3 class="contact_header">'.$title.'</h3>';
        
        /**
         * Widget Content
         */
        ?>

        <!-- popular posts -->
        <div class="popular-posts-wrapper">

            

                    <?php if (get_the_content() != '') : ?>

                        <!-- post -->
                        <div class="post">

                            <!-- image -->
                            

                            <p class="contact_address"><?php echo $description;?></p>
                            <h2 style="color: #363739"><?php echo "Address";?></h2>
                            <br>
                            <h4 style="color: #405765;"class="contact_address"><span class="span_address"><i class="fa fa-map-marker" aria-hidden="true"></i></span>  <?php echo $address?></h4>
                            <h4 style="color: #405765"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email?></h4>
                            <h4 style="color: #405765"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $phone?></h4>

                        </div><!-- end post -->


                    <?php endif; ?>

                    <?php
               
           
            wp_reset_query();
            ?>

        </div> <!-- end posts wrapper -->

        <?php
        echo $after_widget;
    }

    function form($instance) {

        if (!isset($instance['title']))
            $instance['title'] = esc_html__('Contact', 'sparkling');
        

        $description = $instance['description'];
        $address = $instance['address'];
        $email = $instance['email'];
        $phone = $instance['phone'];
        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
                    name="<?php echo $this->get_field_name('title'); ?>"
                    id="<?php $this->get_field_id('title'); ?>"
                    class="widefat" />
        </p>
        <p><label for="<?php echo $this->get_field_id('description'); ?>"><?php esc_html_e('Description', 'sparkling') ?></label>

            <textarea maxlength="100"
                name="<?php echo $this->get_field_name('description'); ?>"
                id="<?php $this->get_field_id('description'); ?>"
                class="widefat" ><?php echo esc_attr($instance['description']); ?></textarea>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('address'); ?>"><?php esc_html_e('Address', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['address']); ?>"
                    name="<?php echo $this->get_field_name('address'); ?>"
                    id="<?php $this->get_field_id('address'); ?>"
                    class="widefat" />
        </p>
        
        <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php esc_html_e('Email', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['email']); ?>"
                    name="<?php echo $this->get_field_name('email'); ?>"
                    id="<?php $this->get_field_id('email'); ?>"
                    class="widefat" />
        </p>
        
        <p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php esc_html_e('Phone', 'sparkling') ?></label>

            <input  type="text" value="<?php echo esc_attr($instance['phone']); ?>"
                    name="<?php echo $this->get_field_name('phone'); ?>"
                    id="<?php $this->get_field_id('phone'); ?>"
                    class="widefat" />
        </p>


        <?php
    }

}
?>