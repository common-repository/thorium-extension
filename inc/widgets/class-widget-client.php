<?php
class Thorium_Ext_Widget_Client extends WP_Widget {

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        parent::__construct( 'thorium_ext_client', __( 'Thorium - Client', 'thorium-ext' ), array( 'description' => __( 'Add this widget in "Front page - Client Sidebar".', 'thorium-ext' ), ) );
        
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


        $title = ( !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '' );
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $link = !empty( $instance['link'] ) ? esc_url( $instance['link'] ) : '';
        $image_id = '';
        
        if ( $image != '' ){
        	$image_id = thorium_ext_get_image_id_from_image_url( $image );
        	$get_attachment_image_src = wp_get_attachment_image_src( $image_id );
        }


        $output = '';

        $output .= '<a href="'.$link.'" title="'.$title.'">';
        	$output .= ( $image_id ? '<img src="'. $get_attachment_image_src[0] .'" class="img-responsive img-centered">' : ( $image ? '<img src="'. get_template_directory_uri() . $image .'" />' : '' ) );;
        $output .= '</a>';
         
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
    
    
    	$title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $link = !empty( $instance['link'] ) ? esc_url( $instance['link'] ) : '';

        ?>

         <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Client Name:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
         
         <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'thorium-ext' ); ?><br><span>Resolution: 200 &times; 50</span></label>
            <input type="text" class="widefat custom_media_url_<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php if( !empty( $instance['image'] ) ): echo $instance['image']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" data-fieldid="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php _e( 'Upload Image','thorium-ext' ); ?>" style="margin-top: 5px;">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Client Website:', 'thorium-ext' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="url" value="<?php echo esc_attr( $link ); ?>">
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
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['link'] = !empty( $new_instance['link'] ) ? esc_url( $new_instance['link'] ) : '';

        return $instance;
    }

}

add_action( 'widgets_init', 'thorium_ext_register_widget_client' );

function thorium_ext_register_widget_client() {
    register_widget( 'Thorium_Ext_Widget_Client' );
}