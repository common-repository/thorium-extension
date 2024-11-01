<?php 
/**
 * Portfolio Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_team_template' ) ) {
 
 function thorium_ext_team_template(){
  if ( ( get_theme_mod('thorium_ext_team_show_section', 1 ) ) === 1 ) {
  ?>
  <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo get_theme_mod('thorium_ext_team_title', __( 'Our Amazing Team','thorium-ext' ) ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo get_theme_mod('thorium_ext_team_description', '' ); ?></h3>
                </div>
            </div>
            <div class="row">
                    <?php if ( is_active_sidebar( 'thorium-ext-section-team' ) ){
                
                			dynamic_sidebar( 'thorium-ext-section-team' );
                			
                	} ?>
            </div>
        </div>
    </section>
    <?php } 
    }
}
