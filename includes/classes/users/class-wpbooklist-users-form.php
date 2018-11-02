<?php
/**
 * WPBookList WPBookList_User_Form Class - class-wpbooklist-book-form.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes/Book
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_User_Form', false ) ) :
	/**
	 * WPBookList_User_Form Class.
	 */
	class WPBookList_User_Form {

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

			global $wpdb;

			// Get Translations.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->trans = new WPBookList_Translations();
			$this->trans->trans_strings();

			// Get all of the possible User-created Libraries.
			$table_name         = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$this->dynamic_libs = $wpdb->get_results( 'SELECT * FROM ' . $table_name );

			// Get every single book, period.
			$this->all_books_array = array();
			$table_name            = $wpdb->prefix . 'wpbooklist_jre_saved_book_log';
			$default_array         = $wpdb->get_results( 'SELECT * FROM ' . $table_name );
			$this->all_books_array = array_merge( $this->all_books_array, $default_array );
			foreach ( $this->dynamic_libs as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$table_name            = $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name;
					$dyn_array             = $wpdb->get_results( 'SELECT * FROM ' . $table_name );
					$this->all_books_array = array_merge( $this->all_books_array, $dyn_array );
				}
			}

			// Building drop-down of all libraries.
			$this->libstring = '';
			foreach ( $this->dynamic_libs as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {
					$this->libstring = $this->libstring . '<option value="' . $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name . '">' . ucfirst( $db->user_table_name ) . '</option>';
				}
			}


			// For grabbing an image from media library.
			wp_enqueue_media();

		}

		/**
		 * Outputs the form for adding or editing a book.
		 */
		public function output_book_form() {

			global $wpdb;

			$string1 = '<p class="wpbooklist-tab-intro-para">' . $this->trans->trans_460 . ':<br/><br/><span class="wpbooklist-color-orange-italic"> ' . $this->trans->trans_461 . ' </span><br/><span class="wpbooklist-color-orange-italic"> ' . $this->trans->trans_462 . ' </span><br/><span class="wpbooklist-color-orange-italic"> ' . $this->trans->trans_463 . ' </span><br/><span class="wpbooklist-color-orange-italic"> ' . $this->trans->trans_464 . ' </span><br/><br/>' . $this->trans->trans_465 . '<img id="wpbooklist-smile-icon-2" src="' . ROOT_IMG_ICONS_URL . 'happy.svg">';

			$string2 = '<div class="wpbooklist-book-form-container" id="wpbooklist-user-form-container">
							<div class="wpbooklist-book-form-inner-container">
								<div class="wpbooklist-book-form-inner-container-basic-fields">
									<div id="wpbooklist-addbook-select-library-label">
										<p>
											<img class="wpbooklist-icon-image-question-with-link" data-label="user-permissions-heading" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											' . $this->trans->trans_477 . '
										</p>
									</div>
									<br/>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-firstname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-firstname">' . $this->trans->trans_461 . '</label>
										<input type="text" id="wpbooklist-adduser-firstname" name="user-firstname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-lastname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-lastname">' . $this->trans->trans_466 . '</label>
										<input type="text" id="wpbooklist-adduser-lastname" name="user-lastname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-emailname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-emailname">' . $this->trans->trans_462 . '</label>
										<input type="text" id="wpbooklist-adduser-emailname" name="user-emailname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-confirmemailname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-confirmemailname">' . $this->trans->trans_467 . '</label>
										<input type="text" id="wpbooklist-adduser-confirmemailname" name="user-confirmemailname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-passwordname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-passwordname">' . $this->trans->trans_463 . '</label>
										<input type="password" id="wpbooklist-adduser-passwordname" name="user-passwordname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-confirmpasswordname" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-confirmpasswordname">' . $this->trans->trans_468 . '</label>
										<input type="password" id="wpbooklist-adduser-confirmpasswordname" name="user-confirmpasswordname">
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-container">
										<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_464 . '</label>
										<input type="text" id="wpbooklist-adduser-usernamename" name="user-usernamename">
									</div>';

			// This filter allows the addition of one or more rows of items into the Basic Fields section of the 'Add a User' form.
			if ( has_filter( 'wpbooklist_append_to_user_form_basic_fields' ) ) {
				$string2 = apply_filters( 'wpbooklist_append_to_user_form_basic_fields', $string2 );
			}

			$string2 = $string2 . '<div id="wpbooklist-user-form-show-passwords">' . $this->trans->trans_481 . '</div><br/><div class="wpbooklist-adduser-field-checks-div" id="wpbooklist-adduser-field-checks-email-div"></div>
									<div class="wpbooklist-adduser-field-checks-div" id="wpbooklist-adduser-field-checks-password-div"></div>
								</div>
								<div class="wpbooklist-user-form-inner-container-auth-fields">
									<div id="wpbooklist-addbook-select-library-label">
										<p>
											<img class="wpbooklist-icon-image-question-with-link" data-label="user-permissions-heading" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											' . $this->trans->trans_469 . '
										</p>
										<br/>
										<div class="wpbooklist-book-form-indiv-attribute-container wpbooklist-book-form-indiv-attribute-container-exception">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_471 . '</label><br/>
											<select class="wpbooklist-addbook-select-default select2-input-libraries" id="wpbooklist-addbook-select-library" name="libraries[]" multiple="multiple">
												<option selected default value="' . $wpdb->prefix . 'wpbooklist_jre_saved_book_log">' . $this->trans->trans_61 . '</option> 
												<option value="alllibraries">' . $this->trans->trans_470 . '</option> 
												' . $this->libstring . '
											</select>
										</div>
										<div class="wpbooklist-book-form-indiv-attribute-container">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_472 . '</label>
											<select class="wpbooklist-addbook-select-default" id="wpbooklist-adduser-permissions-add-book">
												<option selected="" default="">' . $this->trans->trans_131 . '</option>
												<option>' . $this->trans->trans_132 . '</option>
											</select>
										</div>
										<div class="wpbooklist-book-form-indiv-attribute-container">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_473 . '</label>
											<select class="wpbooklist-addbook-select-default" id="wpbooklist-adduser-permissions-edit-book">
												<option selected="" default="">' . $this->trans->trans_131 . '</option>
												<option>' . $this->trans->trans_132 . '</option>
											</select>
										</div>
										<div class="wpbooklist-book-form-indiv-attribute-container">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_474 . '</label>
											<select class="wpbooklist-addbook-select-default" id="wpbooklist-adduser-permissions-delete-book">
												<option selected="" default="">' . $this->trans->trans_131 . '</option>
												<option>' . $this->trans->trans_132 . '</option>
											</select>
										</div>
										<div class="wpbooklist-book-form-indiv-attribute-container">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_475 . '</label>
											<select class="wpbooklist-addbook-select-default" id="wpbooklist-adduser-permissions-change-display-options">
												<option selected="" default="">' . $this->trans->trans_131 . '</option>
												<option>' . $this->trans->trans_132 . '</option>
											</select>
										</div>
										<div class="wpbooklist-book-form-indiv-attribute-container">
											<img class="wpbooklist-icon-image-question" data-label="user-form-usernamename" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
											<label class="wpbooklist-question-icon-label" for="user-usernamename">' . $this->trans->trans_476 . '</label>
											<select class="wpbooklist-addbook-select-default" id="wpbooklist-adduser-permissions-change-settings">
												<option selected="" default="">' . $this->trans->trans_131 . '</option>
												<option>' . $this->trans->trans_132 . '</option>
											</select>
										</div>';

			// This filter allows the addition of one or more rows of items into the Permissions Fields section of the 'Add a User' form.
			if ( has_filter( 'wpbooklist_append_to_user_form_auth_fields' ) ) {
				$string2 = apply_filters( 'wpbooklist_append_to_user_form_auth_fields', $string2 );
			}

			$string2 = $string2 . '</div>
								</div>
							</div>
							<div class="wpbooklist-response-success-fail-container">
					    		<button class="wpbooklist-response-success-fail-button wpbooklist-admin-adduser-add-button" type="button" id="wpbooklist-admin-adduser-create-button">' . $this->trans->trans_478 . '</button>
					    		<div class="wpbooklist-spinner" id="wpbooklist-spinner-1"></div>
					    		<div class="wpbooklist-response-success-fail-response-actual-container" id="wpbooklist-admin-adduser-response-actual-container"></div>
				    		</div>
						</div>
			';
/*
			
			$string3 = '</p>
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
					<td><p id="auth-amazon-question-label"><img class="wpbooklist-icon-image-question" data-label="book-form-authorizeamazon" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg"/>' . $this->trans->trans_130 . '?</p></td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="authorize-amazon-yes" />
						<label class="wpbooklist-question-icon-label" for="authorize-amazon-yes">' . $this->trans->trans_131 . '</label>
						<input type="checkbox" name="authorize-amazon-no" />
						<label class="wpbooklist-question-icon-label" for="authorize-amazon-no">' . $this->trans->trans_132 . '</label>
					</td>
				</tr>';
			}

			$string5 = '</table>
						</div>
						<div id="wpbooklist-addbook-select-library-label" for="wpbooklist-addbook-select-library"><p><img class="wpbooklist-icon-image-question-with-link" data-label="book-form-libraries" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg"/>' . $this->trans->trans_133 . '</p></div>
						<div class="wpbooklist-libraries-dropdown-container" id="wpbooklist-libraries-dropdown-container-id">
							<select class="wpbooklist-addbook-select-default select2-input-libraries" id="wpbooklist-addbook-select-library" name="libraries[]" multiple="multiple">
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
									<td><p id="use-amazon-question-label"><img class="wpbooklist-icon-image-question-with-link" data-label="book-form-amazonyesno" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg"/>' . $this->trans->trans_134 . '</p></td>
								</tr>
								<tr>
									<td style="text-align:center;">
										<input checked type="checkbox" name="use-amazon-yes" />
										<label class="wpbooklist-question-icon-label" for="use-amazon-yes">' . $this->trans->trans_131 . '</label>
										<input type="checkbox" name="use-amazon-no" />
										<label class="wpbooklist-question-icon-label" for="use-amazon-no">' . $this->trans->trans_132 . '</label>
									</td>
								</tr>
							</table>
						</div>';

			// Starting the string that will house all of the main form elements specific to the individual book.
			$string_book_form = '
				<div class="wpbooklist-book-form-container">
					<div class="wpbooklist-book-form-inner-container">
						<div class="wpbooklist-book-form-inner-container-basic-fields">
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-isbn10" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-isbn10">' . $this->trans->trans_135 . '</label>
								<input type="text" id="wpbooklist-addbook-isbn10" name="book-isbn10">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-isbn13" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-isbn13">' . $this->trans->trans_136 . '</label>
								<input type="text" id="wpbooklist-addbook-isbn13" name="book-isbn13">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-asin" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-asin">' . $this->trans->trans_137 . '</label>
								<input type="text" id="wpbooklist-addbook-asin" name="book-asin">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-title" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-title">' . $this->trans->trans_138 . '</label>
								<input type="text" id="wpbooklist-addbook-title" name="book-booktitle">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-originaltitle" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-originaltitle">' . $this->trans->trans_139 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-originaltitle">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-publisher" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-publisher">' . $this->trans->trans_141 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-publisher">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-publicationyear" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-publicationyear">' . $this->trans->trans_143 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-publicationyear">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-originalpublicationyear" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-originalpublicationyear">' . $this->trans->trans_145 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-originalpublicationyear">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-illustrator" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-illustrator">' . $this->trans->trans_140 . '</label>
								<input type="text" id="wpbooklist-addbook-illustrator" name="book-illustrator">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-pages" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-pages">' . $this->trans->trans_142 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-pages">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-callnumber" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-callnumber">' . $this->trans->trans_144 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-callnumber">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-author1" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-author1">' . $this->trans->trans_14 . ' 1</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author1">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-author2" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-author2">' . $this->trans->trans_14 . ' 2</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author2">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-author3" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-author3">' . $this->trans->trans_14 . ' 3</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author3">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-language" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-language">' . $this->trans->trans_154 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-language">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-edition" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-edition">' . $this->trans->trans_155 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-edition">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-series" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-series">' . $this->trans->trans_156 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-series">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-numberinseries" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-numberinseries">' . $this->trans->trans_157 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-numberinseries">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-format" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-format">' . $this->trans->trans_158 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-format">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-amazonlink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-amazonlink">' . $this->trans->trans_159 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-amazonlink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-bnlink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-bnlink">' . $this->trans->trans_160 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-bnlink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-googlepreview" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-googlepreview">' . $this->trans->trans_161 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-googlepreview">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-ibookslink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-ibookslink">' . $this->trans->trans_162 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-ibookslink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-goodreadslink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-goodreadslink">' . $this->trans->trans_163 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-goodreadslink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-bamlink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-bamlink">' . $this->trans->trans_164 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-bamlink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-kobolink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-kobolink">' . $this->trans->trans_165 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-kobolink">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wpbooklist-icon-image-question" data-label="book-form-authorlink" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label class="wpbooklist-question-icon-label" for="book-authorlink">' . $this->trans->trans_166 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-authorlink">
							</div>';

			// This filter allows the addition of one or more rows of items into the Basic Fields section of the 'Book' form.
			if ( has_filter( 'wpbooklist_append_to_book_form_basic_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_basic_fields', $string_book_form );
			}

			// This filter allows the addition of the StoreFront Extension fields.
			if ( has_filter( 'wpbooklist_append_to_book_form_storefront_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_storefront_fields', $string_book_form );
			}

						$string_book_form = $string_book_form . '</div>
						<div class="wpbooklist-book-form-inner-container-dropdown-fields">
							<div class="wpbooklist-book-form-inner-container-dropdown-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-rating" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-rating">' . $this->trans->trans_211 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-book-rating" >
										<option selected disabled default>' . $this->trans->trans_212 . '</option>
										<option value="5">' . $this->trans->trans_213 . ' ' . $this->trans->trans_219 . '</option>
										<option value="4.5">' . $this->trans->trans_214 . ' <span>' . $this->trans->trans_218 . '</span> ' . $this->trans->trans_219 . '  </option>
										<option value="4">' . $this->trans->trans_214 . ' ' . $this->trans->trans_219 . '</option>
										<option value="3.5">' . $this->trans->trans_215 . ' <span>' . $this->trans->trans_218 . '</span> ' . $this->trans->trans_219 . '  </option>
										<option value="3">' . $this->trans->trans_215 . ' ' . $this->trans->trans_219 . '</option>
										<option value="2.5">' . $this->trans->trans_216 . ' <span>' . $this->trans->trans_218 . '</span> ' . $this->trans->trans_219 . '  </option>
										<option value="2">' . $this->trans->trans_216 . ' ' . $this->trans->trans_219 . '</option>
										<option value="1.5">' . $this->trans->trans_217 . ' <span>' . $this->trans->trans_218 . '</span> ' . $this->trans->trans_219 . '  </option>
										<option value="1">' . $this->trans->trans_217 . ' ' . $this->trans->trans_220 . '</option>
									</select>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-outofprint" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-form-outofprint">' . $this->trans->trans_222 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-outofprint" >
										<option>' . $this->trans->trans_221 . '</option>
										<option>' . $this->trans->trans_131 . '</option>
										<option>' . $this->trans->trans_132 . '</option>
									</select>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-finished" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-form-finshed">' . $this->trans->trans_223 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-finished" >
										<option>' . $this->trans->trans_221 . '</option>
										<option>' . $this->trans->trans_131 . '</option>
										<option>' . $this->trans->trans_132 . '</option>
									</select>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-signed" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-form-signed">' . $this->trans->trans_224 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-signed" >
										<option>' . $this->trans->trans_221 . '</option>
										<option>' . $this->trans->trans_131 . '</option>
										<option>' . $this->trans->trans_132 . '</option>
									</select>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-createpage" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-form-createpage">' . $this->trans->trans_225 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-createpage" >
										<option>' . $this->trans->trans_221 . '</option>
										<option>' . $this->trans->trans_131 . '</option>
										<option>' . $this->trans->trans_132 . '</option>
									</select>
									<input type="hidden" id="wpbooklist-addbook-select-createpage-hidden-input"/>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-createpost" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-form-createpost">' . $this->trans->trans_226 . '</label>
									<select class="wpbooklist-addbook-select-default" id="wpbooklist-addbook-select-createpost" >
										<option>' . $this->trans->trans_221 . '</option>
										<option>' . $this->trans->trans_131 . '</option>
										<option>' . $this->trans->trans_132 . '</option>
									</select>
									<input type="hidden" id="wpbooklist-addbook-select-createpost-hidden-input"/>
								</div>
							</div>';

			// This filter allows the addition of one or more rows of items into the Dropdown Fields section of the 'Book' form.
			if ( has_filter( 'wpbooklist_append_to_book_form_dropdown_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_dropdown_fields', $string_book_form );
			}

						$string_book_form = $string_book_form . '</div>
						<div class="wpbooklist-book-form-inner-container-image-fields">
							<div class="wpbooklist-book-form-inner-container-image-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<div class="wpbooklist-book-form-indiv-attribute-image-controls-container">
										<img class="wpbooklist-icon-image-question" data-label="book-form-frontcover" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="book-frontcover">' . $this->trans->trans_167 . '</label>
										<input class="wpbooklist-addbook-upload_image_button" data-previewid="wpbooklist-addbook-preview-img-front" data-urlinputid="wpbooklist-addbook-frontcover" type="button" value="' . $this->trans->trans_169 . '"/>
										<img class="wpbooklist-addbook-preview-img" id="wpbooklist-addbook-preview-img-front" src="' . ROOT_IMG_ICONS_URL . 'book-placeholder.svg" />
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-image-input-container">
										<input type="text" placeholder="' . $this->trans->trans_172 . '" class="wpbooklist-addbook-image-url-input" id="wpbooklist-addbook-frontcover" data-previewid="wpbooklist-addbook-preview-img-front" name="book-frontcover">
									</div>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<div class="wpbooklist-book-form-indiv-attribute-image-controls-container">
										<img class="wpbooklist-icon-image-question" data-label="book-form-backcover" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="book-backcover">' . $this->trans->trans_168 . '</label>
										<input class="wpbooklist-addbook-upload_image_button" data-previewid="wpbooklist-addbook-preview-img-back" data-urlinputid="wpbooklist-addbook-backcover" type="button" value="' . $this->trans->trans_169 . '"/>
										<img class="wpbooklist-addbook-preview-img" id="wpbooklist-addbook-preview-img-back" src="' . ROOT_IMG_ICONS_URL . 'book-placeholder.svg" />
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-image-input-container">
										<input type="text" placeholder="' . $this->trans->trans_172 . '" class="wpbooklist-addbook-image-url-input" id="wpbooklist-addbook-backcover" data-previewid="wpbooklist-addbook-preview-img-back" name="book-backcover">
									</div>
								</div>
							</div>
							<div class="wpbooklist-book-form-inner-container-image-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<div class="wpbooklist-book-form-indiv-attribute-image-controls-container">
										<img class="wpbooklist-icon-image-question" data-label="book-form-additionalimage1" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="book-additionalimage1">' . $this->trans->trans_170 . '</label>
										<input class="wpbooklist-addbook-upload_image_button" data-previewid="wpbooklist-addbook-preview-img-additionalimage1" data-urlinputid="wpbooklist-addbook-additionalimage1cover" type="button" value="' . $this->trans->trans_169 . '"/>
										<img class="wpbooklist-addbook-preview-img" id="wpbooklist-addbook-preview-img-additionalimage1" src="' . ROOT_IMG_ICONS_URL . 'book-placeholder.svg" />
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-image-input-container">
										<input type="text" placeholder="' . $this->trans->trans_172 . '" class="wpbooklist-addbook-image-url-input" id="wpbooklist-addbook-additionalimage1cover" data-previewid="wpbooklist-addbook-preview-img-additionalimage1" name="book-additionalimage1">
									</div>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<div class="wpbooklist-book-form-indiv-attribute-image-controls-container">
										<img class="wpbooklist-icon-image-question" data-label="book-form-additionalimage2" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
										<label class="wpbooklist-question-icon-label" for="book-additionalimage2">' . $this->trans->trans_171 . '</label>
										<input class="wpbooklist-addbook-upload_image_button" data-previewid="wpbooklist-addbook-preview-img-additionalimage2" data-urlinputid="wpbooklist-addbook-additionalimage2cover" type="button" value="' . $this->trans->trans_169 . '"/>
										<img class="wpbooklist-addbook-preview-img" id="wpbooklist-addbook-preview-img-additionalimage2"  src="' . ROOT_IMG_ICONS_URL . 'book-placeholder.svg" />
									</div>
									<div class="wpbooklist-book-form-indiv-attribute-image-input-container">
										<input type="text" placeholder="' . $this->trans->trans_172 . '" class="wpbooklist-addbook-image-url-input" id="wpbooklist-addbook-additionalimage2cover" data-previewid="wpbooklist-addbook-preview-img-additionalimage2" name="book-additionalimage2">
									</div>
								</div>
							</div>
						';

			// This filter allows the addition of one or more rows of items into the Image Fields section of the 'Book' form.
			if ( has_filter( 'wpbooklist_append_to_book_form_image_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_image_fields', $string_book_form );
			}

						$string_book_form = $string_book_form . '</div>
						<div class="wpbooklist-book-form-inner-container-multiple-fields">
							<div class="wpbooklist-book-form-inner-container-multiple-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-genre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-genre">' . $this->trans->trans_146 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input" id="wpbooklist-addbook-select-genres" name="genres[]" multiple="multiple">';

			// Building drop-down of all genres from Genre, Subject, Category, and Sub-Genre.
			$string8 = '';
			foreach ( $this->genre_array as $genre ) {
				if ( ( '' !== $genre ) && ( null !== $genre ) ) {
					$string8 = $string8 . '<option value="' . $genre . '">' . ucfirst( $genre ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string8 . '</select>
				  					</div>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-subgenre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-subgenre">' . $this->trans->trans_147 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input" id="wpbooklist-addbook-select-subgenres" name="subgenres[]" multiple="multiple">';

			// Building drop-down of all subgenres from Genre, Subject, Category, and Sub-Genre.
			$string9 = '';
			foreach ( $this->genre_array as $genre ) {
				if ( ( '' !== $genre ) && ( null !== $genre ) ) {
					$string9 = $string9 . '<option value="' . $genre . '">' . ucfirst( $genre ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string9 . '</select>
				  					</div>
								</div>
							</div>
							<div class="wpbooklist-book-form-inner-container-multiple-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-similarbooks" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-similarbooks">' . $this->trans->trans_148 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input-similar-books" id="wpbooklist-addbook-select-similarbooks" name="similarbooks[]" multiple="multiple">';

			// Building drop-down of all similarbooks from All book's Titles and ISBNs/ASINs.
			$string10 = '';
			foreach ( $this->similar_books_array as $key => $similar_book ) {
				if ( ( '' !== $similar_book ) && ( null !== $similar_book ) ) {
					$string10 = $string10 . '<option value="' . $this->keywords_uid_array[ $key ] . '">' . ucfirst( $similar_book ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string10 . '</select>
				  					</div>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-subgenre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-subgenre">' . $this->trans->trans_150 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input-other-editions" id="wpbooklist-addbook-select-othereditions" name="othereditions[]" multiple="multiple">';

			// Building drop-down of all similarbooks from All book's Titles and ISBNs/ASINs.
			$string11 = '';
			foreach ( $this->similar_books_array as $key => $similar_book ) {
				if ( ( '' !== $similar_book ) && ( null !== $similar_book ) ) {
					$string11 = $string11 . '<option value="' . $this->keywords_uid_array[ $key ] . '">' . ucfirst( $similar_book ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string11 . '</select>
				  					</div>
								</div>
							</div>
							<div class="wpbooklist-book-form-inner-container-multiple-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-keywords" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-keywords">' . $this->trans->trans_149 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input" id="wpbooklist-addbook-select-keywords" name="keywords[]" multiple="multiple">';

			// Building drop-down of all keywords from All book's Titles and ISBNs/ASINs.
			$string12 = '';
			foreach ( $this->keywords_array as $key => $keyword ) {
				if ( ( '' !== $keyword ) && ( null !== $keyword ) ) {
					$string12 = $string12 . '<option value="' . $keyword . '">' . ucfirst( $keyword ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string12 . '</select>
				  					</div>
								</div>
							</div>';

			// This filter allows the addition of one or more rows of items into the Multiple Fields section of the 'Book' form.
			if ( has_filter( 'wpbooklist_append_to_book_form_multiple_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_multiple_fields', $string_book_form );
			}

						$string_book_form = $string_book_form . '</div>
						<div class="wpbooklist-book-form-inner-container-textarea-fields">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-shortdescription" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-shortdescription">' . $this->trans->trans_151 . '</label>
									<textarea id="wpbooklist-addbook-shortdescription" name="book-shortdescription"></textarea>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-fulldescription" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-fulldescription">' . $this->trans->trans_152 . '</label>
									<textarea id="wpbooklist-addbook-fulldescription" name="book-fulldescription"></textarea>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wpbooklist-icon-image-question" data-label="book-form-notes" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label class="wpbooklist-question-icon-label" for="book-notes">' . $this->trans->trans_153 . '</label>
									<textarea id="wpbooklist-addbook-notes" name="book-notes"></textarea>
								</div>
						';

			// This filter allows the addition of one or more rows of items into the Paragraph Fields section of the 'Book' form.
			if ( has_filter( 'wpbooklist_append_to_book_form_paragraph_fields' ) ) {
				$string_book_form = apply_filters( 'wpbooklist_append_to_book_form_paragraph_fields', $string_book_form );
			}

			$closing_string = '</div></div></form>
					<div class="wpbooklist-response-success-fail-container">
			    		<button class="wpbooklist-response-success-fail-button wpbooklist-admin-editbook-edit-button" type="button" id="wpbooklist-admin-addbook-create-button">' . $this->trans->trans_210 . '</button>
			    		<div class="wpbooklist-spinner" id="wpbooklist-spinner-1"></div>
			    		<div class="wpbooklist-response-success-fail-response-actual-container" id="wpbooklist-admin-addbook-response-actual-container"></div>
		    		</div>
				</div>';
				*/

			//return $string1 . $string3 . $string4 . $string5 . $string6 . $string7 . $string_book_form . $closing_string;

			return $string1 . $string2;
		}



	}

endif;
