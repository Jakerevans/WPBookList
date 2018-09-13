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
			$this->trans_1   = __( 'Search', 'wpbooklist-textdomain' );
			$this->trans_2   = __( 'Sort by', 'wpbooklist-textdomain' );
			$this->trans_3   = __( 'Default', 'wpbooklist-textdomain' );
			$this->trans_4   = __( 'Alphabetically (By Title)', 'wpbooklist-textdomain' );
			$this->trans_5   = __( "Alphabetically (Author's First Name)", 'wpbooklist-textdomain' );
			$this->trans_6   = __( "Alphabetically (Author's Last Name)", 'wpbooklist-textdomain' );
			$this->trans_7   = __( 'Year Finished', 'wpbooklist-textdomain' );
			$this->trans_8   = __( 'Pages (Descending)', 'wpbooklist-textdomain' );
			$this->trans_9   = __( 'Pages (Ascending)', 'wpbooklist-textdomain' );
			$this->trans_10  = __( 'Signed', 'wpbooklist-textdomain' );
			$this->trans_11  = __( 'First Edition', 'wpbooklist-textdomain' );
			$this->trans_12  = __( 'Search by', 'wpbooklist-textdomain' );
			$this->trans_13  = __( 'Title', 'wpbooklist-textdomain' );
			$this->trans_14  = __( 'Author', 'wpbooklist-textdomain' );
			$this->trans_15  = __( 'Category', 'wpbooklist-textdomain' );
			$this->trans_16  = __( 'Filter by Authors', 'wpbooklist-textdomain' );
			$this->trans_17  = __( 'Filter by Category', 'wpbooklist-textdomain' );
			$this->trans_18  = __( 'Filter by Subject', 'wpbooklist-textdomain' );
			$this->trans_19  = __( 'Filter by Country', 'wpbooklist-textdomain' );
			$this->trans_20  = __( 'Filter by Publication Year Range', 'wpbooklist-textdomain' );
			$this->trans_21  = __( 'To', 'wpbooklist-textdomain' );
			$this->trans_22  = __( 'Reset Filters, Sort & Search', 'wpbooklist-textdomain' );
			$this->trans_23  = __( 'Total Books', 'wpbooklist-textdomain' );
			$this->trans_24  = __( 'Search & Filter Results', 'wpbooklist-textdomain' );
			$this->trans_25  = __( 'Finished', 'wpbooklist-textdomain' );
			$this->trans_26  = __( 'Signed', 'wpbooklist-textdomain' );
			$this->trans_27  = __( 'First Editions', 'wpbooklist-textdomain' );
			$this->trans_28  = __( 'Total Pages Read', 'wpbooklist-textdomain' );
			$this->trans_29  = __( 'Categories', 'wpbooklist-textdomain' );
			$this->trans_30  = __( 'Library Completion', 'wpbooklist-textdomain' );
			$this->trans_31  = __( 'Uh-Oh! No books were found!', 'wpbooklist-textdomain' );
			$this->trans_32  = __( 'Want a Library like this for your own website? Check out', 'wpbooklist-textdomain' );
			$this->trans_33  = __( 'WPBookList Now!', 'wpbooklist-textdomain' );
			$this->trans_34  = __( 'Also be sure to check out all of the WPBookList Extensions & StylePaks at', 'wpbooklist-textdomain' );
			$this->trans_35  = __( 'WPBookList.com!', 'wpbooklist-textdomain' );
			$this->trans_36  = __( 'Previous', 'wpbooklist-textdomain' );
			$this->trans_37  = __( 'Next Page', 'wpbooklist-textdomain' );
			$this->trans_38  = __( 'Success!', 'wpbooklist' );
			$this->trans_39  = __( 'You\'ve just added a new book to your library! Remember, to display your library, simply place this shortcode on a page or post:', 'wpbooklist' );
			$this->trans_40  = __( 'Click Here to View Your New Book', 'wpbooklist' );
			$this->trans_41  = __( 'Click Here to View This Book\'s Post', 'wpbooklist' );
			$this->trans_42  = __( 'Click Here to View This Book\'s Page', 'wpbooklist' );
			$this->trans_43  = __( 'Thanks for using WPBookList, and', 'wpbooklist' );
			$this->trans_44  = __( 'be sure to check out the WPBookList Extensions!', 'wpbooklist' );
			$this->trans_45  = __( 'If you happen to be thrilled with WPBookList, then by all means,', 'wpbooklist' );
			$this->trans_46  = __( 'Feel Free to Leave a 5-Star Review Here!', 'wpbooklist' );
			$this->trans_47  = __( 'Whoops! Looks like there was an error trying to add your book! Here is some developer/code info you might provide to', 'wpbooklist' );
			$this->trans_48  = __( 'WPBookList Tech Support at TechSupport@WPBookList.com:', 'wpbooklist' );
			$this->trans_49  = __( 'Hmmm...', 'wpbooklist' );
			$this->trans_50  = __( 'Your book was added, but it looks like there was a problem grabbing book info from Amazon. Try manually entering your book information, or wait a few seconds and try again, as sometimes Amazon gets confused. Remember, you don\'t', 'wpbooklist' );
			$this->trans_51  = __( 'HAVE', 'wpbooklist' );
			$this->trans_52  = __( 'to gather info from Amazon - WPBookList can work completely independently of Amazon.', 'wpbooklist' );
			$this->trans_53  = __( 'Select a User', 'wpbooklist' );
			$this->trans_54  = __( 'Create a New Library Here', 'wpbooklist' );
			$this->trans_55  = __( 'Loading', 'wpbooklist' );
			$this->trans_55  = __( 'You\'ve worked hard to add all those books to your website - make sure they\'re backed up! Simply select a Library to backup, click the \'Backup Library\' button below, and', 'wpbooklist' );
			$this->trans_56  = __( 'You\'ve worked hard to add all those books to your website - make sure they\'re backed up! Simply select a Library to backup, click the \'Backup Library\' button below, and', 'wpbooklist' );
			$this->trans_57  = __( 'WPBookList', 'wpbooklist' );
			$this->trans_58  = __( 'will create a Database backup of your library!', 'wpbooklist' );
			$this->trans_59  = __( 'Select a Library to Backup:', 'wpbooklist' );
			$this->trans_60  = __( 'Select a Library', 'wpbooklist' );
			$this->trans_61  = __( 'Default Library', 'wpbooklist' );
			$this->trans_62  = __( 'Backup Library', 'wpbooklist' );
			$this->trans_63  = __( 'Here you can restore a library from previously-created', 'wpbooklist' );
			$this->trans_64  = __( 'backups. Simply select a Library to restore, select a backup to restore from, and click the \'Restore Library\' button below. That\'s it!', 'wpbooklist' );
			$this->trans_65  = __( 'Select a Library to Restore', 'wpbooklist' );
			$this->trans_66  = __( 'Select a Backup', 'wpbooklist' );
			$this->trans_67  = __( 'Restore Library', 'wpbooklist' );
			$this->trans_68  = __( 'Here you can download a .csv file of ISBN/ASIN numbers from a selected library, which can be very useful in conjunction with the', 'wpbooklist' );
			$this->trans_69  = __( 'WPBookList Bulk-Upload Extension', 'wpbooklist' );
			$this->trans_70  = __( 'Simply select a Library, click the \'Create CSV File\' button, and', 'wpbooklist' );
			$this->trans_71  = __( 'will create .csv file of ISBN/ASIN numbers', 'wpbooklist' );
			$this->trans_72  = __( 'Create CSV File', 'wpbooklist' );
			$this->trans_73  = __( 'Backups', 'wpbooklist' );
			$this->trans_74  = __( 'To add a book, simply select a library from the drop-down below, fill out the form, and click the', 'wpbooklist' );
			$this->trans_75  = __( '\'Add Book\'', 'wpbooklist' );
			$this->trans_76  = __( 'button. If you choose to gather book info from Amazon', 'wpbooklist' );
			$this->trans_77  = __( 'the only required field is the ISBN/ASIN number', 'wpbooklist' );
			$this->trans_78  = __( 'You must check the box below to authorize', 'wpbooklist' );
			$this->trans_79  = __( 'to gather data from Amazon, otherwise, the only data that will be added for your book is what you fill out on the form below. WPBookList uses it\'s own Amazon Product Advertising API keys to gather book data, but if you happen to have your own API keys, you can use those instead by adding them on the', 'wpbooklist' );
			$this->trans_80  = __( 'Amazon Settings', 'wpbooklist' );
			$this->trans_81  = __( 'page', 'wpbooklist' );
			$this->trans_82  = __( 'Add a Book', 'wpbooklist' );
			$this->trans_83  = __( 'You\'ve just edited your book! Remember, to display your library, simply place this shortcode on a page or post', 'wpbooklist' );
			$this->trans_84  = __( 'Click Here to View Your Edited Book', 'wpbooklist' );
			$this->trans_85  = __( 'Click Here to View Your Edited Book', 'wpbooklist' );
			$this->trans_86  = __( 'Whoops! Looks like there was an error trying to edit your book! Please check the information you provided (especially that ISBN number), and try again.', 'wpbooklist' );
			$this->trans_87  = __( 'Your book was edited, but it looks like there was a problem grabbing book info from Amazon. Try manually entering your book information, or wait a few seconds and try again, as sometimes Amazon gets confused. Remember, you don\'t', 'wpbooklist' );
			$this->trans_88  = __( 'Title was succesfully deleted!', 'wpbooklist' );
			$this->trans_89  = __( 'You\'ve added a new StylePak!', 'wpbooklist' );
			$this->trans_90  = __( 'Uh-Oh!', 'wpbooklist' );
			$this->trans_91  = __( 'Looks like there was a problem uploading your StylePak! Are you sure you selected the right file? It should start with the word \'StylePak\' and end with either a \'.zip\' or a \'.css\' (example - StylePak1.css or StylePak1.css.zip) - you could also try unzipping the file', 'wpbooklist' );
			$this->trans_92  = __( 'before', 'wpbooklist' );
			$this->trans_93  = __( 'uploading it', 'wpbooklist' );
			$this->trans_94  = __( 'You\'ve added a new Template!', 'wpbooklist' );
			$this->trans_95  = __( 'Looks like there was a problem uploading your Template! Are you sure you selected the right file? It should start with the word \'Post\' and end with either a \'.zip\' or a \'.php\' (example - Post-Template-1.php or Post-Template-1.zip) - you could also try unzipping the file', 'wpbooklist' );
			$this->trans_96  = __( 'Looks like there was a problem uploading your Template! Are you sure you selected the right file? It should start with the word \'Page\' and end with either a \'.zip\' or a \'.php\' (example - Page-Template-1.php or Page-Template-1.zip) - you could also try unzipping the file', 'wpbooklist' );
			$this->trans_97  = __( 'You\'ve Created a New Backup! You can', 'wpbooklist' );
			$this->trans_98  = __( 'download your backup here', 'wpbooklist' );
			$this->trans_99  = __( 'You\'ve Restored Your Library!', 'wpbooklist' );
			$this->trans_100 = __( 'You\'ve Created a CSV file of ISBN/ASIN numbers! You can', 'wpbooklist' );
			$this->trans_101 = __( 'download your file here', 'wpbooklist' );
			$this->trans_102 = __( 'Remember, your new file will come in handy when using the', 'wpbooklist' );


			$this->trans_103 = __( 'Whoa, Wait a sec!', 'wpbooklist' );
			$this->trans_104 = __( 'Tell me why you\'re getting rid of WPBookList', 'wpbooklist' );

			$this->trans_105 = __( 'and I\'ll do my best to fix the issue!', 'wpbooklist' );
			$this->trans_106 = __( 'I Can\'t Add Any Books!', 'wpbooklist' );
			$this->trans_107 = __( 'It\'s Ugly!', 'wpbooklist' );
			$this->trans_108 = __( 'It Doesn\'t Have a Feature I Need!', 'wpbooklist' );
			$this->trans_109 = __( 'What kind of feature are you looking for?', 'wpbooklist' );
			$this->trans_110 = __( 'Also, be sure to check out', 'wpbooklist' );
			$this->trans_111 = __( 'all the available Extensions', 'wpbooklist' );
			$this->trans_112 = __( 'chances are the feature you\'re looking for already exists!', 'wpbooklist' );
			$this->trans_113 = __( 'It Broke My Website!', 'wpbooklist' );
			$this->trans_114 = __( 'It Doesn\'t Work Right With My Theme!', 'wpbooklist' );
			$this->trans_115 = __( 'The', 'wpbooklist' );
			$this->trans_116 = __( 'Extensions', 'wpbooklist' );
			$this->trans_117 = __( 'Are Too Expensive!', 'wpbooklist' );
			$this->trans_118 = __( 'I Prefer a Different Book Plugin!', 'wpbooklist' );
			$this->trans_119 = __( 'This Pop-Up Is Annoying!', 'wpbooklist' );
			$this->trans_120 = __( 'Just Not What I Thought It Was...', 'wpbooklist' );
			$this->trans_121 = __( 'Provide Another Reason & Some Details Here', 'wpbooklist' );
			$this->trans_122 = __( 'E-Mail Address (Optional)', 'wpbooklist' );
			$this->trans_123 = __( '(If provided, I\'ll personally respond to your concern)', 'wpbooklist' );
			$this->trans_124 = __( 'E-Mail Address', 'wpbooklist' );
			$this->trans_125 = __( 'Submit - And Thanks For Trying WPBookList!', 'wpbooklist' );
			$this->trans_126 = __( 'Nah - Just Deactivate WPBookList!', 'wpbooklist' );
			$this->trans_127 = __( 'Delete This Story', 'wpbooklist' );



			// The array of translation strings.
			$translation_array = array(
				'trans1'   => $this->trans_1,
				'trans2'   => $this->trans_2,
				'trans3'   => $this->trans_3,
				'trans4'   => $this->trans_4,
				'trans5'   => $this->trans_5,
				'trans6'   => $this->trans_6,
				'trans7'   => $this->trans_7,
				'trans8'   => $this->trans_8,
				'trans9'   => $this->trans_9,
				'trans10'  => $this->trans_10,
				'trans11'  => $this->trans_11,
				'trans12'  => $this->trans_12,
				'trans13'  => $this->trans_13,
				'trans14'  => $this->trans_14,
				'trans15'  => $this->trans_15,
				'trans16'  => $this->trans_16,
				'trans17'  => $this->trans_17,
				'trans18'  => $this->trans_18,
				'trans19'  => $this->trans_19,
				'trans20'  => $this->trans_20,
				'trans21'  => $this->trans_21,
				'trans22'  => $this->trans_22,
				'trans23'  => $this->trans_23,
				'trans24'  => $this->trans_24,
				'trans25'  => $this->trans_25,
				'trans26'  => $this->trans_26,
				'trans27'  => $this->trans_27,
				'trans28'  => $this->trans_28,
				'trans29'  => $this->trans_29,
				'trans30'  => $this->trans_30,
				'trans31'  => $this->trans_31,
				'trans32'  => $this->trans_32,
				'trans33'  => $this->trans_33,
				'trans34'  => $this->trans_34,
				'trans35'  => $this->trans_35,
				'trans36'  => $this->trans_36,
				'trans37'  => $this->trans_37,
				'trans38'  => $this->trans_38,
				'trans39'  => $this->trans_39,
				'trans40'  => $this->trans_40,
				'trans41'  => $this->trans_41,
				'trans42'  => $this->trans_42,
				'trans43'  => $this->trans_43,
				'trans44'  => $this->trans_44,
				'trans45'  => $this->trans_45,
				'trans46'  => $this->trans_46,
				'trans47'  => $this->trans_47,
				'trans48'  => $this->trans_48,
				'trans49'  => $this->trans_49,
				'trans50'  => $this->trans_50,
				'trans51'  => $this->trans_51,
				'trans52'  => $this->trans_52,
				'trans53'  => $this->trans_53,
				'trans54'  => $this->trans_54,
				'trans55'  => $this->trans_55,
				'trans56'  => $this->trans_56,
				'trans57'  => $this->trans_57,
				'trans58'  => $this->trans_58,
				'trans59'  => $this->trans_59,
				'trans60'  => $this->trans_60,
				'trans61'  => $this->trans_61,
				'trans62'  => $this->trans_62,
				'trans63'  => $this->trans_63,
				'trans64'  => $this->trans_64,
				'trans65'  => $this->trans_65,
				'trans66'  => $this->trans_66,
				'trans67'  => $this->trans_67,
				'trans68'  => $this->trans_68,
				'trans69'  => $this->trans_69,
				'trans70'  => $this->trans_70,
				'trans71'  => $this->trans_71,
				'trans72'  => $this->trans_72,
				'trans73'  => $this->trans_73,
				'trans74'  => $this->trans_74,
				'trans75'  => $this->trans_75,
				'trans76'  => $this->trans_76,
				'trans77'  => $this->trans_77,
				'trans78'  => $this->trans_78,
				'trans79'  => $this->trans_79,
				'trans80'  => $this->trans_80,
				'trans81'  => $this->trans_81,
				'trans82'  => $this->trans_82,
				'trans83'  => $this->trans_83,
				'trans84'  => $this->trans_84,
				'trans85'  => $this->trans_85,
				'trans86'  => $this->trans_86,
				'trans87'  => $this->trans_87,
				'trans88'  => $this->trans_88,
				'trans89'  => $this->trans_89,
				'trans90'  => $this->trans_90,
				'trans91'  => $this->trans_91,
				'trans92'  => $this->trans_92,
				'trans93'  => $this->trans_93,
				'trans94'  => $this->trans_94,
				'trans95'  => $this->trans_95,
				'trans96'  => $this->trans_96,
				'trans97'  => $this->trans_97,
				'trans98'  => $this->trans_98,
				'trans99'  => $this->trans_99,
				'trans100' => $this->trans_100,
				'trans101' => $this->trans_101,
				'trans102' => $this->trans_102,
				'trans103' => $this->trans_103,
				'trans104' => $this->trans_104,
				'trans105' => $this->trans_105,
				'trans106' => $this->trans_106,
				'trans107' => $this->trans_107,
				'trans108' => $this->trans_108,
				'trans109' => $this->trans_109,
				'trans110' => $this->trans_110,
				'trans111' => $this->trans_111,
				'trans112' => $this->trans_112,
				'trans113' => $this->trans_113,
				'trans114' => $this->trans_114,
				'trans115' => $this->trans_115,
				'trans116' => $this->trans_116,
				'trans117' => $this->trans_117,
				'trans118' => $this->trans_118,
				'trans119' => $this->trans_119,
				'trans120' => $this->trans_120,
				'trans121' => $this->trans_121,
				'trans122' => $this->trans_122,
				'trans123' => $this->trans_123,
				'trans124' => $this->trans_124,
				'trans125' => $this->trans_125,
				'trans126' => $this->trans_126,
				'trans127' => $this->trans_127,



			);

			return $translation_array;
		}
	}
endif;
