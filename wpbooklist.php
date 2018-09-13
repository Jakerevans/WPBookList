<?php
/**
 * WordPress Book List
 *
 * @package     WordPress Book List
 * @author      Jake Evans
 * @copyright   2018 Jake Evans
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Book List
 * Plugin URI: https://www.jakerevans.com
 * Description: For authors, publishers, librarians, and book-lovers alike - use it to sell your books, record and catalog your library, and more!
 * Version: 6.0.0
 * Author: Jake Evans
 * Text Domain: wpbooklist
 * Author URI: https://www.jakerevans.com
 */

global $wpdb;

/* REQUIRE STATEMENTS */
	require_once 'includes/class-wpbooklist-general-functions.php';
	require_once 'includes/class-wpbooklist-ajax-functions.php';
	require_once 'includes/classes/rest/class-wpbooklist-rest-functions.php';
	require_once 'includes/classes/storytime/class-storytime.php';
/* END REQUIRE STATEMENTS */

/* CONSTANT DEFINITIONS */

	// Grabbing database prefix.
	//define( '$WPDB->PREFIX', $wpdb->prefix );

	// Root plugin folder directory.
	define( 'WPBOOKLIST_VERSION_NUM', '6.0.0' );

	// Root plugin folder directory.
	define( 'ROOT_DIR', plugin_dir_path( __FILE__ ) );

	// Root WordPress Plugin Directory.
	define( 'ROOT_WP_PLUGINS_DIR', str_replace( '/wpbooklist', '', plugin_dir_path( __FILE__ ) ) );

	// Root plugin folder URL .
	define( 'ROOT_URL', plugins_url() . '/wpbooklist/' );

	// Quotes Directory.
	define( 'QUOTES_DIR', ROOT_DIR . 'quotes/' );

	// Quotes URL.
	define( 'QUOTES_URL', ROOT_URL . 'quotes/' );

	// Root JavaScript Directory.
	define( 'JAVASCRIPT_URL', ROOT_URL . 'assets/js/' );

	// Root SOUNDS Directory.
	define( 'SOUNDS_URL', ROOT_URL . 'assets/sounds/' );

	// Root Classes Directory.
	define( 'CLASS_DIR', ROOT_DIR . 'includes/classes/' );

	// Root REST Classes Directory.
	define( 'CLASS_REST_DIR', ROOT_DIR . 'includes/classes/rest/' );

	// Root Storytime Classes Directory.
	define( 'CLASS_STORYTIME_DIR', ROOT_DIR . 'includes/classes/storytime/' );

	// Root Compatability Classes Directory.
	define( 'CLASS_COMPAT_DIR', ROOT_DIR . 'includes/classes/compat/' );

	// Root Book Classes Directory.
	define( 'CLASS_BOOK_DIR', ROOT_DIR . 'includes/classes/book/' );

	// Root Translations Directory.
	define( 'CLASS_TRANSLATIONS_DIR', ROOT_DIR . 'includes/classes/translations/' );

	// Root Transients Directory.
	define( 'CLASS_TRANSIENTS_DIR', ROOT_DIR . 'includes/classes/transients/' );

	// Root Page Directory.
	define( 'CLASS_PAGE_DIR', ROOT_DIR . 'includes/classes/page/' );

	// Root Post Directory.
	define( 'CLASS_POST_DIR', ROOT_DIR . 'includes/classes/post/' );

	// Root Backup Directory.
	define( 'CLASS_BACKUP_DIR', ROOT_DIR . 'includes/classes/backup/' );

	// Root Image URL .
	define( 'ROOT_IMG_URL', ROOT_URL . 'assets/img/' );

	// Root Image Icons URL .
	define( 'ROOT_IMG_ICONS_URL', ROOT_URL . 'assets/img/icons/' );

	// Root CSS URL .
	define( 'ROOT_CSS_URL', ROOT_URL . 'assets/css/' );

	// Root JS URL .
	define( 'ROOT_JS_URL', ROOT_URL . 'assets/js/' );

	// Root UI directory.
	define( 'ROOT_INCLUDES_UI', ROOT_DIR . 'includes/ui/' );

	// Root UI Admin directory.
	define( 'ROOT_INCLUDES_UI_ADMIN_DIR', ROOT_DIR . 'includes/ui/admin/' );

	// Define the Uploads base directory.
	$uploads     = wp_upload_dir();
	$upload_path = $uploads['basedir'];
	define( 'UPLOADS_BASE_DIR', $upload_path . '/' );

	// Define the Uploads base URL.
	$upload_url = $uploads['baseurl'];
	define( 'UPLOADS_BASE_URL', $upload_url . '/' );

	// Define the Library Stylepaks base directory.
	define( 'LIBRARY_STYLEPAKS_UPLOAD_DIR', UPLOADS_BASE_DIR . 'wpbooklist/stylepaks/library/' );

	// Define the Library Stylepaks base url.
	define( 'LIBRARY_STYLEPAKS_UPLOAD_URL', UPLOADS_BASE_URL . 'wpbooklist/stylepaks/library/' );

	// Define the Posts Stylepaks base directory.
	define( 'POST_TEMPLATES_UPLOAD_DIR', UPLOADS_BASE_DIR . 'wpbooklist/templates/posts/' );

	// Define the Posts Stylepaks base url.
	define( 'POST_TEMPLATES_UPLOAD_URL', UPLOADS_BASE_URL . 'wpbooklist/templates/posts/' );

	// Define the Pages Stylepaks base directory.
	define( 'PAGE_TEMPLATES_UPLOAD_DIR', UPLOADS_BASE_DIR . 'wpbooklist/templates/pages/' );

	// Define the Pages Stylepaks base url.
	define( 'PAGE_TEMPLATES_UPLOAD_URL', UPLOADS_BASE_URL . 'wpbooklist/templates/pages/' );

	// Define the Library DB backups base directory.
	define( 'LIBRARY_DB_BACKUPS_UPLOAD_DIR', UPLOADS_BASE_DIR . 'wpbooklist/backups/library/db/' );

	// Define the Library DB backups base directory.
	define( 'LIBRARY_DB_BACKUPS_UPLOAD_URL', UPLOADS_BASE_URL . 'wpbooklist/backups/library/db/' );

	// Define the page templates base directory.
	define( 'PAGE_POST_TEMPLATES_DEFAULT_DIR', ROOT_DIR . 'includes/templates/' );

	// Define the edit page offset.
	define( 'EDIT_PAGE_OFFSET', 100 );

	// Nonces array.
	define( 'WPBOOKLIST_NONCES_ARRAY',
		wp_json_encode(array(
			'adminnonce1' => 'wphealthtracker_jre_selecteduser_vitals_enter_action_callback',
			'adminnonce2' => 'wpbooklist_dashboard_add_book_action_callback',
			'adminnonce3' => 'wpbooklist_show_book_in_colorbox_action_callback',
			'adminnonce4' => 'wpbooklist_new_library_action_callback',
			'adminnonce5' => 'wpbooklist_delete_library_action_callback',
			'adminnonce6' => 'wpbooklist_dashboard_save_library_display_options_action_callback',
			'adminnonce7' => 'wpbooklist_dashboard_save_page_display_options_action_callback',
			'adminnonce8' => 'wpbooklist_dashboard_save_post_display_options_action_callback',
			'adminnonce9' => 'wpbooklist_change_library_display_options_action_callback',
			'adminnonce10' => 'wpbooklist_edit_book_show_form_action_callback',
			'adminnonce11' => 'wpbooklist_edit_book_pagination_action_callback',
			'adminnonce12' => 'wpbooklist_edit_book_switch_lib_action_callback',
			'adminnonce13' => 'wpbooklist_edit_book_search_action_callback',
			'adminnonce14' => 'wpbooklist_edit_book_actual_action_callback',
			'adminnonce15' => 'wpbooklist_delete_book_action_callback',
			'adminnonce16' => 'wpbooklist_user_apis_action_callback',
			'adminnonce17' => 'wpbooklist_upload_new_stylepak_action_callback',
			'adminnonce18' => 'wpbooklist_assign_stylepak_action_callback',
			'adminnonce19' => 'wpbooklist_upload_new_post_template_action_callback',
			'adminnonce20' => 'wpbooklist_assign_post_template_action_callback',
			'adminnonce21' => 'wpbooklist_upload_new_page_template_action_callback',
			'adminnonce22' => 'wpbooklist_assign_page_template_action_callback',
			'adminnonce23' => 'wpbooklist_create_db_library_backup_action_callback',
			'adminnonce24' => 'wpbooklist_restore_db_library_backup_action_callback',
			'adminnonce25' => 'wpbooklist_create_csv_action_callback',
			'adminnonce26' => 'wpbooklist_amazon_localization_action_callback',
			'adminnonce27' => 'wpbooklist_delete_all_books_in_library_action_callback',
			'adminnonce28' => 'wpbooklist_delete_all_books_pages_and_posts_action_callback',
			'adminnonce29' => 'wpbooklist_delete_all_checked_books_action_callback',
			'adminnonce30' => 'wpbooklist_jre_dismiss_prem_notice_forever_action',
			'adminnonce31' => 'wpbooklist_reorder_action_callback',
			'adminnonce32' => 'wpbooklist_exit_results_action_callback',
			'adminnonce33' => 'wpbooklist_storytime_select_category_action_callback',
			'adminnonce34' => 'wpbooklist_storytime_get_story_action_callback',
			'adminnonce35' => 'wpbooklist_storytime_expand_browse_action_callback',
			'adminnonce36' => 'wpbooklist_storytime_save_settings_action_callback',
			'adminnonce37' => 'wpbooklist_delete_story_action_callback',



		))
	);

