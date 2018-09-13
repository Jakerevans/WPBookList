<?php
/**
 * Class WPBookList_Compat_Functions - class-wpbooklist-compat-functions.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes/Compat
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Compat_Functions', false ) ) :
	/**
	 * WPBookList_Compat_Functions class. Here we'll run functions that make older versions of WPBookList compatible with newest version
	 */
	class WPBookList_Compat_Functions {


		/** Common member variable
		 *
		 *  @var string $this->version
		 */
		public $version = '';

		/**
		 *  Simply sets the version number for the class
		 */
		public function __construct() {

			// Get current version #.
			global $wpdb;
			$table_name    = $wpdb->prefix . 'wpbooklist_jre_user_options';
			$row           = $wpdb->get_row( "SELECT * FROM $table_name" );
			$this->version = $row->version;

			// Now call all the functions to make updates.
			$this->wpbooklist_upgrade_modify_user_options_table();
			$this->wpbooklist_upgrade_modify_page_options_table();
			$this->wpbooklist_upgrade_modify_post_options_table();
			$this->wpbooklist_upgrade_modify_default_table();
			$this->wpbooklist_upgrade_modify_custom_libs_books_and_settings_tables();
			$this->wpbooklist_upgrade_modify_add_storytime_table();
			$this->wpbooklist_upgrade_modify_add_storytime_settings_table();
			$this->wpbooklist_upgrade_change_admin_message();
			$this->wpbooklist_add_author_first_last_default_table();
			$this->wpbooklist_add_author_first_last_dynamic_table();

			// Now call the function that will update the version number, which will ensure none of these function ever run again until the next update/upgrade.
			$this->wpbooklist_update_version_number_function();

		}

		/**
		 *  Function that modifies the wpbooklist_jre_user_options table as needed.
		 */
		public function wpbooklist_upgrade_modify_user_options_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

				// ADD COLUMNS TO THE 'wpbooklist_jre_user_options' TABLE.
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'activeposttemplate'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD activeposttemplate varchar( 255 ) NOT NULL DEFAULT 'default'" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'activepagetemplate'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD activepagetemplate varchar( 255 ) NOT NULL DEFAULT 'default'" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidekindleprev'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidekindleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidegoogleprev'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidegoogleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidekobopurchase'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidekobopurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidebampurchase'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidebampurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidesubject'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidesubject bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidecountry'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidecountry bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidefilter'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidefilter bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidefinishedsort'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidefinishedsort bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidesignedsort'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidesignedsort bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidefirstsort'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidefirstsort bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'hidesubjectsort'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD hidesubjectsort bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'patreonaccess'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD patreonaccess varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'patreonrefresh'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD patreonrefresh varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name` LIKE 'patreonack'" ) ) {
					$wpdb->query( 0 === "ALTER TABLE $table_name ADD patreonack bigint(255)" );
				}
			}
		}

		/**
		 *  Function that modifies the wpbooklist_jre_page_options table as needed.
		 */
		public function wpbooklist_upgrade_modify_page_options_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// ADD COLUMNS TO THE 'wpbooklist_jre_page_options' TABLE.
				$table_name_page_options = $wpdb->prefix . 'wpbooklist_jre_page_options';
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidekindleprev'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidekindleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidegoogleprev'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidegoogleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidekobopurchase'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidekobopurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidebampurchase'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidebampurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidesubject'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidesubject bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidecountry'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidecountry bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_page_options` LIKE 'hidefilter'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_page_options ADD hidefilter bigint(255)" );
				}

			}
		}

		/**
		 *  Function that modifies the wpbooklist_jre_post_options table as needed.
		 */
		public function wpbooklist_upgrade_modify_post_options_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// ADD COLUMNS TO THE 'wpbooklist_jre_post_options' TABLE.
				$table_name_post_options = $wpdb->prefix . 'wpbooklist_jre_post_options';
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidekindleprev'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidekindleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidegoogleprev'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidegoogleprev bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidekobopurchase'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidekobopurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidebampurchase'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidebampurchase bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidesubject'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidesubject bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidecountry'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidecountry bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_post_options` LIKE 'hidefilter'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_post_options ADD hidefilter bigint(255)" );
				}

			}
		}

		/**
		 *  Function that modifies the wpbooklist_jre_saved_book_log table as needed.
		 */
		public function wpbooklist_upgrade_modify_default_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// Add columns to the default WPBookList table, if they don't exist.
				$table_name_default = $wpdb->prefix . 'wpbooklist_jre_saved_book_log';
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'subject'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD subject varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'country'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD country varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'woocommerce'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD woocommerce varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'kobo_link'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD kobo_link varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'bam_link'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD bam_link varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'bn_link'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD bn_link varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'lendstatus'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD lendstatus varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'currentlendemail'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD currentlendemail varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'currentlendname'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD currentlendname varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'lendable'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD lendable varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'copies'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD copies bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'copieschecked'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD copieschecked bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'lendedon'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD lendedon bigint(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'authorfirst'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD authorfirst varchar(255)" );
				}
				if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table_name_default` LIKE 'authorlast'" ) ) {
					$wpdb->query( "ALTER TABLE $table_name_default ADD authorlast varchar(255)" );
				}

				// Modify the ISBN column in the default library to be varchar, which will allow the storage of ASIN numbers.
				$wpdb->query( "ALTER TABLE $table_name_default MODIFY isbn varchar( 190 )" );

			}
		}

		/**
		 *  Function that modifies existing custom libraries - both the book data and the settings data.
		 */
		public function wpbooklist_upgrade_modify_custom_libs_books_and_settings_tables() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// Modify any existing custom libraries - both the book data and the settings data.
				$table_dyna = $wpdb->prefix . "wpbooklist_jre_list_dynamic_db_names";
				$user_created_tables = $wpdb->get_results( "SELECT * FROM $table_dyna" );
				foreach ( $user_created_tables as $utable ) {

					$table = $wpdb->prefix . "wpbooklist_jre_" . $utable->user_table_name;

					// This is how we get the column type.
					$result = $wpdb->get_row( "SHOW COLUMNS FROM `$table` LIKE 'isbn'" );
					if ( 'varchar(190)' !== $result->Type ) {
						$wpdb->query( "ALTER TABLE $table MODIFY isbn varchar( 190 )" );
					}

					// Add WooCommerce column.
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'woocommerce'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD woocommerce varchar(255)" );
					}

					// Add additional columns that may not be there already.
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'kobo_link'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD kobo_link varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'bam_link'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD bam_link varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'bn_link'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD bn_link varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'lendstatus'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD lendstatus varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'currentlendemail'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD currentlendemail varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'currentlendname'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD currentlendname varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'lendable'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD lendable varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'copies'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD copies bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'copieschecked'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD copieschecked bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'lendedon'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD lendedon bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'subject'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD subject varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'country'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD country varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'authorfirst'" ) ) {
					$wpdb->query( "ALTER TABLE $table ADD authorfirst varchar(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'authorlast'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD authorlast varchar(255)" );
					}

					// Now begin modifying the custom library's settings tables.
					$table = $wpdb->prefix . "wpbooklist_jre_settings_" . $utable->user_table_name;
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'activeposttemplate'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD activeposttemplate varchar( 255 ) NOT NULL DEFAULT 'default'" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'activepagetemplate'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD activepagetemplate varchar( 255 ) NOT NULL DEFAULT 'default'" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidekindleprev'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidekindleprev bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidegoogleprev'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidegoogleprev bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidekobopurchase'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidekobopurchase bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidebampurchase'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidebampurchase bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidesubject'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidesubject bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidecountry'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidecountry bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidefilter'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidefilter bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidefinishedsort'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidefinishedsort bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidesignedsort'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidesignedsort bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidefirstsort'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidefirstsort bigint(255)" );
					}
					if ( $wpdb->query( 0 === "SHOW COLUMNS FROM `$table` LIKE 'hidesubjectsort'" ) ) {
						$wpdb->query( "ALTER TABLE $table ADD hidesubjectsort bigint(255)" );
					}
				}
			}
		}


		/**
		 *  Function that adds the StoryTime table, introduced in 5.7.0
		 */
		public function wpbooklist_upgrade_modify_add_storytime_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// Add the StoryTime table, introduced in 5.7.0.
				$storytime_table_name = $wpdb->prefix . 'wpbooklist_jre_storytime_stories';
				if ( $storytime_table_name !== $wpdb->get_var("SHOW TABLES LIKE '$storytime_table_name'") ) {

					// Include everything needed to add a table, and register the table name.
					global $charset_collate;
					require_once ABSPATH . 'wp-admin/includes/upgrade.php';
					$wpdb->wpbooklist_jre_storytime_stories = "{$wpdb->prefix}wpbooklist_jre_storytime_stories";

					// Add the StoryTime table.
					$sql_create_table10 = "CREATE TABLE {$wpdb->wpbooklist_jre_storytime_stories} 
					(
						ID bigint(190) auto_increment,
						providername varchar(190),
						providerimg varchar(255),
						providerbio MEDIUMTEXT,
						content LONGTEXT,
						title varchar(255),
						category varchar(255),
						pageid bigint(255),
						postid bigint(255),
						storydate bigint(255),
						PRIMARY KEY  (ID),
						 KEY providername (providername)
					) $charset_collate; ";
					dbDelta( $sql_create_table10 );

					require_once CLASS_STORYTIME_DIR . 'class-storytime.php';
					$storytime_class = new WPBookList_Storytime( 'install' );
				}
			}
		}

		/**
		 *  Function that adds the StoryTime Settings table, introduced in 5.7.0
		 */
		public function wpbooklist_upgrade_modify_add_storytime_settings_table() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				// Add the StoryTime Settings table, introduced in 5.7.0.
				$storytime_settings_table_name = $wpdb->prefix . 'wpbooklist_jre_storytime_stories_settings';
				if ( $storytime_settings_table_name !== $wpdb->get_var("SHOW TABLES LIKE '$storytime_settings_table_name'") ) {

					// Include everything needed to add a table, and register the table name.
					global $charset_collate;
					require_once ABSPATH . 'wp-admin/includes/upgrade.php';
					$wpdb->wpbooklist_jre_storytime_stories_settings = "{$wpdb->prefix}wpbooklist_jre_storytime_stories_settings";

					// Add the StoryTime settings table.
					$sql_create_table11 = "CREATE TABLE {$wpdb->wpbooklist_jre_storytime_stories_settings} 
					(
						ID bigint(190) auto_increment,
						getstories bigint(255),
						createpost bigint(255),
						createpage bigint(255),
						storypersist bigint(255),
						deletedefault bigint(255),
						notifydismiss bigint(255) NOT NULL DEFAULT 1,
						newnotify bigint(255) NOT NULL DEFAULT 1,
						notifymessage MEDIUMTEXT,
						storytimestylepak varchar(255) NOT NULL DEFAULT 'default',
						PRIMARY KEY  (ID),
						 KEY getstories (getstories)
					) $charset_collate; ";
					dbDelta( $sql_create_table11 );

					// Insert the row.
					$table_name = $wpdb->prefix . 'wpbooklist_jre_storytime_stories_settings';
					$wpdb->insert( $table_name, array( 'ID' => 1 ) );
				}
			}
		}


		/**
		 *  Function that updates the Admin message if needed
		 */
		public function wpbooklist_upgrade_change_admin_message() {

			global $wpdb;

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

				// Update admin message.
				$data = array(
					'adminmessage' => 'aladivaholeidanequaladqwpbooklistdashnoticedashholderadqaraaholeaholealaaaholehrefanequaladqhttpsacoaslashaslashwpbooklistdotcomaslashadqaraaholeaholeaholeaholealaimgaholewidthanequaladq100ampersandpercntascadqaholesrcanequaladqhttpsacoaslashaslashwpbooklistdotcomaslashwpdashcontentaslashuploadsaslash2018aslash01aslashScreenshotdash2018dash01dash25dash18dot35dot59dash5dotpngadqaslasharaaholeaholealaaslashaaraaholeaholealadivaholeclassanequaladqwpbooklistdashmydashnoticedashdismissdashforeveradqaholeidanequaladqwpbooklistdashmydashnoticedashdismissdashforeverdashgeneraladqaraDismissaholeForeveralaaslashdivaraaholeaholealabuttonaholetypeanequaladqbuttonadqaholeclassanequaladqnoticedashdismissadqaraaholeaholeaholeaholealaspanaholeclassanequaladqscreendashreaderdashtextadqaraDismissaholethisaholenoticealaaslashspanaraaholeaholealaaslashbuttonaraalaaslashdivaraalabuttonaholetypeanequaladqbuttonadqaholeclassanequaladqnoticedashdismissadqaraalaspanaholeclassanequaladqscreendashreaderdashtextadqaraDismissaholethisaholenoticedotalaaslashspanaraalaaslashbuttonara',
				);
				$format       = array( '%s' );
				$where        = array( 'ID' => 1 );
				$where_format = array( '%d' );
				$wpdb->update( $table_name, $data, $where, $format, $where_format );

			}
		}


		/**
		 *  Function for taking Authors from existing Author column, splitting the name up, and adding to the new authorfirst and authorlast columns in the default table.
		 */
		public function wpbooklist_add_author_first_last_default_table() {

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {
				global $wpdb;

				// Modifying the default WPBookList table First, then any possible user-created dynamic tables.
				$table_name_default = $wpdb->prefix . 'wpbooklist_jre_saved_book_log';

				// If the two new Author columns do exist...
				if ( 0 !== $wpdb->query( "SHOW COLUMNS FROM `$table_name_default` LIKE 'authorfirst'" ) && 0 !== $wpdb->query("SHOW COLUMNS FROM `$table_name_default` LIKE 'authorlast'") ) {

					$book_array = $wpdb->get_results( "SELECT * FROM $table_name_default" );
					$nonamearray = array();
					foreach ( $book_array as $key => $value ) {

						// Building array of titles to look for in author's names.
						$title_array = array(
							'Jr.',
							'Ph.D.',
							'Mr.',
							'Mrs.',
						);

						$origauthorname  = $value->author;
						$title           = '';
						$finallastnames  = '';
						$finalfirstnames = '';

						// First let's handle names with commas, which we'll assume indicates multiple authors.
						if ( false !== strpos( $origauthorname, ',' ) && '' === $finallastnames && '' === $finalfirstnames ) {

							$origauthorcommaarray = explode( ',', $origauthorname );
							$lastnamecolonstring  = '';
							$firstnamecolonstring = '';

							foreach ( $origauthorcommaarray as $key2 => $individual ) {

								// First let's remove troublesome things like Ph.D., Jr., etc, and save them to be added back to end of the name.
								foreach ( $title_array as $titlekey => $titlevalue ) {
									if( false !== stripos( $individual, $titlevalue ) ) {
										$individual = str_replace( $titlevalue, '', $individual );
										$individual = rtrim( $individual, ' ' );
										$title = $titlevalue;
									}
								}

								// Explode by last space in name.
								$firstname = implode(' ', explode( ' ', $individual, -1 ) );
								$temp = explode( ' ', strrev( $individual ), 2 );
								$lastname = strrev( $temp[0] );

								$lastnamecolonstring = $lastnamecolonstring.';'.$lastname;

								if( '' !== $title && null !== $title ) {
									$firstnamecolonstring = $firstnamecolonstring . ';' . $firstname . ' ' . $title;
								} else {
									$firstnamecolonstring = $firstnamecolonstring . ';' . $firstname;
								}
							}

							// Trim left spaces and ;.
							$lastnamecolonstring = ltrim( $lastnamecolonstring, ' ' );
							$lastnamecolonstring = ltrim( $lastnamecolonstring, ';' );

							// Trim left spaces and ;.
							$firstnamecolonstring = ltrim( $firstnamecolonstring, ' ' );
							$firstnamecolonstring = ltrim( $firstnamecolonstring, ';' );

							// Now build finalfirstname and finallastname string for the two new db columns.
							$finallastnames  = $lastnamecolonstring;
							$finalfirstnames = $firstnamecolonstring;
						}

						// Next we'll handle the names of single authors who may have a title in their name.
						foreach ( $title_array as $titlekey => $titlevalue ) {

							// If author name has a title in it, and does not have a comma (indicating multiple authors), then proceed.
							if ( ( '' === $finallastnames || null === $finallastnames ) && ( '' === $finalfirstnames || null === $finalfirstnames ) && false !== stripos( $origauthorname, $titlevalue ) && false === stripos( $origauthorname, ',' ) ) {
								$tempname = str_replace( $titlevalue, '', $origauthorname );
								$tempname = rtrim( $tempname, ' ' );
								$title    = $titlevalue;

								// Now split up first/last names.
								$finalfirstnames = implode( ' ', explode( ' ', $tempname, -1 ) ) . ' ' . $titlevalue;
								$temp            = explode( ' ', strrev( $tempname ), 2 );
								$finallastnames  = strrev( $temp[0] );
							}
						}

						// Now if the Author's name does not contain a comma or a title...
						foreach ( $title_array as $titlekey => $titlevalue ) {
							// If author name does not have a title in it, and does not have a comma (indicating multiple authors), then proceed.
							if ( ( '' === $finallastnames || null === $finallastnames ) && ( '' === $finalfirstnames || null === $finalfirstnames ) && false === stripos( $origauthorname, $titlevalue ) && false === stripos( $origauthorname, ',' ) ) {

								// Now split up first/last names.
								$finalfirstnames = implode( ' ', explode( ' ', $origauthorname, -1 ) );
								$temp            = explode( ' ', strrev( $origauthorname ), 2 );
								$finallastnames  = strrev( $temp[0] );
							}
						}

						// Now update every row in the default table with our new author first name and author last name values.
						$data = array(
							'authorfirst' => $finalfirstnames,
							'authorlast'  => $finallastnames,
						);

						$format              = array( '%s', '%s' );
						$where               = array( 'ID' => $value->ID );
						$where_format        = array( '%d' );
						$admin_notice_result = $wpdb->update( $table_name_default, $data, $where, $format, $where_format );

					}
				}
			}
		}

		/**
		 *  Function for taking Authors from existing Author column, splitting the name up, and adding to the new authorfirst and authorlast columns in all dynamic, user-created tables.
		 */
		public function wpbooklist_add_author_first_last_dynamic_table() {

			global $wpdb;

			// Modify any existing custom libraries - both the book data and the settings data.
			$table_dyna          = $wpdb->prefix . "wpbooklist_jre_list_dynamic_db_names";
			$user_created_tables = $wpdb->get_results( "SELECT * FROM $table_dyna" );
			foreach ( $user_created_tables as $utable ) {

				// If version number does not match the current version number found in wpbooklist.php.
				if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

					// Modifying the default WPBookList table First, then any possible user-created dynamic tables.
					$table_name_default = $wpdb->prefix . "wpbooklist_jre_" . $utable->user_table_name;

					// If the two new Author columns do exist...
					if ( 0 !== $wpdb->query( "SHOW COLUMNS FROM `$table_name_default` LIKE 'authorfirst'" ) && 0 !== $wpdb->query( "SHOW COLUMNS FROM `$table_name_default` LIKE 'authorlast'" ) ) {

						$book_array = $wpdb->get_results( "SELECT * FROM $table_name_default" );
						$nonamearray = array();
						foreach ( $book_array as $key => $value ) {
							// Building array of titles to look for in author's names.
							$title_array = array(
								'Jr.',
								'Ph.D.',
								'Mr.',
								'Mrs.',
							);

							$origauthorname  = $value->author;
							$title           = '';
							$finallastnames  = '';
							$finalfirstnames = '';

							// First let's handle names with commas, which we'll assume indicates multiple authors.
							if ( false !== strpos( $origauthorname, ',' ) && ( '' === $finallastnames || null === $finallastnames ) && ( '' === $finalfirstnames || null === $finalfirstnames ) ) {
								$origauthorcommaarray = explode( ',', $origauthorname );

								$lastnamecolonstring  = '';
								$firstnamecolonstring = '';

								foreach ( $origauthorcommaarray as $key2 => $individual ) {

									// First let's remove troublesome things like Ph.D., Jr., etc, and save them to be added back to end of the name.
									foreach ( $title_array as $titlekey => $titlevalue ) {
										if ( false !== stripos( $individual, $titlevalue ) ) {
											$individual = str_replace( $titlevalue, '', $individual );
											$individual = rtrim( $individual, ' ' );
											$title      = $titlevalue;
										}
									}

									// Explode by last space in name.
									$firstname = implode( ' ', explode( ' ', $individual, -1 ) );
									$temp      = explode( ' ', strrev( $individual ), 2 );
									$lastname  = strrev( $temp[0] );

									$lastnamecolonstring = $lastnamecolonstring . ';' . $lastname;

									if ( '' !== $title && null !== $title ) {
										$firstnamecolonstring = $firstnamecolonstring . ';' . $firstname . ' ' . $title;
									} else {
										$firstnamecolonstring = $firstnamecolonstring . ';' . $firstname;
									}
								}

								// Trim left spaces and ;.
								$lastnamecolonstring = ltrim( $lastnamecolonstring, ' ' );
								$lastnamecolonstring = ltrim( $lastnamecolonstring, ';' );

								// Trim left spaces and ;.
								$firstnamecolonstring = ltrim( $firstnamecolonstring, ' ' );
								$firstnamecolonstring = ltrim( $firstnamecolonstring, ';' );

								// Now build finalfirstname and finallastname string for the two new db columns.
								$finallastnames  = $lastnamecolonstring;
								$finalfirstnames = $firstnamecolonstring;
							}

							// Next we'll handle the names of single authors who may have a title in their name.
							foreach ( $title_array as $titlekey => $titlevalue ) {

								// If author name has a title in it, and does not have a comma (indicating multiple authors), then proceed.
								if ( ( '' === $finallastnames || null === $finallastnames ) && ( '' === $finalfirstnames || null === $finalfirstnames ) && false !== stripos( $origauthorname, $titlevalue ) && false === stripos( $origauthorname, ',' ) ) {
									$tempname = str_replace( $titlevalue, '', $origauthorname );
									$tempname = rtrim( $tempname, ' ' );
									$title    = $titlevalue;

									// Now split up first/last names.
									$finalfirstnames = implode( ' ', explode( ' ', $tempname, -1 ) ) . ' ' . $titlevalue;
									$temp            = explode( ' ', strrev( $tempname ), 2 );
									$finallastnames  = strrev( $temp[0] );
								}
							}

							// Now if the Author's name does not contain a comma or a title...
							foreach ( $title_array as $titlekey => $titlevalue ) {
								// If author name does not have a title in it, and does not have a comma (indicating multiple authors), then proceed.
								if ( ( '' === $finallastnames || null === $finallastnames ) && ( '' === $finalfirstnames || null === $finalfirstnames ) && false === stripos( $origauthorname, $titlevalue ) && false === stripos( $origauthorname, ',' ) ) {

									// Now split up first/last names.
									$finalfirstnames = implode( ' ', explode( ' ', $origauthorname, -1 ) );
									$temp            = explode( ' ', strrev( $origauthorname ), 2 );
									$finallastnames  = strrev( $temp[0] );
								}
							}

							// Now update every row in the default table with our new author first name and author last name values.
							$data = array(
								'authorfirst' => $finalfirstnames,
								'authorlast'  => $finallastnames,
							);

							$format              = array( '%s', '%s' );
							$where               = array( 'ID' => $value->ID );
							$where_format        = array( '%d' );
							$admin_notice_result = $wpdb->update( $table_name_default, $data, $where, $format, $where_format );

						}
					}
				}
			}
		}

		/**
		 *  Function to update the version number.
		 */
		public function wpbooklist_update_version_number_function() {

			// If version number does not match the current version number found in wpbooklist.php.
			if ( WPBOOKLIST_VERSION_NUM !== $this->version ) {

				global $wpdb;
				$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

				// Update verison number.
				$data = array(
					'version' => WPBOOKLIST_VERSION_NUM,
				);

				$format       = array( '%s' );
				$where        = array( 'ID' => 1 );
				$where_format = array( '%d' );
				$wpdb->update( $table_name, $data, $where, $format, $where_format );
			}
		}
	}
endif;