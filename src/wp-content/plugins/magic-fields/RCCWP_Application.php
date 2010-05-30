<?php
/**
 *  In this class content all the functions for:
 *  
 *   - Install Magic Fields
 *   - Upgrade Magic Fields
 *   - Uninstall Magic Fields
 *   - Check if Magic Fields was correctly installed 
 */
class RCCWP_Application
{

	function ContinueInstallation(){
		RCCWP_Application::SetCaps();
	}

	function SetCaps(){
		// Create capabilities if they are not installed
		if (!current_user_can(MF_CAPABILITY_PANELS)){
			$role = get_role('administrator');
			if (!(RCCWP_Application::IsWordpressMu()) || is_site_admin()){
				$role->add_cap(MF_CAPABILITY_PANELS);
				$role->add_cap(MAGIC_FIELDS_CAPABILITY_MODULES);
			}
			
		}
	}


	/**
	 *  Installing Magic fields
	 * 
	 *  This function create all the Magic Fields default values and
	 *  his  tables in the database 
	 * 
	 *  @return void
	 */
	function Install(){
		
		include_once('RCCWP_Options.php');
		global $wpdb;

		// First time installation
		if (get_option(RC_CWP_OPTION_KEY) === false){
	
			// Giving full rights to folders. thanks Akis Kesoglou 
			wp_mkdir_p(MF_UPLOAD_FILES_DIR);
			wp_mkdir_p(MF_CACHE_DIR);
			
			//Initialize options
			$options['condense-menu'] = 0;
			$options['hide-non-standart-content'] = 1;
			$options['hide-write-post'] = 0;
			$options['hide-write-page'] = 0;
			$options['hide-visual-editor'] = 0;
			$options['prompt-editing-post'] = 0;
			$options['assign-to-role'] = 0;
			$options['default-custom-write-panel'] = "";

			RCCWP_Options::Update($options);
		}
		// Check blog database
		if (get_option("RC_CWP_BLOG_DB_VERSION") == '') update_option("RC_CWP_BLOG_DB_VERSION", 0);
		
		if (get_option("RC_CWP_BLOG_DB_VERSION") < RC_CWP_DB_VERSION) 
			$BLOG_DBChanged = true;
		else
			$BLOG_DBChanged = false;
				
			
		// Install blog tables
		if (!$wpdb->get_var("SHOW TABLES LIKE '".MF_TABLE_POST_META."'") == MF_TABLE_POST_META ||
				$BLOG_DBChanged){	
			$blog_tables[] = "CREATE TABLE " . MF_TABLE_POST_META . " (
				id integer NOT NULL,
				group_count integer NOT NULL,
				field_count integer NOT NULL,
				post_id integer NOT NULL,
				field_name text NOT NULL,
				order_id integer NOT NULL,
				PRIMARY KEY (id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci" ;
	

			// try to get around
			// these includes like http://trac.mu.wordpress.org/ticket/384 
			// and http://www.quirm.net/punbb/viewtopic.php?pid=832#p832
			if (file_exists(ABSPATH . 'wp-includes/pluggable.php')) {
				require_once(ABSPATH . 'wp-includes/pluggable.php');
			} else {
				require_once(ABSPATH . 'wp-includes/pluggable-functions.php');
			}
			require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
			
			foreach($blog_tables as $blog_table)
				dbDelta($blog_table);
		}
		update_option('RC_CWP_BLOG_DB_VERSION', RC_CWP_DB_VERSION);

		// Upgrade Blog
		if ($BLOG_DBChanged)	RCCWP_Application::UpgradeBlog();

				
		if (RCCWP_Application::IsWordpressMu()){	
			if (get_site_option("RC_CWP_DB_VERSION") == '') update_site_option("RC_CWP_DB_VERSION", 0);
			if (get_site_option("RC_CWP_DB_VERSION") < RC_CWP_DB_VERSION) 
				$DBChanged = true;
			else
				$DBChanged = false;
		}
		else{
			if (get_option("RC_CWP_DB_VERSION") == '') update_option("RC_CWP_DB_VERSION", 0);
			if (get_option("RC_CWP_DB_VERSION") < RC_CWP_DB_VERSION) 
				$DBChanged = true;
			else
				$DBChanged = false;
		}
		
		// -- Create Tables if they don't exist or the database changed
		if(!$wpdb->get_var("SHOW TABLES LIKE '".MF_TABLE_PANELS."'") == MF_TABLE_PANELS) 	$not_installed = true;

		if( $not_installed ||
			$DBChanged){ 

			$qst_tables[] = "CREATE TABLE " . MF_TABLE_PANELS . " (
				id int(11) NOT NULL auto_increment,
				name varchar(255) NOT NULL,
				single tinyint(1) NOT NULL default 0,
				description varchar(255),
				display_order int(11),
				capability_name varchar(255) NOT NULL,
				type varchar(255) NOT NULL,
				PRIMARY KEY (id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
			
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_CUSTOM_FIELD_TYPES . " (
				id tinyint(11) NOT NULL auto_increment,
				name varchar(255) NOT NULL,
				description varchar(100),
				has_options enum('true', 'false') NOT NULL,
				has_properties enum('true', 'false') NOT NULL,
				allow_multiple_values enum('true', 'false') NOT NULL,
				PRIMARY KEY (id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
				
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_GROUP_FIELDS . " (
				id int(11) NOT NULL auto_increment,
				group_id int(11) NOT NULL,
				name varchar(255) NOT NULL,
				description varchar(255),
				display_order int(11),
				display_name enum('true', 'false') NOT NULL,
				display_description enum('true', 'false') NOT NULL,
				type tinyint NOT NULL,
				CSS varchar(100),
				required_field tinyint,
				duplicate tinyint(1) NOT NULL,
				help_text text,
				PRIMARY KEY (id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
				
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_CUSTOM_FIELD_OPTIONS . " (
				custom_field_id int(11) NOT NULL,
				options text,
				default_option text,
				PRIMARY KEY (custom_field_id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
			
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_PANEL_CATEGORY . " (
				panel_id int(11) NOT NULL,
				cat_id int(11) NOT NULL,
				PRIMARY KEY (panel_id, cat_id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
				
						
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_PANEL_STANDARD_FIELD . " (
				panel_id int(11) NOT NULL,
				standard_field_id int(11) NOT NULL,
				PRIMARY KEY (panel_id, standard_field_id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
			
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_CUSTOM_FIELD_PROPERTIES . " (
				custom_field_id int(11) NOT NULL AUTO_INCREMENT,
				properties TEXT,
				PRIMARY KEY (custom_field_id)
				) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	
			$qst_tables[] = "CREATE TABLE " . MF_TABLE_PANEL_GROUPS . " (
				id int(11) NOT NULL auto_increment,
				panel_id int(11) NOT NULL,
				name varchar(255) NOT NULL,
				duplicate tinyint(1) NOT NULL,
				at_right tinyint(1) NOT NULL,
				PRIMARY KEY (id) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";

			// try to get around
			// these includes like http://trac.mu.wordpress.org/ticket/384 
			// and http://www.quirm.net/punbb/viewtopic.php?pid=832#p832
			if (file_exists(ABSPATH . 'wp-includes/pluggable.php')) {
				require_once(ABSPATH . 'wp-includes/pluggable.php');
			} else {
				require_once(ABSPATH . 'wp-includes/pluggable-functions.php');
			}
			require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
			
			foreach($qst_tables as $qst_table)
				dbDelta($qst_table);

			if (RCCWP_Application::IsWordpressMu()) {
					update_site_option('RC_CWP_DB_VERSION', RC_CWP_DB_VERSION);
			} else {
					update_option('RC_CWP_DB_VERSION', RC_CWP_DB_VERSION);
			}
		
		}

		// Insert standard fields definition
		if($not_installed){
		
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (1, 'Textbox', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (2, 'Multiline Textbox', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (3, 'Checkbox', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (4, 'Checkbox List', NULL, 'true', 'false', 'true')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (5, 'Radiobutton List', NULL, 'true', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (6, 'Dropdown List', NULL, 'true', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (7, 'Listbox', NULL, 'true', 'true', 'true')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (8, 'File', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (9, 'Image', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
	
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (10, 'Date', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
	
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (11, 'Audio', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (12, 'Color Picker', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (13, 'Slider', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (14, 'Related Type', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
			
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (15, 'Markdown Textbox', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
			
		}
		
		//Import Default modules 
		if (RCCWP_Application::IsWordpressMu()){
			if (get_site_option('MAGIC_FIELDS_fist_time') == ''){
				update_site_option('MAGIC_FIELDS_fist_time', '1');
			}
		} else {
			if (get_option('MAGIC_FIELDS_fist_time') == ''){
				update_option('MAGIC_FIELDS_fist_time', '1');
			}
		}
	}
	
	/**
	 *  Upgrade Blog
	 *  
	 *  If the Plugin was upgrade from a older version
	 *  this function is executed for check any possible change in the database
	 *  
	 *  @return void
	 */
	function UpgradeBlog(){
		global $wpdb;
		
		if (RC_CWP_DB_VERSION <= 2){
			$wpdb->query('ALTER TABLE '.MF_TABLE_GROUP_FIELDS.' MODIFY display_order INTEGER');
			$wpdb->query('ALTER TABLE '.MF_TABLE_GROUP_FIELDS.' ADD COLUMN help_text text after duplicate');
			$wpdb->query('ALTER TABLE '.MF_TABLE_PANELS.' MODIFY display_order INTEGER');
		}
		
		if (RC_CWP_DB_VERSION <= 3){
			$sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (14, 'Related Type', NULL, 'false', 'true', 'false')";
			$wpdb->query($sql6);
		}
		
	  if (RC_CWP_DB_VERSION <= 4){
  	  $sql6 = "INSERT IGNORE INTO " . MF_TABLE_CUSTOM_FIELD_TYPES . " VALUES (15, 'Markdown Textbox', NULL, 'false', 'false', 'false')";
			$wpdb->query($sql6);
  	}
	}

	/**
	 *  Uninstall the Magic Fields Plugin
	 *  
	 *  @return void
	 */
	function Uninstall(){
 		global $wpdb;

		if (get_option("Magic_Fields_notTopAdmin")) return;	
		
		// Remove options
		delete_option(RC_CWP_OPTION_KEY);
		delete_option('MAGIC_FIELDS_fist_time');
		delete_option('RC_CWP_DB_VERSION');
		delete_option('RC_CWP_BLOG_DB_VERSION');
		
		//delete post_meta WP and WP MF
		$sql = "delete a.* from $wpdb->postmeta as a, ".wp_mf_post_meta." as b where b.id = a.meta_id";
		$wpdb->query($sql);

		// Delete meta data
		$sql = "DELETE FROM $wpdb->postmeta WHERE meta_key = '" . RC_CWP_POST_WRITE_PANEL_ID_META_KEY . "'";
 		$wpdb->query($sql);

		$sql = "DROP TABLE " . MF_TABLE_CUSTOM_FIELD_TYPES;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_STANDARD_FIELDS;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_PANELS;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_PANEL_GROUPS;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_GROUP_FIELDS;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_PANEL_CATEGORY;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_PANEL_STANDARD_FIELD;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_PANEL_HIDDEN_EXTERNAL_FIELD;
		$wpdb->query($sql);
		
		$sql = "DROP TABLE " . MF_TABLE_CUSTOM_FIELD_OPTIONS;
		$wpdb->query($sql);

		$sql = "DROP TABLE " . MF_TABLE_CUSTOM_FIELD_PROPERTIES; 
		$wpdb->query($sql);

		$sql = "DROP TABLE " . MF_TABLE_POST_META; 
		$wpdb->query($sql);

		$current = get_option('active_plugins');
		$plugin = plugin_basename(MF_PLUGIN_DIR.'/Main.php');
		array_splice($current, array_search( $plugin, $current), 1 );
		do_action('deactivate_' . trim( $plugin ));
		update_option('active_plugins', $current);
	}
	
	
	/**
	 * This function returns true if the user be in the Write Post Page
	 *   
	 * @return Bool  
	 */
	function InWritePostPanel()
	{
		return (strstr($_SERVER['REQUEST_URI'], '/wp-admin/post-new.php') ||
			strstr($_SERVER['REQUEST_URI'], '/wp-admin/post.php') ||
			strstr($_SERVER['REQUEST_URI'], '/wp-admin/page-new.php') ||
			strstr($_SERVER['REQUEST_URI'], '/wp-admin/page.php'));
	}

	/**
	 *  Return True if  Magic Fields was installed in a Wordpress Mu
	 * 
	 *  @return bool
	 */
	function IsWordpressMu(){
		global $is_wordpress_mu; 

		if  ($is_wordpress_mu){ 
			return true;
		}
		return false;
	}

	/**
	 *  This function check if  Magic Fields has all the requirements for his use
	 * 
	 *  @return void
	 */
	function CheckInstallation(){
		global $mf_domain;
	
		if (!empty($_GET['page']) && stripos($_GET['page'], "mf") === false && $_GET['page'] != "RCCWP_OptionsPage.php" && !isset($_GET['custom-write-panel-id'])) return;
		
		$dir_list = "";
		$dir_list2 = "";
	
		wp_mkdir_p(MF_UPLOAD_FILES_DIR);
		wp_mkdir_p(MF_CACHE_DIR);
	
		// Giving full rights to folders. thanks Akis Kesoglou 
		if (!is_dir(MF_CACHE_DIR)){
			$dir_list2.= "<li>".MF_CACHE_DIR . "</li>";
		}elseif (!is_writable(MF_CACHE_DIR)){
			$dir_list.= "<li>".MF_CACHE_DIR . "</li>";
		}

		if (!is_dir(MF_UPLOAD_FILES_DIR)){
			$dir_list2.= "<li>".MF_UPLOAD_FILES_DIR . "</li>";
		}elseif (!is_writable(MF_UPLOAD_FILES_DIR)){
			$dir_list.= "<li>".MF_UPLOAD_FILES_DIR . "</li>";
		}
		
		if ($dir_list2 != ""){
			echo "<div id='magic-fields-install-error-message' class='error'><p><strong>".__('Magic Fields is not ready yet.', $mf_domain)."</strong> ".__('must create the following folders (and must chmod 777):', $mf_domain)."</p><ul>";
			echo $dir_list2;
			echo "</ul></div>";
		}
		if ($dir_list != ""){
			echo "<div id='magic-fields-install-error-message-2' class='error'><p><strong>".__('Magic Fields is not ready yet.', $mf_domain)."</strong> ".__('The following folders must be writable (usually chmod 777 is neccesary):', $mf_domain)."</p><ul>";
			echo $dir_list;
			echo "</ul></div>";
		}
	}

}
