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

			// Now build a unique Array of Genres, derived from Genre, Sub-Genre, Category, and Subject.
			$this->genre_array = array();
			foreach ( $this->all_books_array as $key => $book ) {
				array_push( $this->genre_array, $book->genre );
				array_push( $this->genre_array, $book->subgenre );
				array_push( $this->genre_array, $book->subject );
				array_push( $this->genre_array, $book->category );
			}
			$this->genre_array = array_unique( $this->genre_array );

			// Now build a unique Array of Similar Books.
			$this->similar_books_array = array();
			$this->keywords_uid_array  = array();
			foreach ( $this->all_books_array as $key => $book ) {

				$identifier = '';
				if ( null !== $book->isbn && '' !== $book->isbn ) {
					$identifier = $book->isbn;
				} elseif ( null !== $book->isbn13 && '' !== $book->isbn13 ) {
					$identifier = $book->isbn13;
				} else {
					$identifier = $book->asin;
				}

				if ( '' !== $book->title && null !== $book->title && '' !== $identifier ) {
					$final_string = $book->title . ' (' . $identifier . ')';
					array_push( $this->similar_books_array, $final_string );
					array_push( $this->keywords_uid_array, $book->book->uid );
				}
			}
			$this->similar_books_array = array_unique( $this->similar_books_array );

			// Now build a unique Array of Keywords.
			$this->keywords_array = array();
			foreach ( $this->all_books_array as $key => $book ) {

				// If there are saved keywords...
				if ( null !== $book->keywords && '' !== $book->keywords ) {
					// If there are multiple saved keywords for a book.
					if ( false !== stripos( $book->keywords, ';' ) ) {
						$keywords = explode( ';', $book->keywords );
						foreach ( $keywords as $key => $value ) {
							array_push( $this->keywords_array, $value );
						}
					} else {
						array_push( $this->keywords_array, $book->keywords );
					}
				}
			}
			$this->keywords_array = array_unique( $this->keywords_array );

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
						<div class="wpbooklist-book-form-inner-container-basic-fields">
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

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-publisher" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-publisher">' . $this->trans->trans_141 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-publisher">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-publicationyear" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-publicationyear">' . $this->trans->trans_143 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-publicationyear">
							</div>
							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-originalpublicationyear" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-originalpublicationyear">' . $this->trans->trans_145 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-originalpublicationyear">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-illustrator" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-illustrator">' . $this->trans->trans_140 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-illustrator">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-pages" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-pages">' . $this->trans->trans_142 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-pages">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-callnumber" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-callnumber">' . $this->trans->trans_144 . '</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-callnumber">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-author1" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-author1">' . $this->trans->trans_14 . ' 1</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author1">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-author2" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-author2">' . $this->trans->trans_14 . ' 2</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author2">
							</div>

							<div class="wpbooklist-book-form-indiv-attribute-container">
								<img class="wphealthtracker-icon-image-question" data-label="book-form-author3" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
								<label for="book-author3">' . $this->trans->trans_14 . ' 3</label>
								<input type="text" id="wpbooklist-addbook-originialtitle" name="book-author3">
							</div>';

			// This filter allows the addition of one or more rows of items into the Basic Fields section of the 'Book' form.
			$string_insert = '';
			if ( has_filter( 'wpbooklist_append_to_book_form_basic_fields' ) ) {
				$string_insert = apply_filters( 'wpbooklist_append_to_book_form_basic_fields', $string_insert );
			}

						$string_book_form = $string_book_form . $string_insert . '</div>
						<div class="wpbooklist-book-form-inner-container-multiple-fields">
							<div class="wpbooklist-book-form-inner-container-multiple-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wphealthtracker-icon-image-question" data-label="book-form-genre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-genre">' . $this->trans->trans_146 . '</label>
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
									<img class="wphealthtracker-icon-image-question" data-label="book-form-subgenre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-subgenre">' . $this->trans->trans_147 . '</label>
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
									<img class="wphealthtracker-icon-image-question" data-label="book-form-similarbooks" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-similarbooks">' . $this->trans->trans_148 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input-similar-books" id="wpbooklist-addbook-select-similarbooks" name="similarbooks[]" multiple="multiple">';

			// Building drop-down of all similarbooks from All book's Titles and ISBNs/ASINs.
			$string10 = '';
			foreach ( $this->similar_books_array as $similar_book ) {
				if ( ( '' !== $similar_book ) && ( null !== $similar_book ) ) {
					$string10 = $string10 . '<option value="' . $similar_book . '">' . ucfirst( $similar_book ) . '</option>';
				}
			}

										$string_book_form = $string_book_form . $string10 . '</select>
				  					</div>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wphealthtracker-icon-image-question" data-label="book-form-subgenre" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-subgenre">' . $this->trans->trans_150 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input-similar-books" id="wpbooklist-addbook-select-similarbooks" name="similarbooks[]" multiple="multiple">';

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
									<img class="wphealthtracker-icon-image-question" data-label="book-form-keywords" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-keywords">' . $this->trans->trans_149 . '</label>
									<div class="wpbooklist-libraries-dropdown-container">
										<select class="wpbooklist-addbook-select-default select2-input" id="wpbooklist-addbook-select-similarbooks" name="similarbooks[]" multiple="multiple">';

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
			$string_insert = '';
			if ( has_filter( 'wpbooklist_append_to_book_form_multiple_fields' ) ) {
				$string_insert = apply_filters( 'wpbooklist_append_to_book_form_multiple_fields', $string_insert );
			}

						$string_book_form = $string_book_form . $string_insert . '</div>
						<div class="wpbooklist-book-form-inner-container-textarea-fields">
							<div class="wpbooklist-book-form-inner-container-textarea-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wphealthtracker-icon-image-question" data-label="book-form-shortdescription" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-shortdescription">' . $this->trans->trans_151 . '</label>
									<textarea id="wpbooklist-addbook-originialtitle" name="book-shortdescription"></textarea>
								</div>
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wphealthtracker-icon-image-question" data-label="book-form-fulldescription" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-fulldescription">' . $this->trans->trans_152 . '</label>
									<textarea id="wpbooklist-addbook-originialtitle" name="book-fulldescription"></textarea>
								</div>
							</div>
							<div class="wpbooklist-book-form-inner-container-textarea-fields-row">
								<div class="wpbooklist-book-form-indiv-attribute-container">
									<img class="wphealthtracker-icon-image-question" data-label="book-form-notes" src="' . ROOT_IMG_ICONS_URL . 'question-black.svg">
									<label for="book-notes">' . $this->trans->trans_153 . '</label>
									<textarea id="wpbooklist-addbook-originialtitle" name="book-notes"></textarea>
								</div>
							</div>
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
