<?php 
/**
 * Portfolio Section
 * ----------------
 */
if ( ! function_exists( 'thorium_ext_client_template' ) ) {

 function thorium_ext_client_template(){
  if ( ( get_theme_mod('thorium_ext_client_show_section', 1 ) ) === 1 ) {
  ?>
  <aside class="clients">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar( 'thorium-ext-section-client' ) ){
                
                			dynamic_sidebar( 'thorium-ext-section-client' );
                			
                } ?>
            </div>
        </div>
    </aside>
  <?php } 
   } 
}
