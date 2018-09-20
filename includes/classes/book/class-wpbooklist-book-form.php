<?php
/**
 * WPBookList WPBookList_Book_Form Tab Class - class-wpbooklist-form.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Book_Form', false ) ) :
	/**
	 * WPBookList_Book_Form Class.
	 */
	class WPBookList_Book_Form {

		/** Common member variable
		 *
		 *  @var object $trans
		 */
		public $trans = null;

		/** Common member variable
		 *
		 *  @var object $opt_results
		 */
		public $opt_results = null;

		/** Common member variable
		 *
		 *  @var array() $dynamic_libs
		 */
		public $dynamic_libs = array();

		/**
		 * Class constructor.
		 */
		public function __construct() {

			// Get Translations.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->trans = new WPBookList_Translations();
			$this->trans->trans_strings();

			// Get Options table to Perform check for previously-saved Amazon Authorization.
			global $wpdb;
			$table_name        = $wpdb->prefix . 'wpbooklist_jre_user_options';
			$this->opt_results = $wpdb->get_row( 'SELECT * FROM ' . $table_name );

			// Get all of the possible User-created Libraries.
			$table_name         = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$this->dynamic_libs = $wpdb->get_results( 'SELECT * FROM ' . $table_name );

			// For grabbing an image from media library.
			wp_enqueue_media();

		}

		/**
		 * Outputs the form for adding or editing a book.
		 */
		public function output_book_form() {

			global $wpdb;

			$string1 = '<div id="wpbooklist-addbook-container">
					<p>' . $this->trans->trans_74 . '<span class="wpbooklist-color-orange-italic"> ' . $this->trans->trans_75 . ' </span>' . $this->trans->trans_76 . '  <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_77 . '</span>.<br/><br/><span ';

			// Determine if we need to display the Amazon Authorization.
			if ( 'true' === $this->opt_results->amazonauth ) {
				$string2 = 'style="display:none;"';
			} else {
				$string2 = '';
			}

			$string3 = ' >' . $this->trans->trans_78 . ' <span class="wpbooklist-color-orange-italic">' . $this->trans->trans_57 . '</span> ' . $this->trans->trans_79 . ' <a href="' . menu_page_url( 'WPBookList-Options-settings', false ) . '&tab=api">' . $this->trans->trans_80 . '</a> ' . $this->trans->trans_81 . '.</span></p>
			  		<form id="wpbooklist-addbook-form" method="post" action="">
					  	<div id="wpbooklist-authorize-amazon-container">
							<table>';

			if ( 'true' === $this->opt_results->amazonauth ) {
				$string4 = '<tr style="display:none;"">
					<td><p id="auth-amazon-question-label">' . $this->trans->trans_130 . '</p></td>
				</tr>
				<tr style="display:none;"">
					<td>
						<input checked type="checkbox" name="authorize-amazon-yes" />
						<label for="authorize-amazon-yes">' . $this->trans->trans_131 . '</label>
						<input type="checkbox" name="authorize-amazon-no" />
						<label for="authorize-amazon-no">' . $this->trans->trans_132 . '</label>
					</td>
				</tr>';
			} else {
				$string4 = '<tr>
					<td><p id="auth-amazon-question-label">' . $this->trans->trans_130 . '</p></td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="authorize-amazon-yes" />
						<label for="authorize-amazon-yes">' . $this->trans->trans_131 . '</label>
						<input type="checkbox" name="authorize-amazon-no" />
						<label for="authorize-amazon-no">' . $this->trans->trans_132 . '</label>
					</td>
				</tr>';
			}

			$string5 = '</table>
						</div>
						<div id="wpbooklist-addbook-select-library-label" for="wpbooklist-addbook-select-library">' . $this->trans->trans_133 . '</div>
						<div class="wpbooklist-libraries-dropdown-container">
							<select class="wpbooklist-addbook-select-default select2-input" id="wpbooklist-addbook-select-library" name="libraries[]" multiple="multiple">
							<option selected default value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option> ';

			// Building drop-down of all libraries.
			$string6 = '';
			foreach ( $this->dynamic_libs as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$string6 = $string6 . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}

			// Building the checkboxes for user to choose if they want to gather info from Amazon.
			$string7 = '	
				  		</select>
				  		</div>
				  		<div id="wpbooklist-use-amazon-container">
							<table>
								<tr>
									<td><p id="use-amazon-question-label">' . $this->trans->trans_134 . '</p></td>
								</tr>
								<tr>
									<td style="text-align:center;">
										<input checked type="checkbox" name="use-amazon-yes" />
										<label for="use-amazon-yes">' . $this->trans->trans_131 . '</label>
										<input type="checkbox" name="use-amazon-no" />
										<label for="use-amazon-no">' . $this->trans->trans_132 . '</label>
									</td>
								</tr>
							</table>
						</div>';

			// Starting the string that will house all of the main form elements specific to the individual book.
			$string_book_form = '
				<div class="wpbooklist-book-form-container">
					<div class="wpbooklist-book-form-inner-container">
						<div class="wpbooklist-book-form-indiv-attribute-container">
							<img class="wphealthtracker-icon-image-question" data-label="book-form-isbn10" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
							<label for="book-isbn10">' . $this->trans->trans_135 . '</label>
							<input type="text" id="wpbooklist-addbook-isbn10" name="book-isbn10">
						</div>
						<div class="wpbooklist-book-form-indiv-attribute-container">
							<img class="wphealthtracker-icon-image-question" data-label="book-form-isbn13" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
							<label for="book-isbn13">' . $this->trans->trans_136 . '</label>
							<input type="text" id="wpbooklist-addbook-isbn13" name="book-isbn13">
						</div>
						<div class="wpbooklist-book-form-indiv-attribute-container">
							<img class="wphealthtracker-icon-image-question" data-label="book-form-asin" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
							<label for="book-asin">' . $this->trans->trans_137 . '</label>
							<input type="text" id="wpbooklist-addbook-asin" name="book-asin">
						</div>
						<div class="wpbooklist-book-form-indiv-attribute-container">
							<img class="wphealthtracker-icon-image-question" data-label="book-form-title" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
							<label for="book-title">' . $this->trans->trans_138 . '</label>
							<input type="text" id="wpbooklist-addbook-title" name="book-title">
						</div>
						<div class="wpbooklist-book-form-indiv-attribute-container">
							<img class="wphealthtracker-icon-image-question" data-label="book-form-originaltitle" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
							<label for="book-originaltitle">' . $this->trans->trans_139 . '</label>
							<input type="text" id="wpbooklist-addbook-originialtitle" name="book-originaltitle">
						</div>
					</div>
				</div>';

			$closing_string = '</form>
					<div id="wpbooklist-add-book-error-check" data-add-book-form-error="true" style="display:none" data-></div>
				</div>';

			return $string1 . $string2 . $string3 . $string4 . $string5 . $string6 . $string7 . $string_book_form . $closing_string;
		}



	}

endif;
