<?php 
/**
 * Services Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_services_template' ) ) {
 
 function thorium_ext_services_template(){
  if ( ( get_theme_mod('thorium_ext_services_show_section', 1 ) ) === 1 ) {
  ?>
  
  <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo get_theme_mod('thorium_ext_services_title', __( 'Services','thorium-ext' ) ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo get_theme_mod('thorium_ext_services_description', '' ); ?></h3>
                </div>
            </div>
            <div class="row text-center">
                <?php if ( is_active_sidebar( 'thorium-ext-section-services' ) ){
                
                			dynamic_sidebar( 'thorium-ext-section-services' );
                			
                } ?>
            </div>
        </div>
    </section>
    <?php } 
    }
}