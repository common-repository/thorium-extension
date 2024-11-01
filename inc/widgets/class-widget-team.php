<?php
class Thorium_Ext_Widget_Team extends WP_Widget {

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        parent::__construct( 'thorium_ext_team', __( 'Thorium - Team', 'thorium-ext' ), array( 'description' => __( 'Add this widget in "Front page - Team Sidebar".', 'thorium-ext' ), ) );
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

    }
    
    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'thorium-ext-widget-upload-image', THORIUM_EXTS_URL . '/js/widget-upload-image.js', false, THORIUM_VERSION, true);
    }

    /**
    * Front-end display of widget.
    *
    * @see WP_Widget::widget()
    *
    * @param array $args     Widget arguments.
    * @param array $instance Saved values from database.
    */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        $name = ( !empty( $instance['name'] ) ? esc_html( $instance['name'] ) : '' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $position = ( !empty( $instance['position'] ) ? esc_html( $instance['position'] ) : '' );
        $fb = !empty( $instance['fb'] ) ? esc_url( $instance['fb'] ) : '';
        $twit = !empty( $instance['twit'] ) ? esc_url( $instance['twit'] ) : '';
        $linkedin = !empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';

        $image_id = '';
        
        if ( $image != '' ){
        	$image_id = thorium_ext_get_image_id_from_image_url( $image );
        	$get_attachment_image_src = wp_get_attachment_image_src( $image_id );
        }

        $output = '';

        $output .= '<div class="team-member">';
            $output .= ( $image_id ? '<img src="'. $get_attachment_image_src[0] .'" class="img-responsive img-circle" alt="'. $title .'">' : ( $image ? '<img src="'. get_template_directory_uri() . $image .'" alt="'. $title .'" />' : '' ) );
            $output .= '<h4>'. $name .'</h4>';
         	$output .= '<p class="text-muted">'. $position .'</p>';
         	$output .= '<ul class="list-inline social-buttons">';
         	if ( !empty( $twit ) ) {
         		$output .= '<li><a href="'.$twit.'"><i class="fa fa-twitter"></i></a></li>';
         	}
         	if ( !empty( $fb ) ) {
         		$output .= '<li><a href="'.$fb.'"><i class="fa fa-facebook"></i></a></li>';
         	}
         	if ( !empty( $linkedin ) ) {
         		$output .= '<li><a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
         	}
         	$output .= '</ul>';
         $output .= '</div>';
         
        echo $output;

        echo $args['after_widget'];
    }
    
    /**
    * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {
        
        $name = ! empty( $instance['name'] ) ? sanitize_text_field( $instance['name'] ) : '';
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $position = ( !empty( $instance['position'] ) ? esc_html( $instance['position'] ) : '' );
        $fb = !empty( $instance['fb'] ) ? esc_url( $instance['fb'] ) : '';
        $twit = !empty( $instance['twit'] ) ? esc_url( $instance['twit'] ) : '';
        $linkedin = !empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'thorium-ext' ); ?><br><span>Resolution: 225 &times; 225</span></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','thorium-ext' ); ?>" style="margin-top: 5px;">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'fb' ); ?>"><?php _e( 'Facebook Profile:', 'thorium-ext' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'fb' ); ?>" name="<?php echo $this->get_field_name( 'fb' ); ?>" value="<?php echo esc_attr( $fb ); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twit' ); ?>"><?php _e( 'Twitter Profile:', 'thorium-ext' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twit' ); ?>" name="<?php echo $this->get_field_name( 'twit' ); ?>" value="<?php echo esc_attr( $twit ); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn Profile:', 'thorium-ext' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $linkedin ); ?>">
        </p>

    <?php 
    }

    /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['name'] = ( !empty( $new_instance['name'] ) ) ? esc_html( $new_instance['name'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['position'] = ( !empty( $new_instance['position'] ) ) ? esc_html( $new_instance['position'] ) : '';
        $instance['fb'] = ( !empty( $new_instance['fb'] ) ) ? esc_url( $new_instance['fb'] ) : '';
        $instance['twit'] = ( !empty( $new_instance['twit'] ) ) ? esc_url( $new_instance['twit'] ) : '';
        $instance['linkedin'] = ( !empty( $new_instance['linkedin'] ) ) ? esc_url( $new_instance['linkedin'] ) : '';

        return $instance;
    }

}

add_action( 'widgets_init', 'thorium_ext_register_widget_team' );

function thorium_ext_register_widget_team() {
    register_widget( 'Thorium_Ext_Widget_Team' );
}