/* END OF CONSTANT DEFINITIONS */

/* MISC. INCLUSIONS & DEFINITIONS */

	// Parse the wpbooklistconfig file.
	$config_array = parse_ini_file( 'wpbooklistconfig.ini' );

	// Get the default admin message for inclusion into database.
	define( 'ADMIN_MESSAGE', $config_array['initial_admin_message'] );

	// Loading textdomain.
	load_plugin_textdomain( 'wpbooklist', false, ROOT_DIR . 'languages' );

/* END MISC. INCLUSIONS & DEFINITIONS */


/* CLASS INSTANTIATIONS */

	// Call the class found in wpbooklist-functions.php.
	$wp_book_list_general_functions = new WPBookList_General_Functions();

	// Call the class found in wpbooklist-functions.php.
	$wp_book_list_ajax_functions = new WPBookList_Ajax_Functions();

	// Call the class found in class-wpbooklist-rest-functions.php.
	$wp_book_list_rest_functions = new WPBookList_Rest_Functions();

	// Call the class found in class-wpbooklist-rest-functions.php.
	$wp_book_list_storytime = new WPBookList_StoryTime( null, null, null, null );


/* END CLASS INSTANTIATIONS */

/* FUNCTIONS FOUND IN CLASS-WPBOOKLIST-GENERAL-FUNCTIONS.PHP THAT APPLY PLUGIN-WIDE */

	// For the admin pages.
	add_action( 'admin_menu', array( $wp_book_list_general_functions, 'wpbooklist_jre_my_admin_menu' ) );

	// Adding the function that will take our WPHEALTHTRACKER_NONCES_ARRAY Constant from below and create actual nonces to be passed to Javascript functions.
	add_action( 'init', array( $wp_book_list_general_functions, 'wpbooklist_jre_create_nonces' ) );

	// Adding Ajax library.
	add_action( 'wp_head', array( $wp_book_list_general_functions, 'wpbooklist_jre_prem_add_ajax_library' ) );

	// Registers table names.
	add_action( 'init', array( $wp_book_list_general_functions, 'wpbooklist_jre_register_table_name' ) );

	// Creates tables upon activation.
	register_activation_hook( __FILE__, array( $wp_book_list_general_functions, 'wpbooklist_jre_create_tables' ) );

	// Adding the front-end library ui css file.
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_frontend_library_ui_default_style' ) );

	// Adding the admin css file.
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_admin_style' ) );

	// Adding the admin js file.
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_admin_js' ) );

	// Adding the frontend js file.
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_frontend_js' ) );

	// Adding the posts & pages css file.
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_posts_pages_default_style' ) );

	// For admin messages.
	add_action( 'admin_notices', array( $wp_book_list_general_functions, 'wpbooklist_jre_admin_notice' ) );

	// Adding the front-end library shortcode.
	add_shortcode( 'wpbooklist_shortcode', array( $wp_book_list_general_functions, 'wpbooklist_jre_plugin_dynamic_shortcode_function' ) );

	// Shortcode that allows a book image to be placed on a page.
	add_shortcode( 'showbookcover', array( $wp_book_list_general_functions, 'wpbooklist_book_cover_shortcode' ) );

	// The function that determines which template to load for WPBookList Pages.
	add_filter( 'the_content', array( $wp_book_list_general_functions, 'wpbooklist_set_page_post_template' ) );

	// Function to run any code that is needed to modify the plugin between different versions.
	add_action( 'plugins_loaded', array( $wp_book_list_general_functions, 'wpbooklist_update_upgrade_function' ) );

	




	/*
	// Adding the form check js file.
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_form_checks_js' ) );

	// Adding the jquery masked js file.
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jquery_masked_input_js' ) );

	// Code for adding the jquery readmore file for text blocks like description and notes
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jquery_readmore_js' ) );

	// Adding colorbox JS file on both front-end and dashboard
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_plugin_colorbox_script' ) );
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_plugin_colorbox_script' ) );

	// Adding AddThis sharing JS file
	add_action( 'admin_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_plugin_addthis_script' ) );
	add_action( 'wp_enqueue_scripts', array( $wp_book_list_general_functions, 'wpbooklist_jre_plugin_addthis_script' ) );
	*/



