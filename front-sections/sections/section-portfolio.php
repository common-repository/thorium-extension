<?php 
/**
 * Portfolio Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_portfolio_template' ) ) {
 
 function thorium_ext_portfolio_template(){
  if ( ( get_theme_mod('thorium_ext_portfolio_show_section', 1 ) ) === 1 ) {
  ?>
  <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo get_theme_mod('thorium_ext_portfolio_title', __( 'Portfolio','thorium-ext' ) ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo get_theme_mod('thorium_ext_portfolio_description', '' ); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php if ( is_active_sidebar( 'thorium-ext-section-portfolio' ) ){
                
                			dynamic_sidebar( 'thorium-ext-section-portfolio' );
                			
                } ?>
            </div>
        </div>
    </section>   
    <?php } 
    }
}
