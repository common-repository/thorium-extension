<?php
/**
 * Add or edit section items
 */
 
$wp_customize->register_control_type( 'Thorium_Ext_Control_AddEdit' );

if( ! class_exists( 'Thorium_Ext_Control_AddEdit' ) ) {
	class Thorium_Ext_Control_AddEdit extends WP_Customize_Control {

		public $type      = 'add-edit';
		public $section_type;
		
		public function to_json() {
			parent::to_json();
			$this->json['section_type'] = $this->section_type;
		}
		
		protected function render_content() {}
		
		protected function content_template() {
			?>
			<button type="button" class="button thorium-ext-add-items" id="thorium-ext-section-add-some-{{ data.section_type }}">
				<span class="dashicons thorium-ext-add"></span>{{ data.label }}
			</button>
			<?php
		}


	}
}
