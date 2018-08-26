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

			$this->common_trans_1 = __( 'Search', 'wpbooklist-textdomain' );

			$translation_array1 = array(
				'commontrans1' => $this->common_trans_1,
			);

			return $translation_array;
		}
	}
endif;
