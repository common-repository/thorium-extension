<?php
class Thorium_Ext_Widget_About extends WP_Widget {

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        parent::__construct( 'thorium_ext_about', __( 'Thorium - About', 'thorium-ext' ), array( 'description' => __( 'Add this widget in "Front page - About Sidebar".', 'thorium-ext' ), ) );
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }
    
    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'underscore' );
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

        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'img' => array(
                'alt' => array(),
                'src' => array(),
                'srcset' => array(),
                'title' => array()
            ),
            'strong' => array(),
        );

		$title = ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $entry = ( !empty( $instance['entry'] ) ? wp_kses( $instance['entry'], $allowed_html ) : '' );
        $time = ( !empty( $instance['time'] ) ? esc_html( $instance['time'] ) : '' );
        
        $image_id = '';
        
        if ( $image != '' ){
        	$image_id = thorium_ext_get_image_id_from_image_url( $image );
        	$get_attachment_image_src = wp_get_attachment_image_src( $image_id );
        }

        $output = '';
        
        
            $output .= '<div class="timeline-image">';
            	$output .= ( $image_id ? '<img src="'. $get_attachment_image_src[0] .'" class="img-responsive img-circle" alt="'. $title .'">' : ( $image ? '<img src="'. get_template_directory_uri() . $image .'" alt="'. $title .'" />' : '' ) );
         	$output .= '</div>' ;
         	$output .= '<div class="timeline-panel">';
         		$output .= '<div class="timeline-heading">';
         			$output .= '<h4>'.$time.'</h4>';
         			$output .= '<h4 class="subheading">'. $title .'</h4>';
         		$output .= '</div>';
         		$output .= '<div class="timeline-body">';
         			$output .= '<p class="text-muted">'. $entry .'</p>';
         		$output .= '</div>';
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
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'img' => array(
                'alt' => array(),
                'src' => array(),
                'srcset' => array(),
                'title' => array()
            ),
            'strong' => array(),
        );
        $title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( 'Thorium - About', 'thorium-ext' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $entry = !empty( $instance['entry'] ) ? wp_kses( $instance['entry'], $allowed_html ) : '';
        $time = ( !empty( $instance['time'] ) ? esc_html( $instance['time'] ) : '' );

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'thorium-ext' ); ?><br><span>Resolution: 200 &times; 200</span></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','thorium-ext' ); ?>" style="margin-top: 5px;">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'time' ); ?>"><?php _e( 'Period:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'time' ); ?>" name="<?php echo $this->get_field_name( 'time' ); ?>" type="text" value="<?php echo esc_attr( $time ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'entry' ); ?>"><?php _e( 'Entry:', 'thorium-ext' ); ?></label>
            <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id( 'entry' ); ?>" name="<?php echo $this->get_field_name( 'entry' ); ?>"><?php echo esc_textarea( $entry ); ?></textarea>
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

        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'img' => array(
                'alt' => array(),
                'src' => array(),
                'srcset' => array(),
                'title' => array()
            ),
            'strong' => array(),
        );

        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['entry'] = ( !empty( $new_instance['entry'] ) ? wp_kses( $new_instance['entry'], $allowed_html ) : '' );
        $instance['time'] = ( !empty( $new_instance['time'] ) ) ? esc_html( $new_instance['time'] ) : '';

        return $instance;
    }

}

add_action( 'widgets_init', 'thorium_ext_register_widget_about' );

function thorium_ext_register_widget_about() {
    register_widget( 'Thorium_Ext_Widget_About' );
}