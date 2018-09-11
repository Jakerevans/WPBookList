<?php
/**
 * WPBookList Backup Settings Form Tab Class
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Backup_Settings_Form', false ) ) :
	/**
	 * WPBookList_Admin_Menu Class.
	 */
	class WPBookList_Backup_Settings_Form {

		/**
		 * Class Constructor - Simply calls the Translations
		 */
		public function __construct() {

			// Get Translations.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->trans = new WPBookList_Translations();
			$this->trans->trans_strings();

			// Require the Transients file.
			require_once CLASS_TRANSIENTS_DIR . 'class-wpbooklist-transients.php';
			$this->transients = new WPBookList_Transients();
		}

		/**
		 * Outputs the Backup Form.
		 */
		public function output_backup_settings_form() {
			global $wpdb;

			$table_name = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$transient_name   = 'wpbl_' . md5( 'SELECT * FROM ' . $table_name );
			$transient_exists = $this->transients->existing_transient_check( $transient_name );
			if ( $transient_exists ) {
				$db_row = $transient_exists;
			} else {
				$query                 = 'SELECT * FROM ' . $table_name;
				$db_row = $this->transients->create_transient( $transient_name, 'wpdb->get_results', $query, MONTH_IN_SECONDS );
			}

			$string1 = '<div id="wpbooklist-backup-settings-container">
							<p>' . $this->trans->trans_56 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_57 . '</span> ' . $this->trans->trans_58 . '</p>';

			$string2 = '<div id="wpbooklist-backup-select-library-label" for="wpbooklist-backup-select-library">' . $this->trans->trans_59 . '</div>
						<select class="wpbooklist-backup-select-default" id="wpbooklist-backup-select-library">
							<option selected disabled value="' . $this->trans->trans_60 . '...">' . $this->trans->trans_60 . '...</option>
							<option value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option> ';

			$string3 = '';
			foreach ( $db_row as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$string3 = $string3 . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}

			$string4 = '</select>
						<button disabled id="wpbooklist-apply-library-backup">' . $this->trans->trans_62 . '</button>
						<div class="wpbooklist-spinner" id="wpbooklist-spinner-backup"></div>';

			$string5 = '<p>' . $this->trans->trans_63 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_57 . '</span> ' . $this->trans->trans_64 . '</p>
			<div id="wpbooklist-backup-select-library-label">' . $this->trans->trans_65 . ':</div>
							<select id="wpbooklist-select-library-backup">	
								<option selected disabled>' . $this->trans->trans_65 . '...</option>
								<option value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option>';

			$string6 = '';
			foreach ( $db_row as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$string6 = $string6 . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}

			$string7 = '</select>';

			$string8 = '<div id="wpbooklist-backup-select-library-label">Select a Backup:</div>
							<select disabled id="wpbooklist-select-actual-backup">	
								<option selected disabled>' . $this->trans->trans_66 . '...</option>';

			$string9 = '';
			foreach ( glob( LIBRARY_DB_BACKUPS_UPLOAD_DIR . '*.sql' ) as $filename ) {

				// Exclude the csv/txt files.
				if ( false === strpos( $filename, 'isbn_asin' ) ) {
					$filename     = basename( $filename );
					$display_name = explode( '_-_', $filename );
					$string9      = $string9 . '<option class="wpbooklist-backup-actual-option" data-table="' . $display_name[0] . '" id="' . $filename . '" value="' . $filename . '">' . $display_name[1] . ' - ' . date( 'h:i a', intval( $display_name[2] ) ) . '</option>';
				}
			}

			$string10 = '</select>
						 <button disabled id="wpbooklist-apply-library-restore">' . $this->trans->trans_67 . '</button>
						 <div class="wpbooklist-spinner" id="wpbooklist-spinner-restore-backup"></div>';

			$string11 = '<div id="wpbooklist-backup-create-csv-div">
							<p>' . $this->trans->trans_68 . ' <span class="wpbooklist-color-orange-italic"><a href="https://wpbooklist.com/index.php/downloads/bulk-upload-extension/">' . $this->trans->trans_69 . '!</a></span> ' . $this->trans->trans_70 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_57 . '</span> ' . $this->trans->trans_71 . '.</p>
							<select class="wpbooklist-backup-csv-select-default" id="wpbooklist-backup-csv-select-library">
								<option selected disabled value="' . $this->trans->trans_60 . '...">' . $this->trans->trans_60 . '...</option>
								<option value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option>' . $string3 . '</select>
						<button disabled id="wpbooklist-apply-library-backup-csv">' . $this->trans->trans_72 . '</button>
						<div class="wpbooklist-spinner" id="wpbooklist-spinner-backup-csv"></div></div>';

			$string12 = '<div id="wpbooklist-addbackup-success-div"></div></div>';

			echo $string1 . $string2 . $string3 . $string4 . $string5 . $string6 . $string7 . $string8 . $string9 . $string10 . $string11 . $string12;

		}


	}

endif;
