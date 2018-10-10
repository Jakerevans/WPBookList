<?php
/**
 * WPBookList Book Display Options Form Tab Class - class-wpbooklist-book-display-options-form.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes
 * @version  6.0.0.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Book_Display_Options_Form', false ) ) :

	/**
	 * WPBookList_Admin_Menu Class.
	 */
	class WPBookList_Book_Display_Options_Form {


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
		 * Outputs all HTML elements on the page.
		 */
		public function output_book_display_options_form() {
			global $wpdb;
			// Getting all user-created libraries.
			$db_row = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names' );

			// Getting settings for Default library.
			$options_row = $wpdb->get_row( 'SELECT * FROM ' . $wpdb->prefix . 'wpbooklist_jre_user_options' );

			$string1 = '<div id="wpbooklist-display-options-container">
							<p class="wpbooklist-tab-intro-para">' . $this->trans->trans_264 . '</p>
							<select class="wpbooklist-select-centered" id="wpbooklist-library-settings-select">
								<option value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">Default Library</option>';

			$string2 = '';
			foreach ( $db_row as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$string2 = $string2 . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}

			$string3 = '</select>';

			/*
Amazon Purchase Link
Amazon Reviews
ASIN
Author
B&N Purchase Link
Book Cover Image (book view)
Book Finished
Book Page Link
Book Post Link
Book Title (book view)
Books-A-Million Purchase Link
Call Number
Country
Edition
Email Share Button
Facebook Messenger Button
Facebook Share Button
Featured Titles Section
First Edition
Format
Full Description
Genre
GoodReads Widget
Google Purchase Link
Google+ Share Button
Illustrator
ISBN 10
ISBN 13
iTunes Purchase Link
Keywords
Kindle Preview
Kobo Purchase Link
Language
Notes
Number in Series
Original Publication Year
Original Title
Other Editions
Out of Print
Pages
Pinterest Share Button
Publication Date
Publisher
Quote (book view)
Review Stars (book view)
Series
Short Description
Signed
Similar Titles Section
Sub-Genre
Twitter Share Button



			*/

			$string4 =
				'<div class="wpbooklist-spinner" id="wpbooklist-spinner-2"></div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-booktitle" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_138 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-booktitle"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-filter" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_248 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-filter"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-editionsort" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_249 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-editionsort"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-quote" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_250 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-quote"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-reviewstars" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_251 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-reviewstars"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-searchsort" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_252 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-searchsort"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-signedsort" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_253 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-signedsort"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-statistics" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_254 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-statistics"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-subjectsort" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_255 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-subjectsort"></input>
					</div>
				</div>
				<div class="wpbooklist-display-options-indiv-entry">
					<div class="wpbooklist-display-options-label-div">
						<img class="wpbooklist-icon-image-question-display-options wpbooklist-icon-image-question" data-label="library-display-form-finished" src="http://localhost:8888/local/wp-content/plugins/wpbooklist/assets/img/icons/question-black.svg">
						<label>' . $this->trans->trans_256 . '</label>
					</div>
					<div class="wpbooklist-margin-right-td">
						<input type="checkbox" name="hide-library-display-form-finished"></input>
					</div>
				</div>';

			$string5 =
				'<div id="wpbooklist-display-opt-check-div">
					<label>' . $this->trans->trans_257 . '</label>
					<input id="wpbooklist-check-all" type="checkbox" name="check-all">
					<label>' . $this->trans->trans_258 . '</label>
					<input id="wpbooklist-uncheck-all" type="checkbox" name="uncheck-all">
				</div>
				<table id="wpbooklist-library-options-lower-table">
					<tbody>
						<tr></tr>
						<tr>
						  <td class="wpbooklist-display-bottom-4"><label>' . $this->trans->trans_259 . '</label></td>
						  <td class="wpbooklist-display-bottom-4">
							<select name="sort-value" id="wpbooklist-jre-sorting-select"><option selected="selected" value="default">' . $this->trans->trans_3 . '</option>
							  <option value="alphabeticallybytitle">' . $this->trans->trans_4 . '</option>
							  <option value="alphabeticallybyauthorfirst">' . $this->trans->trans_5 . '</option>
							  <option value="alphabeticallybyauthorlast">' . $this->trans->trans_6 . '</option>
							  <option value="year_read">' . $this->trans->trans_7 . '</option>
							  <option value="pages_desc">' . $this->trans->trans_8 . '</option>
							  <option value="pages_asc">' . $this->trans->trans_9 . '</option>
							  <option value="signed">' . $this->trans->trans_10 . '</option>
							  <option value="first_edition">' . $this->trans->trans_11 . '</option>
							</select><br>
						  </td>
						</tr>
						<tr>
							<td class="wpbooklist-display-bottom-4"><label>' . $this->trans->trans_260 . '</label></td>
							<td class="wpbooklist-display-bottom-4"><input class="wpbooklist-dynamic-input" id="wpbooklist-book-control" type="text" name="books-per-page" value="120"></td>
						</tr>
					</tbody>
				</table>
			</div>';

			echo $string1 . $string2 . $string3 . $string4 . $string5;
		}
	}
endif;
