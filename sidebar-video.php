<?php

/*
Plugin Name: Sidebar Video
Author: Mehedi Hasan Kanon
Author URI: http://mhkanon.com
Description: Sidebar Video plugin you can set video on your sidebar easily. You can show Youtube, Vimeo and uploaded video in your sidebar.
Text Domain: sidebar_video
Domain Path: /languages
Version: 1.0.5
Stable tag: 1.0.5
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/



/*=======================================================
					Sidebar Video
=========================================================*/


require_once plugin_dir_path( __FILE__ ) .'svd_menu.php';



add_action('widgets_init', function() {

	register_widget('svd_register');

});


Class svd_register extends WP_Widget {

	public function __construct(){
		parent::__construct( 'svd_register','Sidebar Video' );
		add_action( 'wp_enqueue_scripts', array( $this,'svd_enqueue_script' ) );
	}

	public function svd_enqueue_script(){
		//wp_enqueue_style('custom_widget_post_1', plugins_url('css/style.css',__FILE__));
	}

	public function form($svd_register){ ?>

		<p>There are no Options for this widget.</p>

		<?php
	}

	public function widget($svd_one,$svd_two) { 

		$options    = get_option( 'svd_settings' );
		$checkbox   = $options['svd_checkbox_field_0'];
		$title      = $options['svd_text_field_title'];
		$subtitle   = $options['svd_text_field_subtitle'];
		$select     = $options['svd_select_field_1'];
		$youtube_id = $options['svd_text_field_2'];

		if(!empty($checkbox)){
			$checkbox;
		}else{
			$checkbox = '1';
		}

		if(!empty($title)){
			$title;
		}else{
			$title = 'What is Lorem Ipsum?';
		}

		if(!empty($subtitle)){
			$subtitle;
		}else{
			$subtitle = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
		}

		if(!empty($select)){
			$select;
		}else{
			$select = '1';
		}

		if(!empty($youtube_id)){
			$youtube_id;
		}else{
			$youtube_id = '-qldi00zUxA';
		}


		if($checkbox == '1' ) { ?>


			<h4 class="svd_title"><?php echo $title; ?></h4>

			<p class="svd_subtitle"><?php echo $subtitle; ?></p>

			<?php if($select == '1' ) { ?>
				<iframe height="<?php echo $options['svd_radio_field_5']; ?>" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls class="svd_pad" style="width:100%"></iframe>
			<?php } ?>

			<?php if($select == '2' ) { ?>
				<iframe src="https://player.vimeo.com/video/<?php echo $options['svd_text_field_3']; ?>" height="<?php echo $options['svd_radio_field_5']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="margin-bottom: 0em !important; width: 100%"></iframe>
			<?php } ?>

			<?php if($select == '3' ) { ?>
				<video height="<?php echo $options['svd_radio_field_5']; ?>" controls class="svd_pad" style="width:100%">
			  		<source src="<?php echo $options['svd_text_field_4']; ?>">
				</video>
			<?php } ?>

			<style>
				.svd_title {
					color: <?php echo $options['svd_title_color']; ?> !important;
					text-align: justify !important;
					text-transform: capitalize !important;
					font-size: <?php echo $options['svd_title_fz']; ?>px !important;
					font-weight: 800 !important;
					margin-bottom: 7px;
				}

				.svd_subtitle {
					color: <?php echo $options['svd_subtitle_color']; ?> !important;
					text-align: justify !important;
					font-size: <?php echo $options['svd_subtitle_fz']; ?>px !important;
					margin-bottom: 5px;
				}

				.svd_pad {
					margin-bottom: 10px;
				}				
			</style>

			<?php
		}
		
	}

};

?>