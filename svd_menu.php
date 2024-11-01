<?php


add_action( 'admin_menu', 'svd_add_admin_menu' );
add_action( 'admin_init', 'svd_settings_init' );


function svd_add_admin_menu() { 

	add_menu_page( 
		'Sidebar Video Manage',
		'Sidebar Video',
		'manage_options',
		'sidebar_video',
		'svd_options_page',
		'',
		'6'
	);

}


function svd_settings_init() { 

	register_setting( 'pluginPage', 'svd_settings' );

	add_settings_section(
		'svd_pluginPage_section',
		null,
		'', 
		'pluginPage'
	);

	add_settings_field( 
		'svd_checkbox_field_0', 
		__( 'Enable', 'sidebar-video' ), 
		'svd_checkbox_field_0_render', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_text_field_title', 
		__( 'Widget Title', 'sidebar-video' ), 
		'svd_text_field_title', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_text_field_subtitle', 
		__( 'Widget Subtitle', 'sidebar-video' ), 
		'svd_text_field_subtitle', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_select_field_1', 
		__( 'Choose Video', 'sidebar-video' ), 
		'svd_select_field_1_render', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_radio_field_5', 
		__( 'Video Height', 'sidebar-video' ), 
		'svd_radio_field_5_render', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_title_color', 
		__( 'Title Color', 'sidebar-video' ), 
		'svd_title_color', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_title_fz', 
		__( 'Title Font Size', 'sidebar-video' ), 
		'svd_title_fz', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_subtitle_color', 
		__( 'SubTitle Font Size', 'sidebar-video' ), 
		'svd_subtitle_color', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);

	add_settings_field( 
		'svd_subtitle_fz', 
		__( 'SubTitle Font Size', 'sidebar-video' ), 
		'svd_subtitle_fz', 
		'pluginPage', 
		'svd_pluginPage_section' 
	);


}


function svd_checkbox_field_0_render() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='checkbox' name='svd_settings[svd_checkbox_field_0]' <?php checked( $options['svd_checkbox_field_0'], 1 ); ?> value='1'>
	<?php

}


function svd_text_field_title() { 

	$options = get_option( 'svd_settings' );
	?>
	<textarea type='text' name='svd_settings[svd_text_field_title]' rows="2" cols="50" placeholder="Enter Title"><?php echo $options['svd_text_field_title']; ?></textarea>
	<?php

}


function svd_text_field_subtitle() { 

	$options = get_option( 'svd_settings' );
	?>	
	<textarea type='text' name='svd_settings[svd_text_field_subtitle]' rows="4" cols="50" placeholder="Enter Title"><?php echo $options['svd_text_field_subtitle']; ?></textarea>
	<?php

}


