<?php
/*

  Plugin Name: PageLines Section Join

  Description: A Section To Join Two Sections With A Down Arrow for Pagelines Platform 5.

  Author:      TOCLOCO LTD

  Version:     1.0.2

  PageLines:   PL_Section_Join

  Tags:         join stuff

  Category:     framework, sections

  Filter:       layout


*/




/** Check that PL is installed */
if( ! class_exists('PL_Section') ){
  return;
}

class PL_Section_Join extends PL_Section {
	function section_persistent(){
	}

	//Use the pl_script and pl_style functions (which enqueues the files)
	function section_styles(){
  		//include any js
  		//pl_script( $this->id, $this->base_url . '/join.js' );
  		pl_style(   'pl-section-join-css',  plugins_url( '/css/pl-section-join.css', __FILE__ ) );
	}

	function section_opts(){
		$options = array(
			array(
				'label'    => __( 'Arrow size (include unit)', 'pagelines' ),
	        	'type'  => 'text',
	            'key'   => 'arrowSize',
	            'default'  => '30px'
			),
			pl_std_opt(
				'background_color', 
				array(
					'label' => 'Top background color', 
					'help' => __('Choose a background color'),
					'default'   => '#ffffff',
					'key'   => 'back1',
				)
			),
			pl_std_opt(
				'background_color', 
				array(
					'label' => 'Bottom background color', 
					'help' => __('Choose a background color'),
					'default'   => '#000000',
					'key'   => 'back2',
				)
			),
			pl_std_opt('scheme'),
		);
		return $options;
	}

	

	function section_template(){ 
		?>
        <div class="join-container1 pl-trigger" data-bind="style: {'background-color': back1, 'height': arrowSize}">
	        <div class="join-arrow" style="background-color: black;" data-bind="style: {'background-color': back1, 'width': arrowSize, 'height': arrowSize}"></div>
		</div>
		<div class="join-container2 pl-trigger" data-bind="style: {'background-color': back2, 'height': arrowSize}">
		</div>
	   <?php
	}
}
