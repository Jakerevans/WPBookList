<?php
/**
 * Class WPBookList_Translations - class-wpbooklist-translations.php
 *
 * @author   Jake Evans
 * @category Translations
 * @package  Includes/Classes/Translations
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Translations', false ) ) :
	/**
	 * WPBookList_Translations class. This class will house all the translations we may ever need...
	 */
	class WPBookList_Translations {

		/**
		 * This function will house all the strings that would need translations in the wpbooklist-admin-js.js JavaScript file.
		 */
		public function admin_js_trans_strings() {
			$translation_array = array(
				'adminjstransstring1' => __( 'Select a User', 'wpbooklist-textdomain' ),
				'adminjstransstring2' => __( 'Create a New Library Here', 'wpbooklist-textdomain' ),
			);

			return $translation_array;
		}

		/**
		 * This function will house all the strings that would need translations in the wpbooklist-frontend-js.js JavaScript file.
		 */
		public function frontend_js_trans_strings() {
			$translation_array = array(
				'frontjstransstring1'  => __( 'Select a User', 'wpbooklist-textdomain' ),
				'frontjstransstring2'  => __( 'Blah', 'wpbooklist-textdomain' ),
				'frontjstransstring3'  => __( 'Weight', 'wpbooklist-textdomain' ),
				'frontjstransstring4'  => __( 'Blah', 'wpbooklist-textdomain' ),
				'frontjstransstring5'  => __( 'Blood Pressure', 'wpbooklist-textdomain' ),
				'frontjstransstring6'  => __( 'Blah', 'wpbooklist-textdomain' ),
				'frontjstransstring7'  => __( 'Blood Oxygen Level', 'wpbooklist-textdomain' ),
				'frontjstransstring8'  => __( 'Blah', 'wpbooklist-textdomain' ),
				'frontjstransstring9'  => __( 'Expand', 'wpbooklist-textdomain' ),
				'frontjstransstring10' => __( 'Minimize', 'wpbooklist-textdomain' ),
			);

			return $translation_array;
		}

		/**
		 * Translation strings that are common to different tabs and used all throughout the plugin.
		 */
		public function common_trans_strings() {

			$this->common_trans_1  = __( 'Search', 'wpbooklist-textdomain' );
			$this->common_trans_2  = __( 'Sort by', 'wpbooklist-textdomain' );
			$this->common_trans_3  = __( 'Default', 'wpbooklist-textdomain' );
			$this->common_trans_4  = __( 'Alphabetically (By Title)', 'wpbooklist-textdomain' );
			$this->common_trans_5  = __( "Alphabetically (Author's First Name)", 'wpbooklist-textdomain' );
			$this->common_trans_6  = __( "Alphabetically (Author's Last Name)", 'wpbooklist-textdomain' );
			$this->common_trans_7  = __( 'Year Finished', 'wpbooklist-textdomain' );
			$this->common_trans_8  = __( 'Pages (Descending)', 'wpbooklist-textdomain' );
			$this->common_trans_9  = __( 'Pages (Ascending)', 'wpbooklist-textdomain' );
			$this->common_trans_10 = __( 'Signed', 'wpbooklist-textdomain' );
			$this->common_trans_11 = __( 'First Edition', 'wpbooklist-textdomain' );
			$this->common_trans_12 = __( 'Search by', 'wpbooklist-textdomain' );
			$this->common_trans_13 = __( 'Title', 'wpbooklist-textdomain' );
			$this->common_trans_14 = __( 'Author', 'wpbooklist-textdomain' );
			$this->common_trans_15 = __( 'Category', 'wpbooklist-textdomain' );
			$this->common_trans_16 = __( 'Filter by Authors', 'wpbooklist-textdomain' );
			$this->common_trans_17 = __( 'Filter by Category', 'wpbooklist-textdomain' );
			$this->common_trans_18 = __( 'Filter by Subject', 'wpbooklist-textdomain' );
			$this->common_trans_19 = __( 'Filter by Country', 'wpbooklist-textdomain' );
			$this->common_trans_20 = __( 'Filter by Publication Year Range', 'wpbooklist-textdomain' );
			$this->common_trans_21 = __( 'To', 'wpbooklist-textdomain' );
			$this->common_trans_22 = __( 'Reset Filters, Sort & Search', 'wpbooklist-textdomain' );
			$this->common_trans_23 = __( 'Total Books', 'wpbooklist-textdomain' );
			$this->common_trans_24 = __( 'Search & Filter Results', 'wpbooklist-textdomain' );
			$this->common_trans_25 = __( 'Finished', 'wpbooklist-textdomain' );
			$this->common_trans_26 = __( 'Signed', 'wpbooklist-textdomain' );
			$this->common_trans_27 = __( 'First Editions', 'wpbooklist-textdomain' );
			$this->common_trans_28 = __( 'Total Pages Read', 'wpbooklist-textdomain' );
			$this->common_trans_29 = __( 'Categories', 'wpbooklist-textdomain' );
			$this->common_trans_30 = __( 'Library Completion', 'wpbooklist-textdomain' );
			$this->common_trans_31 = __( 'Uh-Oh! No books were found!', 'wpbooklist-textdomain' );
			$this->common_trans_32 = __( 'Want a Library like this for your own website? Check out', 'wpbooklist-textdomain' );
			$this->common_trans_33 = __( 'WPBookList Now!', 'wpbooklist-textdomain' );
			$this->common_trans_34 = __( 'Also be sure to check out all of the WPBookList Extensions & StylePaks at', 'wpbooklist-textdomain' );
			$this->common_trans_35 = __( 'WPBookList.com!', 'wpbooklist-textdomain' );
			$this->common_trans_36 = __( 'Previous', 'wpbooklist-textdomain' );
			$this->common_trans_37 = __( 'Next Page', 'wpbooklist-textdomain' );

			

			

			$translation_array = array(
				'commontrans1' => $this->common_trans_1,
			);

			return $translation_array;
		}
	}
endif;