function svd_select_field_1_render() { 

	$options = get_option( 'svd_settings' );
	?>
	<select name='svd_settings[svd_select_field_1]' id="svd_video_id" style="width: 178px">
		<option value=''>Select</option>
		<option value='1' id="svd_v1" <?php selected( $options['svd_select_field_1'], 1 ); ?> >Youtube</option>
		<option value='2' id="svd_v2" <?php selected( $options['svd_select_field_1'], 2 ); ?> >Vimeo</option>
		<option value='3' id="svd_v3" <?php selected( $options['svd_select_field_1'], 3 ); ?> >Custom</option>
	</select></br></br>

	

	<input type='text' class="svd_show_v1" name='svd_settings[svd_text_field_2]' value='<?php echo $options['svd_text_field_2']; ?>' style="width: 465px" placeholder="Enter Youtube Link">
	<p class="svd_show_v1">Instruction: To add a <strong>Youtube</strong> link you need to follow this way.  Ex: "https://www.youtube.com/watch?v=-qldi00zUxA" Here only enter the "-qldi00zUxA" this ID. Now your <strong>Youtube</strong> link set successfully.</p>


	<input type='text' class="svd_show_v2" name='svd_settings[svd_text_field_3]' value='<?php echo $options['svd_text_field_3']; ?>' style="width: 465px" placeholder="Enter Vimo Link">
	<p class="svd_show_v2">Instruction: To add a <strong>Vimeo</strong> link you need to follow this way.  Ex: "https://player.vimeo.com/video/446384" Here only enter the "446384" this ID. Now your <strong>Vimeo</strong> link set successfully.</p>

	
	<video width="320" height="240" controls id="svd_animation_pic_select" class="svd_show_v3">
	  <source src="<?php echo $options['svd_text_field_4']; ?>">
	</video></br>


	<input type='button' class="svd_show_v3" id="svd_show_v3" name='svd_settings[svd_text_field_4]' value='Upload Video'>

	<input type='hidden' id="svd_in_show_v3" name='svd_settings[svd_text_field_4]' value='<?php echo $options['svd_text_field_4']; ?>'>

	<style>
		.svd_show_v1{ display:none }
		.svd_show_v2{ display:none }
		.svd_show_v3{ display:none }
	</style>

	<?php
		if(($options['svd_select_field_1']) == '1') {
			echo "<style>.svd_show_v1{ display:block }</style>";
		}
		if(($options['svd_select_field_1']) == '2') {
			echo "<style>.svd_show_v2{ display:block }</style>";
		}
		if(($options['svd_select_field_1']) == '3') {
			echo "<style>.svd_show_v3{ display:block }</style>";
		}
	?>

	<script type="text/javascript">
		(function ($) {

			$('select[id=svd_video_id').on('change', function() {
			    if($("#svd_v1").is(":selected")){
			    	$('.svd_show_v1').show();
			    }else{
			    	$('.svd_show_v1').hide();
			    }
			});

			$('select[id=svd_video_id').on('change', function() {
			    if($("#svd_v2").is(":selected")){
			    	$('.svd_show_v2').show();
			    }else{
			    	$('.svd_show_v2').hide();
			    }
			});

			$('select[id=svd_video_id').on('change', function() {
			    if($("#svd_v3").is(":selected")){
			    	$('.svd_show_v3').show();
			    }else{
			    	$('.svd_show_v3').hide();
			    }
			});


			jQuery(function(){
				jQuery("#svd_show_v3").on("click", function(){
					var images = wp.media({
						title: "Upload Video",
						multiple: false
					}).open().on("select", function(){
						var html = '';
						var uploaded_images = images.state().get("selection");
						var fiels = uploaded_images.toJSON();
						jQuery.each(fiels, function (index, item){
							html += item.url +",";
						});

						jQuery("#svd_in_show_v3").val(html);

						var uploaded_images = images.state().get("selection").first();
						var selectedImages = uploaded_images.toJSON();

						jQuery("#svd_animation_pic_select").attr("src",selectedImages.url);
					});
				});
			});

		})(jQuery);
	</script>

	<?php

}


function svd_radio_field_5_render() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='number' name='svd_settings[svd_radio_field_5]' value='<?php echo $options['svd_radio_field_5']; ?>' placeholder="Enter Pixel Number">
	<?php
}


function svd_title_color() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='color' name='svd_settings[svd_title_color]' value='<?php echo $options['svd_title_color']; ?>' style="width: 178px">
	<?php
}


function svd_title_fz() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='number' name='svd_settings[svd_title_fz]' value='<?php echo $options['svd_title_fz']; ?>' placeholder="Enter Pixel Number">
	<?php
}


function svd_subtitle_color() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='color' name='svd_settings[svd_subtitle_color]' value='<?php echo $options['svd_subtitle_color']; ?>' style="width: 178px">
	<?php
}


function svd_subtitle_fz() { 

	$options = get_option( 'svd_settings' );
	?>
	<input type='number' name='svd_settings[svd_subtitle_fz]' value='<?php echo $options['svd_subtitle_fz']; ?>' placeholder="Enter Pixel Number">
	<?php
}


// Show call back Function
function svd_options_page() {
	?>
	<form action='options.php' method='post'>

		<h2>Sidebar Video Options</h2>

		<?php
			echo settings_errors();
		
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
		?>

	</form>
	<?php
}

?>