/* END OF FUNCTIONS FOUND IN CLASS-WPBOOKLIST-GENERAL-FUNCTIONS.PHP THAT APPLY PLUGIN-WIDE */

/* FUNCTIONS FOUND IN CLASS-WPBOOKLIST-AJAX-FUNCTIONS.PHP THAT APPLY PLUGIN-WIDE */

	// For adding a book from the admin dashboard.
	add_action( 'wp_ajax_wpbooklist_dashboard_add_book_action', array( $wp_book_list_ajax_functions, 'wpbooklist_dashboard_add_book_action_callback' ) );

	add_action( 'wp_ajax_wpbooklist_show_book_in_colorbox_action', array( $wp_book_list_ajax_functions, 'wpbooklist_show_book_in_colorbox_action_callback' ) );

	// For creating custom libraries.
	add_action( 'wp_ajax_wpbooklist_new_library_action', array( $wp_book_list_ajax_functions, 'wpbooklist_new_library_action_callback' ) );

	// For deleting custom libraries.
	add_action( 'wp_ajax_wpbooklist_delete_library_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_library_action_callback' ) );

	// For saving library display options.
	add_action( 'wp_ajax_wpbooklist_dashboard_save_library_display_options_action', array( $wp_book_list_ajax_functions, 'wpbooklist_dashboard_save_library_display_options_action_callback' ) );

	// For saving post display options.
	add_action( 'wp_ajax_wpbooklist_dashboard_save_post_display_options_action', array( $wp_book_list_ajax_functions, 'wpbooklist_dashboard_save_post_display_options_action_callback' ) );


	// For saving page display options.
	add_action( 'wp_ajax_wpbooklist_dashboard_save_page_display_options_action', array( $wp_book_list_ajax_functions, 'wpbooklist_dashboard_save_page_display_options_action_callback' ) );

	// Function for changing the Library on the Library tab of the Display Options menu.
	add_action( 'wp_ajax_wpbooklist_change_library_display_options_action', array( $wp_book_list_ajax_functions, 'wpbooklist_change_library_display_options_action_callback' ) );

	// For editing a book from the admin dashboard.
	add_action( 'wp_ajax_wpbooklist_edit_book_show_form_action', array( $wp_book_list_ajax_functions, 'wpbooklist_edit_book_show_form_action_callback' ) );

	// For handling the pagination of the 'Edit & Delete Books' tab.
	add_action( 'wp_ajax_wpbooklist_edit_book_pagination_action', array( $wp_book_list_ajax_functions, 'wpbooklist_edit_book_pagination_action_callback' ) );

	// For switching libraries on the 'Edit & Delete Books' tab.
	add_action( 'wp_ajax_wpbooklist_edit_book_switch_lib_action', array( $wp_book_list_ajax_functions, 'wpbooklist_edit_book_switch_lib_action_callback' ) );

	// For searching for a title to edit.
	add_action( 'wp_ajax_wpbooklist_edit_book_search_action', array( $wp_book_list_ajax_functions, 'wpbooklist_edit_book_search_action_callback' ) );

	// For the saving of edits to existing books.
	add_action( 'wp_ajax_wpbooklist_edit_book_actual_action', array( $wp_book_list_ajax_functions, 'wpbooklist_edit_book_actual_action_callback' ) );

	// For deleting a book from the 'Edit & Delete Books' tab.
	add_action( 'wp_ajax_wpbooklist_delete_book_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_book_action_callback' ) );

	// For saving a user's own API keys.
	add_action( 'wp_ajax_wpbooklist_user_apis_action', array( $wp_book_list_ajax_functions, 'wpbooklist_user_apis_action_callback' ) );

	// For uploading a new StylePak after purchase.
	add_action( 'wp_ajax_wpbooklist_upload_new_stylepak_action', array( $wp_book_list_ajax_functions, 'wpbooklist_upload_new_stylepak_action_callback' ) );

	// For assigning a StylePak to a library.
	add_action( 'wp_ajax_wpbooklist_assign_stylepak_action', array( $wp_book_list_ajax_functions, 'wpbooklist_assign_stylepak_action_callback' ) );

	// For uploading a new Post Template to a library.
	add_action( 'wp_ajax_wpbooklist_upload_new_post_template_action', array( $wp_book_list_ajax_functions, 'wpbooklist_upload_new_post_template_action_callback' ) );

	// For uploading a new Page Template to a library.
	add_action( 'wp_ajax_wpbooklist_upload_new_page_template_action', array( $wp_book_list_ajax_functions, 'wpbooklist_upload_new_page_template_action_callback' ) );

	// For assigning a Post Template to a Post.
	add_action( 'wp_ajax_wpbooklist_assign_post_template_action', array( $wp_book_list_ajax_functions, 'wpbooklist_assign_post_template_action_callback' ) );

	// For assigning a Page Template to a Page.
	add_action( 'wp_ajax_wpbooklist_assign_page_template_action', array( $wp_book_list_ajax_functions, 'wpbooklist_assign_page_template_action_callback' ) );

	// For creating a backup of a Library.
	add_action( 'wp_ajax_wpbooklist_create_db_library_backup_action', array( $wp_book_list_ajax_functions, 'wpbooklist_create_db_library_backup_action_callback' ) );

	// For restoring a backup of a Library.
	add_action( 'wp_ajax_wpbooklist_restore_db_library_backup_action', array( $wp_book_list_ajax_functions, 'wpbooklist_restore_db_library_backup_action_callback' ) );

	// For creating a .csv file of ISBN/ASIN numbers.
	add_action( 'wp_ajax_wpbooklist_create_csv_action', array( $wp_book_list_ajax_functions, 'wpbooklist_create_csv_action_callback' ) );

	// For setting the Amazon Localization.
	add_action( 'wp_ajax_wpbooklist_amazon_localization_action', array( $wp_book_list_ajax_functions, 'wpbooklist_amazon_localization_action_callback' ) );

	// For deleting all books in library.
	add_action( 'wp_ajax_wpbooklist_delete_all_books_in_library_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_all_books_in_library_action_callback' ) );

	// For deleting all books, pages, and posts in library.
	add_action( 'wp_ajax_wpbooklist_delete_all_books_pages_and_posts_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_all_books_pages_and_posts_action_callback' ) );

	// For deleting all checked books.
	add_action( 'wp_ajax_wpbooklist_delete_all_checked_books_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_all_checked_books_action_callback' ) );

	// For dismissing notice.
	add_action( 'wp_ajax_wpbooklist_jre_dismiss_prem_notice_forever_action', array( $wp_book_list_ajax_functions, 'wpbooklist_jre_dismiss_prem_notice_forever_action_callback' ) );

	// For reordering books.
	add_action( 'wp_ajax_wpbooklist_reorder_action', array( $wp_book_list_ajax_functions, 'wpbooklist_reorder_action_callback' ) );

	// For receiving user feedback upon deactivation & deletion.
	add_action( 'wp_ajax_wpbooklist_exit_results_action', array( $wp_book_list_ajax_functions, 'wpbooklist_exit_results_action_callback' ) );

	// For retrieving the WPBookList StoryTime Stories from the server when the 'Select a Category' drop-down changes.
	add_action( 'wp_ajax_wpbooklist_storytime_select_category_action', array( $wp_book_list_ajax_functions, 'wpbooklist_storytime_select_category_action_callback' ) );

	// For retreiving a WPBookList StoryTime Story from the server, once the user has selected one in the reader.
	add_action( 'wp_ajax_wpbooklist_storytime_get_story_action', array( $wp_book_list_ajax_functions, 'wpbooklist_storytime_get_story_action_callback' ) );

	// For expanding the 'Browse Stories' section again once a Story has already been selected.
	add_action( 'wp_ajax_wpbooklist_storytime_expand_browse_action', array( $wp_book_list_ajax_functions, 'wpbooklist_storytime_expand_browse_action_callback' ) );

	// For saving the StoryTime Settings.
	add_action( 'wp_ajax_wpbooklist_storytime_save_settings_action', array( $wp_book_list_ajax_functions, 'wpbooklist_storytime_save_settings_action_callback' ) );

	// For deleting a StoryTime Settings.
	add_action( 'wp_ajax_wpbooklist_delete_story_action', array( $wp_book_list_ajax_functions, 'wpbooklist_delete_story_action_callback' ) );


