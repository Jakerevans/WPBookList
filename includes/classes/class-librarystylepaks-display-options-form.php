<?php
/**
 * WPBookList LibraryStylePaks Display Options Form Tab Class - class-librarystylepaks-display-options-form.php.
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_LibraryStylePaks_Display_Options_Form', false ) ) :
	/**
	 * WPBookList_Admin_Menu Class.
	 **/
	class WPBookList_LibraryStylePaks_Display_Options_Form {

		/**
		 * Class Constructor - Simply calls the Translations
		 */
		public function __construct() {

			// Get Translations.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->trans = new WPBookList_Translations();
			$this->trans->trans_strings();

		}


		/**
		 * Outputs all HTML elements on the page .
		 */
		public function output_add_edit_form() {
			global $wpdb;

			$table_name = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$db_row     = $wpdb->get_results( "SELECT * FROM $table_name" );

			$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';
			$default    = $wpdb->get_row( "SELECT * FROM $table_name" );

			if ( null === $default->stylepak || 'Default StylePak' === $default->stylepak ) {
				$default->stylepak = 'Default StylePak';
			}

			$string_table = '<div id="wpbooklist-stylepak-table-container">
								<table>
									<tr id="wpbooklist-stylepak-heading-row">
										<th>
											<img class="wpbooklist-stylepak-heading-img" src="' . ROOT_IMG_ICONS_URL . 'library-options.svg"><div id="wpbooklist-stylepak-heading-left" class="wpbooklist-stylepak-table-heading">' . $this->trans->trans_304 . '</div>
										</th>
										<th>
											<img class="wpbooklist-stylepak-heading-img" src="' . ROOT_IMG_ICONS_URL . 'librarystylepak.svg"><div class="wpbooklist-stylepak-table-heading">' . $this->trans->trans_305 . '</div>
										</th>
									</tr>
									<tr>
										<td class="wpbooklist-stylepaks-col1">
											<div class="wpbooklist-stylepak-table-lib"><span class="wpbooklist-stylepak-table-num">#1:</span>' . $this->trans->trans_61 . '</div>
										</td>
										<td>
											<div class="wpbooklist-stylepak-table-stylepak">' . ucfirst( $default->stylepak ) . '</div>
										</td>
									</tr>';

			foreach ( $db_row as $key => $db ) {

				if ( null === $db->stylepak ) {
					$db->stylepak = '' . $this->trans->trans_306 . '';
				}

				$string_table = $string_table . '<tr>
												<td class="wpbooklist-stylepaks-col1">
													<div class="wpbooklist-stylepak-table-lib"><span class="wpbooklist-stylepak-table-num">#' . ( $key + 2 ) . ':</SPAN> ' . ucfirst( $db->user_table_name ) . ' ' . $this->trans->trans_307 . '</div>
												</td>
												<td>
													<div class="wpbooklist-stylepak-table-stylepak">' . ucfirst( $db->stylepak ) . '</div>
												</td>
											</tr>';
			}

			$string_table = $string_table . '</table></div>';

			$string1 = '<p class="wpbooklist-tab-intro-para">What\'s a <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_308 . '</span> ' . $this->trans->trans_292 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_309 . '</span> ' . $this->trans->trans_294 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_57 . '</span> ' . $this->trans->trans_311 . '</p><p class="wpbooklist-tab-intro-para">' . $this->trans->trans_312 . ' <a href="http://wpbooklist.com/index.php/stylepaks-2/">' . $this->trans->trans_313 . '</a>, ' . $this->trans->trans_314 . ' <span class="wpbooklist-color-orange-italic">\'' . $this->trans->trans_315 . '\'</span> ' . $this->trans->trans_316 . '</p>

				<div id="wpbooklist-stylepak-demo-links">
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-1/">' . $this->trans->trans_317 . '</a>
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-2/">' . $this->trans->trans_318 . '</a>
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-3/">' . $this->trans->trans_319 . '</a>
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-4/">' . $this->trans->trans_320 . '</a>
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-5/">' . $this->trans->trans_321 . '</a>
					<a href="http://wpbooklist.com/index.php/downloads/library-stylepak-6/">' . $this->trans->trans_326 . '</a>
				</div>

				<div id="wpbooklist-buy-library-stylepaks-div">
					<a id="wpbooklist-stylepak-buy-link" href="http://wpbooklist.com/index.php/stylepaks-2/"><img src="' . ROOT_IMG_URL . 'getstylepaks.png" /></a>
				</div>';

			$string2 = '<div id="wpbooklist-upload-stylepaks-div">
							<input id="wpbooklist-add-new-library-stylepak" style="display:none;" type="file" name="files[]" multiple="">
							<button id="wpbooklist-add-new-library-stylepak-button" onclick="document.getElementById(\'wpbooklist-add-new-library-stylepak\') .click();" name="add-library-stylepak" type="button">' . $this->trans->trans_322 . '</button>
							<div class="wpbooklist-spinner" id="wpbooklist-spinner-1"></div>
						</div>
						<div id="wpbooklist-apply-stylepak-wrapper">
						<div id="wpbooklist-stylepak-select-stylepak-label">' . $this->trans->trans_323 . ':</div>
								<select id="wpbooklist-select-library-stylepak">	
									<option selected disabled>' . $this->trans->trans_323 . '</option>
									<option value="Default StylePak">' . $this->trans->trans_324 . '</option>';

			foreach ( glob( LIBRARY_STYLEPAKS_UPLOAD_DIR . '*.*' ) as $filename ) {
				error_log('yo');
				$filename     = basename( $filename );
				$display_name = str_replace( '.css', '', $filename );
				$display_name = str_replace( '.zip', '', $display_name );
				$display_name = str_replace( ' .css', '', $display_name );
				$display_name = str_replace( ' .zip', '', $display_name );
				error_log($filename);
				//if ( false !== stripos( $filename, ' .css' ) || false !== stripos( $filename, ' .zip' ) ) {
					error_log('yo2');
					$filename = str_replace( ' .zip', '', $filename );
					$string2  = $string2 . '<option id="' . $filename . '" value="' . $filename . '">' . $display_name . '</option>';
				//}
			}

			$string2 = $string2 . '</select>';

			$string3 = '<div id="wpbooklist-stylepak-select-library-label" for="wpbooklist-stylepak-select-library">Select a Library to Apply This StylePak to:</div>
						<select class="wpbooklist-stylepak-select-default" id="wpbooklist-stylepak-select-library">
							<option value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option> ';

			$string4 = '';
			foreach ( $db_row as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$string4 = $string4 . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}

			$string5 = '</select>
			</div>
						<button disabled id="wpbooklist-apply-library-stylepak">' . $this->trans->trans_325 . '</button>
						<div id="wpbooklist-addstylepak-success-div"></div>';

			echo $string1 . $string_table . $string2 . $string3 . $string4 . $string5;
		}
	}

endif;
