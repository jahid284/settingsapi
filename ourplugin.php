<?php 

//Plugin Name: Optimus
add_action('admin_menu','ourplugin_page');
function ourplugin_page(){
	add_menu_page(
	'general settings',
	'Optimus',
	'manage_options',
	'general_settins',
	'general_page_callback',
	'dashicons-admin-generic',
	40
	);
	
	add_submenu_page(
	'general_settins',
	'general settings',
	'General',
	'manage_options',
	'general_settins',
	'general_page_callback'
	
	);
	add_submenu_page(
	'general_settins',
	'Profile settings',
	'Profile',
	'manage_options',
	'profile_settings',
	'profile_page_callback'
	
	);
	
	add_action('admin_init','ourpage_sec_n_fields');
}
 function ourpage_sec_n_fields(){
	 add_settings_section(
	 'general_sec_id',
	 'General Settings',
	 'general_sec_callback',
	 'general_settins'
	 );
	 register_setting(
	 'general_settings_group',
	 'name_field'
	 );
	 register_setting(
	 'general_settings_group',
	 'title_field'
	 );
	 
	 add_settings_field(
		'you_name_id',
		'NAME:',
		'name_addfield_callback',
		'general_settins',
		'general_sec_id'
	 );
	 add_settings_field(
		'you_title_id',
		'TITLE:',
		'title_addfield_callback',
		'general_settins',
		'general_sec_id'
	 );
	 
 }
//fields callbacks

function name_addfield_callback(){
	$name = get_option('name_field');
	
	?>
	<input type="text" name="name_field" value="<?php echo $name; ?>"/>
	<?php
}
function title_addfield_callback(){
	$title_field = get_option('title_field');
	
	?>
	<input type="text" name="title_field" value="<?php echo $title_field; ?>"/>
	<?php
	
}

// sec callback function
function general_sec_callback(){
	echo'<p>Change your general option from here.</p>';
}



// menu page call back functions
 

function general_page_callback(){
	include_once(plugin_dir_path( __FILE__ ).'inc/general.php');
}


function profile_page_callback(){
	include_once(plugin_dir_path( __FILE__ ).'inc/profile.php');
}