/* END OF FUNCTIONS FOUND IN CLASS-WPBOOKLIST-AJAX-FUNCTIONS.PHP THAT APPLY PLUGIN-WIDE */

/* FUNCTIONS FOUND IN CLASS-WPBOOKLIST-STORYTIME.PHP THAT APPLY PLUGIN-WIDE */

	// For the admin pages.
	add_action( 'admin_menu', array( $wp_book_list_storytime, 'wpbooklist_jre_storytime_admin_notice' ) );
	// Function that displays StoryTime on the front end.
	add_shortcode( 'wpbooklist_storytime', array( $wp_book_list_storytime, 'wpbooklist_jre_storytime_admin_notice' ) );

/* END OF FUNCTIONS FOUND IN CLASS-WPBOOKLIST-STORYTIME.PHP THAT APPLY PLUGIN-WIDE */




/*
// For admin messages
add_action( 'admin_notices', 'wpbooklist_jre_admin_notice' );

// For admin messages announcing the arrival of a new WPBookList StoryTime Story
add_action( 'admin_notices', 'wpbooklist_jre_storytime_admin_notices' );

// Adding Ajax library
add_action( 'wp_head', 'wpbooklist_jre_prem_add_ajax_library' );

// Adding admin page
add_action( 'admin_menu', 'wpbooklist_jre_my_admin_menu' );

// Registers table names
add_action( 'init', 'wpbooklist_jre_register_table_name', 1 );

// Function to run any code that is needed to modify the plugin between different versions
add_action( 'plugins_loaded', 'wpbooklist_upgrade_function' );

// Handles the popup that appears when the user deactivates WPBookList
add_action( 'admin_footer', 'wpbooklist_exit_survey' );

// Creates tables upon activation
register_activation_hook( __FILE__, 'wpbooklist_jre_create_tables' );



// Adding the general admin css file
add_action( 'admin_enqueue_scripts', 'wpbooklist_jre_plugin_general_admin_style' );

// Adding the admin template css file
add_action( 'admin_enqueue_scripts', 'wpbooklist_jre_plugin_admin_template_style' );

// Adding the posts & pages css file
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_posts_pages_default_style' );

// Adding the front-end library ui css file
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_frontend_library_ui_default_style' );

// Adding the front-end storytime ui css file
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_frontend_storytime_style' );

// Adding Colorbox css file
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_plugin_colorbox_style' );
add_action( 'admin_enqueue_scripts', 'wpbooklist_jre_plugin_colorbox_style' );

// Code for adding the frontend sort/search CSS file
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_plugin_sort_search_style' );

// Adding the form check js file
add_action( 'admin_enqueue_scripts', 'wpbooklist_form_checks_js' );

// Adding the html entities decode js file
//add_action( 'admin_enqueue_scripts', 'wpbooklist_he_js' );

// Adding the jquery masked js file
add_action( 'admin_enqueue_scripts', 'wpbooklist_jquery_masked_input_js' );

// Code for adding the jquery readmore file for text blocks like description and notes
add_action( 'wp_enqueue_scripts', 'wpbooklist_jquery_readmore_js' );

// Adding the front-end library shortcode
add_shortcode( 'wpbooklist_shortcode', 'wpbooklist_jre_plugin_dynamic_shortcode_function' );

// Shortcode that allows a book image to be placed on a page
add_shortcode( 'showbookcover', 'wpbooklist_book_cover_shortcode' );

// Shortcode that displays StoryTime on the frontend
add_shortcode( 'wpbooklist_storytime', 'wpbooklist_storytime_shortcode' );

// Adding colorbox JS file on both front-end and dashboard
add_action( 'admin_enqueue_scripts', 'wpbooklist_jre_plugin_colorbox_script' );
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_plugin_colorbox_script' );

// Adding AddThis sharing JS file
add_action( 'admin_enqueue_scripts', 'wpbooklist_jre_plugin_addthis_script' );
add_action( 'wp_enqueue_scripts', 'wpbooklist_jre_plugin_addthis_script' );

// The function that determines which template to load for WPBookList Pages
add_filter( 'the_content', 'wpbooklist_set_page_post_template' );

// Handles various aestetic functions for the front end
add_action( 'wp_footer', 'wpbooklist_various_aestetic_bits_front_end' );

// Handles various aestetic functions for the back end
add_action( 'admin_footer', 'wpbooklist_various_aestetic_bits_back_end' );

// For validating that a user has become a Patreon Patron for StoryTime
add_action( 'admin_footer', 'wpbooklist_patreon_validate_action_javascript' );

// For simply linking to Patreon
add_action( 'admin_footer', 'wpbooklist_patreon_link_action_javascript' );

// For scrolling the StoryTime content div on arrow clicks
add_action( 'wp_footer', 'wpbooklist_storytime_scroll_action_javascript' );
add_action( 'admin_footer', 'wpbooklist_storytime_scroll_action_javascript' );

// Handles the front-end search stuff, as well as the 'Reset Filters, Sort, and Search' button
add_action( 'wp_footer', 'wpbooklist_library_frontend_search' );

// Handles the front-end 'Sort By' select input
add_action( 'wp_footer', 'wpbooklist_library_frontend_sort_select' );

// Handles the front-end pagination select and left & right buttons
add_action( 'wp_footer', 'wpbooklist_library_frontend_pagination' );

// Handles the front-end 'Filter By' Select inputs
add_action( 'wp_footer', 'wpbooklist_library_frontend_filter_selects' );


// Function for taking Authors from existing Author column, splitting the name up, and adding to the new authorfirst and authorlast columns
//add_action( 'admin_footer', 'wpbooklist_add_author_first_last' );

// For the REST API update for dashboard messages 
add_action( 'rest_api_init', function () {
  register_rest_route( 'wpbooklist/v1', '/notice/(?P<notice>[a-z0-9\-]+)', array(
    'methods' => 'GET',
    'callback' => 'wpbooklist_jre_rest_api_notice',
  ) );
});

// For the REST API update for adding new StoryTime Stories 
add_action( 'rest_api_init', function () {
  register_rest_route( 'wpbooklist/v1', '/storytime', array(
    'methods' => 'POST',
    'callback' => 'wpbooklist_jre_storytime_rest_api_notice',
  ) );
});

// For the REST API for deleting StoryTime Stories 
add_action( 'rest_api_init', function () {
  register_rest_route( 'wpbooklist/v1', '/storytimedelete', array(
    'methods' => 'POST',
    'callback' => 'wpbooklist_jre_storytime_delete_rest_api_notice',
  ) );
});

// For the REST API update for validating patreon
add_action( 'rest_api_init', function () {
  register_rest_route( 'wpbooklist/v1', '/firstkey/(?P<firstkey>[a-z0-9\-]+)/secondkey/(?P<secondkey>[a-z0-9\-]+)', array(
    'methods' => 'GET',
    'callback' => 'wpbooklist_jre_storytime_patreon_validate_rest_api_notice',
  ) );
});

//For dismissing notice
add_action( 'admin_footer', 'wpbooklist_jre_dismiss_prem_notice_forever_action_javascript' ); // Write our JS below here
add_action( 'wp_ajax_wpbooklist_jre_dismiss_prem_notice_forever_action', 'wpbooklist_jre_dismiss_prem_notice_forever_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_jre_dismiss_prem_notice_forever_action', 'wpbooklist_jre_dismiss_prem_notice_forever_action_callback' );

// For adding a book from the admin dashboard
add_action( 'admin_footer', 'wpbooklist_dashboard_add_book_action_javascript' );
add_action( 'wp_ajax_wpbooklist_dashboard_add_book_action', 'wpbooklist_dashboard_add_book_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_dashboard_add_book_action', 'wpbooklist_dashboard_add_book_action_callback' );

// For editing a book from the admin dashboard
add_action( 'admin_footer', 'wpbooklist_edit_book_show_form_action_javascript' );
add_action( 'wp_ajax_wpbooklist_edit_book_show_form_action', 'wpbooklist_edit_book_show_form_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_edit_book_show_form_action', 'wpbooklist_edit_book_show_form_action_callback' );

// For displaying a book in colorbox
add_action( 'admin_footer', 'wpbooklist_show_book_in_colorbox_action_javascript' );
add_action( 'wp_footer', 'wpbooklist_show_book_in_colorbox_action_javascript' );
add_action( 'wp_ajax_wpbooklist_show_book_in_colorbox_action', 'wpbooklist_show_book_in_colorbox_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_show_book_in_colorbox_action', 'wpbooklist_show_book_in_colorbox_action_callback' );

// For creating/deleting custom libraries
add_action( 'admin_footer', 'wpbooklist_new_library_action_javascript' );
add_action( 'wp_ajax_wpbooklist_new_library_action', 'wpbooklist_new_library_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_new_library_action', 'wpbooklist_new_library_action_callback' );

// For saving library display options
add_action( 'admin_footer', 'wpbooklist_dashboard_save_library_display_options_action_javascript' );
add_action( 'wp_ajax_wpbooklist_dashboard_save_library_display_options_action', 'wpbooklist_dashboard_save_library_display_options_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_dashboard_save_library_display_options_action', 'wpbooklist_dashboard_save_library_display_options_action_callback' );

// For saving post display options
add_action( 'admin_footer', 'wpbooklist_dashboard_save_post_display_options_action_javascript' );
add_action( 'wp_ajax_wpbooklist_dashboard_save_post_display_options_action', 'wpbooklist_dashboard_save_post_display_options_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_dashboard_save_post_display_options_action', 'wpbooklist_dashboard_save_post_display_options_action_callback' );

// For saving page display options
add_action( 'admin_footer', 'wpbooklist_dashboard_save_page_display_options_action_javascript' );
add_action( 'wp_ajax_wpbooklist_dashboard_save_page_display_options_action', 'wpbooklist_dashboard_save_page_display_options_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_dashboard_save_page_display_options_action', 'wpbooklist_dashboard_save_page_display_options_action_callback' );

// To update the saved display option checkboxes when drop-down changes
add_action( 'admin_footer', 'wpbooklist_update_display_options_action_javascript' );
add_action( 'wp_ajax_wpbooklist_update_display_options_action', 'wpbooklist_update_display_options_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_update_display_options_action', 'wpbooklist_update_display_options_action_callback' );

// For handling the pagination of the 'Edit & Delete Books' tab
add_action( 'admin_footer', 'wpbooklist_edit_book_pagination_action_javascript' );
add_action( 'wp_ajax_wpbooklist_edit_book_pagination_action', 'wpbooklist_edit_book_pagination_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_edit_book_pagination_action', 'wpbooklist_edit_book_pagination_action_callback' );

// For switching libraries on the 'Edit & Delete Books' tab
add_action( 'admin_footer', 'wpbooklist_edit_book_switch_lib_action_javascript' );
add_action( 'wp_ajax_wpbooklist_edit_book_switch_lib_action', 'wpbooklist_edit_book_switch_lib_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_edit_book_switch_lib_action', 'wpbooklist_edit_book_switch_lib_action_callback' );

// For searching for a title to edit
add_action( 'admin_footer', 'wpbooklist_edit_book_search_action_javascript' );
add_action( 'wp_ajax_wpbooklist_edit_book_search_action', 'wpbooklist_edit_book_search_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_edit_book_search_action', 'wpbooklist_edit_book_search_action_callback' );

// For the saving of edits to existing books
add_action( 'admin_footer', 'wpbooklist_edit_book_actual_action_javascript' );
add_action( 'wp_ajax_wpbooklist_edit_book_actual_action', 'wpbooklist_edit_book_actual_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_edit_book_actual_action', 'wpbooklist_edit_book_actual_action_callback' );

// For deleting a book
add_action( 'admin_footer', 'wpbooklist_delete_book_action_javascript' );
add_action( 'wp_ajax_wpbooklist_delete_book_action', 'wpbooklist_delete_book_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_delete_book_action', 'wpbooklist_delete_book_action_callback' );

// For saving a user's own API keys
add_action( 'admin_footer', 'wpbooklist_user_apis_action_javascript' );
add_action( 'wp_ajax_wpbooklist_user_apis_action', 'wpbooklist_user_apis_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_user_apis_action', 'wpbooklist_user_apis_action_callback' );

// For uploading a new StylePak after purchase
add_action( 'admin_footer', 'wpbooklist_upload_new_stylepak_action_javascript' );
add_action( 'wp_ajax_wpbooklist_upload_new_stylepak_action', 'wpbooklist_upload_new_stylepak_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_upload_new_stylepak_action', 'wpbooklist_upload_new_stylepak_action_callback' );

// For uploading a new post StylePak after purchase
add_action( 'admin_footer', 'wpbooklist_upload_new_post_template_action_javascript' );
add_action( 'wp_ajax_wpbooklist_upload_new_post_template_action', 'wpbooklist_upload_new_post_template_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_upload_new_post_template_action', 'wpbooklist_upload_new_post_template_action_callback' );

// For uploading a new page StylePak after purchase
add_action( 'admin_footer', 'wpbooklist_upload_new_page_template_action_javascript' );
add_action( 'wp_ajax_wpbooklist_upload_new_page_template_action', 'wpbooklist_upload_new_page_template_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_upload_new_page_template_action', 'wpbooklist_upload_new_page_template_action_callback' );

// For creating a backup of a Library
add_action( 'admin_footer', 'wpbooklist_create_db_library_backup_action_javascript' );
add_action( 'wp_ajax_wpbooklist_create_db_library_backup_action', 'wpbooklist_create_db_library_backup_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_create_db_library_backup_action', 'wpbooklist_create_db_library_backup_action_callback' );

// For restoring a backup of a Library
add_action( 'admin_footer', 'wpbooklist_restore_db_library_backup_action_javascript' );
add_action( 'wp_ajax_wpbooklist_restore_db_library_backup_action', 'wpbooklist_restore_db_library_backup_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_restore_db_library_backup_action', 'wpbooklist_restore_db_library_backup_action_callback' );

// For creating a .csv file of ISBN/ASIN numbers
add_action( 'admin_footer', 'wpbooklist_create_csv_action_javascript' );
add_action( 'wp_ajax_wpbooklist_create_csv_action', 'wpbooklist_create_csv_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_create_csv_action', 'wpbooklist_create_csv_action_callback' );

// For setting the Amazon Localization
add_action( 'admin_footer', 'wpbooklist_amazon_localization_action_javascript' );
add_action( 'wp_ajax_wpbooklist_amazon_localization_action', 'wpbooklist_amazon_localization_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_amazon_localization_action', 'wpbooklist_amazon_localization_action_callback' );

// For bulk-deleting books
add_action( 'admin_footer', 'wpbooklist_delete_book_bulk_action_javascript' );
add_action( 'wp_ajax_wpbooklist_delete_book_bulk_action', 'wpbooklist_delete_book_bulk_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_delete_book_bulk_action', 'wpbooklist_delete_book_bulk_action_callback' );

// For reordering books
add_action( 'admin_footer', 'wpbooklist_reorder_action_javascript' );
add_action( 'wp_ajax_wpbooklist_reorder_action', 'wpbooklist_reorder_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_reorder_action', 'wpbooklist_reorder_action_callback' );

// For recieving user feedback upon deactivation & deletion
add_action( 'admin_footer', 'wpbooklist_exit_results_action_javascript' );
add_action( 'wp_ajax_wpbooklist_exit_results_action', 'wpbooklist_exit_results_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_exit_results_action', 'wpbooklist_exit_results_action_callback' );

// For retrieving the WPBookList StoryTime Stories from the server when the 'Select a Category' drop-down changes.
add_action( 'wp_footer', 'wpbooklist_storytime_select_category_action_javascript' );
add_action( 'admin_footer', 'wpbooklist_storytime_select_category_action_javascript' );
add_action( 'wp_ajax_wpbooklist_storytime_select_category_action', 'wpbooklist_storytime_select_category_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_storytime_select_category_action', 'wpbooklist_storytime_select_category_action_callback' );

// For retreiving a WPBookList StoryTime Story from the server, once the user has selected one in the reader
add_action( 'wp_footer', 'wpbooklist_storytime_get_story_action_javascript' );
add_action( 'admin_footer', 'wpbooklist_storytime_get_story_action_javascript' );
add_action( 'wp_ajax_wpbooklist_storytime_get_story_action', 'wpbooklist_storytime_get_story_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_storytime_get_story_action', 'wpbooklist_storytime_get_story_action_callback' );

// For expanding the 'Browse Stories' section again once a Story has already been selected
add_action( 'wp_footer', 'wpbooklist_storytime_expand_browse_action_javascript' );
add_action( 'admin_footer', 'wpbooklist_storytime_expand_browse_action_javascript' );
add_action( 'wp_ajax_wpbooklist_storytime_expand_browse_action', 'wpbooklist_storytime_expand_browse_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_storytime_expand_browse_action', 'wpbooklist_storytime_expand_browse_action_callback' );

// For saving the StoryTime Settings
add_action( 'admin_footer', 'wpbooklist_storytime_save_settings_action_javascript' );
add_action( 'wp_ajax_wpbooklist_storytime_save_settings_action', 'wpbooklist_storytime_save_settings_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_storytime_save_settings_action', 'wpbooklist_storytime_save_settings_action_callback' );

// For deleting a Story
add_action( 'admin_footer', 'wpbooklist_delete_story_action_javascript' );
add_action( 'wp_ajax_wpbooklist_delete_story_action', 'wpbooklist_delete_story_action_callback' );
add_action( 'wp_ajax_nopriv_wpbooklist_delete_story_action', 'wpbooklist_delete_story_action_callback' );
*/

