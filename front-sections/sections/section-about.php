<?php 
/**
 * About Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_about_template' ) ) {

 function thorium_ext_about_template(){
  if ( ( get_theme_mod('thorium_ext_about_show_section', 1 ) ) === 1 ) {
  ?>
  	<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo get_theme_mod('thorium_ext_about_title', __( 'About','thorium-ext' ) ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo get_theme_mod('thorium_ext_about_description', '' ); ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                	<ul class="timeline">
                		<?php if ( is_active_sidebar( 'thorium-ext-section-about' ) ){
                
                			dynamic_sidebar( 'thorium-ext-section-about' );
                			
                		} ?>
                	</ul>
                </div>
            </div>
        </div>
    </section>
    <?php } 
    }
    
}
