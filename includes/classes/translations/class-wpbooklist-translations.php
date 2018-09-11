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
		 * Class Constructor - Simply calls the one function to return all Translated strings.
		 */
		public function __construct() {
			$this->trans_strings();
		}

		/**
		 * All the Translations.
		 */
		public function trans_strings() {
			$this->trans_1  = __( 'Search', 'wpbooklist-textdomain' );
			$this->trans_2  = __( 'Sort by', 'wpbooklist-textdomain' );
			$this->trans_3  = __( 'Default', 'wpbooklist-textdomain' );
			$this->trans_4  = __( 'Alphabetically (By Title)', 'wpbooklist-textdomain' );
			$this->trans_5  = __( "Alphabetically (Author's First Name)", 'wpbooklist-textdomain' );
			$this->trans_6  = __( "Alphabetically (Author's Last Name)", 'wpbooklist-textdomain' );
			$this->trans_7  = __( 'Year Finished', 'wpbooklist-textdomain' );
			$this->trans_8  = __( 'Pages (Descending)', 'wpbooklist-textdomain' );
			$this->trans_9  = __( 'Pages (Ascending)', 'wpbooklist-textdomain' );
			$this->trans_10 = __( 'Signed', 'wpbooklist-textdomain' );
			$this->trans_11 = __( 'First Edition', 'wpbooklist-textdomain' );
			$this->trans_12 = __( 'Search by', 'wpbooklist-textdomain' );
			$this->trans_13 = __( 'Title', 'wpbooklist-textdomain' );
			$this->trans_14 = __( 'Author', 'wpbooklist-textdomain' );
			$this->trans_15 = __( 'Category', 'wpbooklist-textdomain' );
			$this->trans_16 = __( 'Filter by Authors', 'wpbooklist-textdomain' );
			$this->trans_17 = __( 'Filter by Category', 'wpbooklist-textdomain' );
			$this->trans_18 = __( 'Filter by Subject', 'wpbooklist-textdomain' );
			$this->trans_19 = __( 'Filter by Country', 'wpbooklist-textdomain' );
			$this->trans_20 = __( 'Filter by Publication Year Range', 'wpbooklist-textdomain' );
			$this->trans_21 = __( 'To', 'wpbooklist-textdomain' );
			$this->trans_22 = __( 'Reset Filters, Sort & Search', 'wpbooklist-textdomain' );
			$this->trans_23 = __( 'Total Books', 'wpbooklist-textdomain' );
			$this->trans_24 = __( 'Search & Filter Results', 'wpbooklist-textdomain' );
			$this->trans_25 = __( 'Finished', 'wpbooklist-textdomain' );
			$this->trans_26 = __( 'Signed', 'wpbooklist-textdomain' );
			$this->trans_27 = __( 'First Editions', 'wpbooklist-textdomain' );
			$this->trans_28 = __( 'Total Pages Read', 'wpbooklist-textdomain' );
			$this->trans_29 = __( 'Categories', 'wpbooklist-textdomain' );
			$this->trans_30 = __( 'Library Completion', 'wpbooklist-textdomain' );
			$this->trans_31 = __( 'Uh-Oh! No books were found!', 'wpbooklist-textdomain' );
			$this->trans_32 = __( 'Want a Library like this for your own website? Check out', 'wpbooklist-textdomain' );
			$this->trans_33 = __( 'WPBookList Now!', 'wpbooklist-textdomain' );
			$this->trans_34 = __( 'Also be sure to check out all of the WPBookList Extensions & StylePaks at', 'wpbooklist-textdomain' );
			$this->trans_35 = __( 'WPBookList.com!', 'wpbooklist-textdomain' );
			$this->trans_36 = __( 'Previous', 'wpbooklist-textdomain' );
			$this->trans_37 = __( 'Next Page', 'wpbooklist-textdomain' );
			$this->trans_38 = __( 'Success!', 'wpbooklist' );
			$this->trans_39 = __( 'You\'ve just added a new book to your library! Remember, to display your library, simply place this shortcode on a page or post:', 'wpbooklist' );
			$this->trans_40 = __( 'Click Here to View Your New Book', 'wpbooklist' );
			$this->trans_41 = __( 'Click Here to View This Book\'s Post', 'wpbooklist' );
			$this->trans_42 = __( 'Click Here to View This Book\'s Page', 'wpbooklist' );
			$this->trans_43 = __( 'Thanks for using WPBookList, and', 'wpbooklist' );
			$this->trans_44 = __( 'be sure to check out the WPBookList Extensions!', 'wpbooklist' );
			$this->trans_45 = __( 'If you happen to be thrilled with WPBookList, then by all means,', 'wpbooklist' );
			$this->trans_46 = __( 'Feel Free to Leave a 5-Star Review Here!', 'wpbooklist' );
			$this->trans_47 = __( 'Whoops! Looks like there was an error trying to add your book! Here is some developer/code info you might provide to', 'wpbooklist' );
			$this->trans_48 = __( 'WPBookList Tech Support at TechSupport@WPBookList.com:', 'wpbooklist' );
			$this->trans_49 = __( 'Hmmm...', 'wpbooklist' );
			$this->trans_50 = __( 'Your book was added, but it looks like there was a problem grabbing book info from Amazon. Try manually entering your book information, or wait a few seconds and try again, as sometimes Amazon gets confused. Remember, you don\'t', 'wpbooklist' );
			$this->trans_51 = __( 'HAVE', 'wpbooklist' );
			$this->trans_52 = __( 'to gather info from Amazon - WPBookList can work completely independently of Amazon.', 'wpbooklist' );
			$this->trans_53 = __( 'Select a User', 'wpbooklist' );
			$this->trans_54 = __( 'Create a New Library Here', 'wpbooklist' );
			$this->trans_55 = __( 'Loading', 'wpbooklist' );
			$this->trans_55 = __( 'You\'ve worked hard to add all those books to your website - make sure they\'re backed up! Simply select a Library to backup, click the \'Backup Library\' button below, and', 'wpbooklist' );
			$this->trans_56 = __( 'You\'ve worked hard to add all those books to your website - make sure they\'re backed up! Simply select a Library to backup, click the \'Backup Library\' button below, and', 'wpbooklist' );
			$this->trans_57 = __( 'WPBookList', 'wpbooklist' );
			$this->trans_58 = __( 'will create a Database backup of your library!', 'wpbooklist' );
			$this->trans_59 = __( 'Select a Library to Backup:', 'wpbooklist' );
			$this->trans_60 = __( 'Select a Library', 'wpbooklist' );
			$this->trans_61 = __( 'Default Library', 'wpbooklist' );
			$this->trans_62 = __( 'Backup Library', 'wpbooklist' );
			$this->trans_63 = __( 'Here you can restore a library from previously-created', 'wpbooklist' );
			$this->trans_64 = __( 'backups. Simply select a Library to restore, select a backup to restore from, and click the \'Restore Library\' button below. That\'s it!', 'wpbooklist' );
			$this->trans_65 = __( 'Select a Library to Restore', 'wpbooklist' );
			$this->trans_66 = __( 'Select a Backup', 'wpbooklist' );
			$this->trans_67 = __( 'Restore Library', 'wpbooklist' );
			$this->trans_68 = __( 'Here you can download a .csv file of ISBN/ASIN numbers from a selected library, which can be very useful in conjunction with the', 'wpbooklist' );
			$this->trans_69 = __( 'WPBookList Bulk-Upload Extension', 'wpbooklist' );
			$this->trans_70 = __( 'Simply select a Library, click the \'Create CSV File\' button, and', 'wpbooklist' );
			$this->trans_71 = __( 'will create .csv file of ISBN/ASIN numbers', 'wpbooklist' );
			$this->trans_72 = __( 'Create CSV File', 'wpbooklist' );
			$this->trans_73 = __( 'Backups', 'wpbooklist' );

			$this->trans_74 = __( 'To add a book, simply select a library from the drop-down below, fill out the form, and click the', 'wpbooklist' );
			$this->trans_75 = __( '\'Add Book\'', 'wpbooklist' );
			$this->trans_76 = __( 'button. If you choose to gather book info from Amazon', 'wpbooklist' );
			$this->trans_77 = __( 'the only required field is the ISBN/ASIN number', 'wpbooklist' );
			$this->trans_78 = __( 'You must check the box below to authorize', 'wpbooklist' );
			$this->trans_79 = __( 'to gather data from Amazon, otherwise, the only data that will be added for your book is what you fill out on the form below. WPBookList uses it\'s own Amazon Product Advertising API keys to gather book data, but if you happen to have your own API keys, you can use those instead by adding them on the', 'wpbooklist' );
			$this->trans_80 = __( 'Amazon Settings', 'wpbooklist' );
			$this->trans_81 = __( 'page', 'wpbooklist' );
			$this->trans_82 = __( 'Add a Book', 'wpbooklist' );










			// The array of translation strings.
			$translation_array = array(
				'trans1'  => $this->trans_1,
				'trans2'  => $this->trans_2,
				'trans'   => $this->trans_3,
				'trans4'  => $this->trans_4,
				'trans5'  => $this->trans_5,
				'trans6'  => $this->trans_6,
				'trans7'  => $this->trans_7,
				'trans8'  => $this->trans_8,
				'trans9'  => $this->trans_9,
				'trans10' => $this->trans_10,
				'trans11' => $this->trans_11,
				'trans12' => $this->trans_12,
				'trans13' => $this->trans_13,
				'trans14' => $this->trans_14,
				'trans15' => $this->trans_15,
				'trans16' => $this->trans_16,
				'trans17' => $this->trans_17,
				'trans18' => $this->trans_18,
				'trans19' => $this->trans_19,
				'trans20' => $this->trans_20,
				'trans21' => $this->trans_21,
				'trans22' => $this->trans_22,
				'trans23' => $this->trans_23,
				'trans24' => $this->trans_24,
				'trans25' => $this->trans_25,
				'trans26' => $this->trans_26,
				'trans27' => $this->trans_27,
				'trans28' => $this->trans_28,
				'trans29' => $this->trans_29,
				'trans30' => $this->trans_30,
				'trans31' => $this->trans_31,
				'trans32' => $this->trans_32,
				'trans33' => $this->trans_33,
				'trans34' => $this->trans_34,
				'trans35' => $this->trans_35,
				'trans36' => $this->trans_36,
				'trans37' => $this->trans_37,
				'trans38' => $this->trans_38,
				'trans39' => $this->trans_39,
				'trans40' => $this->trans_40,
				'trans41' => $this->trans_41,
				'trans42' => $this->trans_42,
				'trans43' => $this->trans_43,
				'trans44' => $this->trans_44,
				'trans45' => $this->trans_45,
				'trans46' => $this->trans_46,
				'trans47' => $this->trans_47,
				'trans48' => $this->trans_48,
				'trans49' => $this->trans_49,
				'trans50' => $this->trans_50,
				'trans51' => $this->trans_51,
				'trans52' => $this->trans_52,
				'trans53' => $this->trans_53,
				'trans54' => $this->trans_54,
				'trans55' => $this->trans_55,
			);

			return $translation_array;
		}
	}
endif;
