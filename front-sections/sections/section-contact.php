<?php 
/**
 * Portfolio Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_contact_template' ) ) {
 
 function thorium_ext_contact_template(){
  if ( ( get_theme_mod('thorium_ext_contact_show_section', 1 ) ) === 1 ) {
  ?>
  <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo get_theme_mod('thorium_ext_contact_title', __( 'Contact Us','thorium-ext' ) ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo get_theme_mod('thorium_ext_contact_description', '' ); ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if ( class_exists( 'WPCF7' ) && get_theme_mod( 'thorium_ext_contact_form' ) != null && get_theme_mod( 'thorium_ext_contact_form' ) != 'default' ): ?>
						<?php $shortcode = '[contact-form-7 id="' . esc_html( get_theme_mod( 'thorium_ext_contact_form' ) ) . '"]'; ?>
						<?php echo do_shortcode( $shortcode ); ?>
					<?php endif; ?>
               </div>
            </div>
        </div>
    </section>
    <?php } 
    }
}
