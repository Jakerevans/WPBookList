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
			$this->trans_39  = __( 'You\'ve just added a new book to your library! Remember, to display your library, simply place these shortcode(s) on a page or post:', 'wpbooklist' );
			$this->trans_40  = __( 'Click Here to View Your New Book', 'wpbooklist' );
			$this->trans_41  = __( 'Click Here to View This Book\'s Post', 'wpbooklist' );
			$this->trans_42  = __( 'Click Here to View This Book\'s Page', 'wpbooklist' );
			$this->trans_43  = __( 'Thanks for using WPBookList, and', 'wpbooklist' );
			$this->trans_44  = __( 'be sure to check out the WPBookList Extensions!', 'wpbooklist' );
			$this->trans_45  = __( 'If you happen to be thrilled with WPBookList, then by all means,', 'wpbooklist' );
			$this->trans_46  = __( 'Leave a 5-Star Review Here!', 'wpbooklist' );
			$this->trans_47  = __( 'Whoops! Looks like there was an error trying to add your book! Here is some developer/code info you might provide to', 'wpbooklist' );
			$this->trans_48  = __( 'WPBookList Tech Support at TechSupport@WPBookList.com:', 'wpbooklist' );
			$this->trans_49  = __( 'Hmmm...', 'wpbooklist' );
			$this->trans_50  = __( 'Your book was added, but it looks like there was a problem grabbing book info from Amazon. Try manually entering your book information, or wait a few seconds and try again, as sometimes Amazon gets confused. Remember, you don\'t', 'wpbooklist' );
			$this->trans_51  = __( 'HAVE', 'wpbooklist' );
			$this->trans_52  = __( 'to gather info from Amazon - WPBookList can work completely independently of Amazon.', 'wpbooklist' );
			$this->trans_53  = __( 'Select a User', 'wpbooklist' );
			$this->trans_54  = __( 'Create a New Library Here', 'wpbooklist' );
			$this->trans_55  = __( 'Loading', 'wpbooklist' );
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
			$this->trans_74  = __( 'To add a book, select a library in the text box directly below, fill out the form, and click the', 'wpbooklist' );
			$this->trans_75  = __( '\'Add Book\'', 'wpbooklist' );
			$this->trans_76  = __( 'button. If you choose to gather book info from Amazon', 'wpbooklist' );
			$this->trans_77  = __( 'the only required field is one of the ISBN 10, ISBN 13, or ASIN Fields', 'wpbooklist' );
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
			$this->trans_128 = __( 'WPBookList StoryTime is WPBooklist\'s Content-Delivery System, providing you and your website visitors with Sample Chapters, Short Stories, News, Interviews and more!', 'wpbooklist' );
			$this->trans_129 = __( 'Discover new Authors and Publishers!', 'wpbooklist' );
			$this->trans_130 = __( 'Authorize Amazon Usage', 'wpbooklist' );
			$this->trans_131 = __( 'Yes', 'wpbooklist' );
			$this->trans_132 = __( 'No', 'wpbooklist' );
			$this->trans_133 = __( 'Select The Libraries to Add This Book To', 'wpbooklist' );
			$this->trans_134 = __( 'Gather Book Info From Amazon?', 'wpbooklist' );
			$this->trans_135 = __( 'ISBN 10', 'wpbooklist' );
			$this->trans_136 = __( 'ISBN 13', 'wpbooklist' );
			$this->trans_137 = __( 'ASIN', 'wpbooklist' );
			$this->trans_138 = __( 'Book Title', 'wpbooklist' );
			$this->trans_139 = __( 'Original Title', 'wpbooklist' );
			$this->trans_140 = __( 'Illustrator', 'wpbooklist' );
			$this->trans_141 = __( 'Publisher', 'wpbooklist' );
			$this->trans_142 = __( 'Pages', 'wpbooklist' );
			$this->trans_143 = __( 'Publication Year', 'wpbooklist' );
			$this->trans_144 = __( 'Call Number', 'wpbooklist' );
			$this->trans_145 = __( 'Original Publication Year', 'wpbooklist' );
			$this->trans_146 = __( 'Genre(s)', 'wpbooklist' );
			$this->trans_147 = __( 'Sub-Genre(s)', 'wpbooklist' );
			$this->trans_148 = __( 'Similar Books', 'wpbooklist' );
			$this->trans_149 = __( 'Keywords', 'wpbooklist' );
			$this->trans_150 = __( 'Other Editions', 'wpbooklist' );
			$this->trans_151 = __( 'Short Description', 'wpbooklist' );
			$this->trans_152 = __( 'Full Description', 'wpbooklist' );
			$this->trans_153 = __( 'Notes', 'wpbooklist' );
			$this->trans_154 = __( 'Language', 'wpbooklist' );
			$this->trans_155 = __( 'Edition', 'wpbooklist' );
			$this->trans_156 = __( 'Series', 'wpbooklist' );
			$this->trans_157 = __( 'Number In Series', 'wpbooklist' );
			$this->trans_158 = __( 'Format', 'wpbooklist' );
			$this->trans_159 = __( 'Amazon Link', 'wpbooklist' );
			$this->trans_160 = __( 'Barnes & Noble', 'wpbooklist' );
			$this->trans_161 = __( 'Google Books Link', 'wpbooklist' );
			$this->trans_162 = __( 'Apple iBooks Link', 'wpbooklist' );
			$this->trans_163 = __( 'Goodreads Link', 'wpbooklist' );
			$this->trans_164 = __( 'Books-A-Million Link', 'wpbooklist' );
			$this->trans_165 = __( 'Kobo Link', 'wpbooklist' );
			$this->trans_166 = __( 'Author\'s Link', 'wpbooklist' );
			$this->trans_167 = __( 'Front Cover Image', 'wpbooklist' );
			$this->trans_168 = __( 'Back Cover Image', 'wpbooklist' );
			$this->trans_169 = __( 'Choose Image', 'wpbooklist' );
			$this->trans_170 = __( 'Additional Image 1', 'wpbooklist' );
			$this->trans_171 = __( 'Additional Image 2', 'wpbooklist' );
			$this->trans_172 = __( 'Enter Image URL', 'wpbooklist' );
			$this->trans_173 = __( 'Here you\'ll  enter the ISBN 10 number for this book. This is only required if you choose to gather book information from Amazon, and don\'t enter an ISBN 13 or ASIN number' , 'wpbooklist' );
			$this->trans_174 = __( 'Here you\'ll  enter the ISBN 13 number for this book. This is only required if you choose to gather book information from Amazon, and don\'t enter an ISBN 10 or ASIN number. This can be entered with or without a dash' , 'wpbooklist' );
			$this->trans_175 = __( 'Here you\'ll enter the ASIN number for this book. This is only required if you choose to gather book information from Amazon, and don\'t enter an ISBN 10 or ISBN 13 number' , 'wpbooklist' );
			$this->trans_176 = __( 'Here you\'ll enter the Title for this book. If you choose to not gather book information from Amazon, then this becomes the only required field on this entire page' , 'wpbooklist' );
			$this->trans_177 = __( 'Here you\'ll enter the Original Title for this book' , 'wpbooklist' );
			$this->trans_178 = __( 'Here you\'ll enter the Publisher and/or Publishing Company for this book.' , 'wpbooklist' );
			$this->trans_179 = __( 'Here you\'ll enter the Illustrator for this book, if there is one, or perhaps use this field for the Book Cover Artist' , 'wpbooklist' );
			$this->trans_180 = __( 'This is not a required field', 'wpbooklist' );
			$this->trans_181 = __( 'Here you\'ll enter the number of Pages for this book', 'wpbooklist' );
			$this->trans_182 = __( 'Here you\'ll enter the Call Number that your Library or Organization uses for this book', 'wpbooklist' );
			$this->trans_183 = __( 'Here you\'ll enter the Author for this book', 'wpbooklist' );
			$this->trans_184 = __( 'Here you can enter the name of a second Author for this book', 'wpbooklist' );
			$this->trans_185 = __( 'Here you can enter the name of a third Author for this book', 'wpbooklist' );
			$this->trans_186 = __( 'Simply type the name of the Author in a normal, first-name last-name format, followed by any available credentials. Examples: Jake R. Evans, Ph.D., or David McCullough', 'wpbooklist' );
			$this->trans_187 = __( 'Second Author', 'wpbooklist' );
			$this->trans_188 = __( 'Third Author', 'wpbooklist' );
			$this->trans_189 = __( 'Here you can enter the Language this book is written in. If this book comes in multiple Languages, consider adding an individual book for each Language - usually, if the same book is translated into multiple languages, each one of those language-specific versions will have it\'s own unique ISBN number', 'wpbooklist' );
			$this->trans_190 = __( 'Here you can specify the Edition of this book', 'wpbooklist' );
			$this->trans_191 = __( 'Here you\'ll enter the name of the Series this book is a member of, if applicable. For example, if I were adding the book "Harry Potter and the Goblet of Fire," I would enter "Harry Potter" in this field', 'wpbooklist' );
			$this->trans_192 = __( 'Here you can enter what number within a series this book is, if applicable. For example, if I were adding the book "Harry Potter and the Goblet of Fire," I would enter "4," as it\'s the 4th book in the "Harry Potter" Series', 'wpbooklist' );
			$this->trans_193 = __( 'Here you\'ll enter the format this book is in. Use this creatively to suite your needs - specify whether this is a Paperback book or a Hardcover, or if it\'s a Chapter Book, a Choose-Your-Adventure Book, a Graphic Novel, an E-Book, etc', 'wpbooklist' );
			$this->trans_194 = __( 'Here you can enter the link to this book\'s Amazon page', 'wpbooklist' );
			$this->trans_195 = __( 'Here you can enter the link to this book\'s Barnes & Noble page', 'wpbooklist' );
			$this->trans_196 = __( 'Here you can enter the link to this book\'s Google Books page', 'wpbooklist' );
			$this->trans_197 = __( 'Here you can enter the link to this book\'s Apple iBooks page', 'wpbooklist' );
			$this->trans_198 = __( 'Here you can enter the link to this book\'s Goodreads page', 'wpbooklist' );
			$this->trans_199 = __( 'Here you can enter the link to this book\'s Books-a-Million page', 'wpbooklist' );
			$this->trans_200 = __( 'Here you can enter the link to this book\'s Kobo page', 'wpbooklist' );
			$this->trans_201 = __( 'It\'s best to enter the full link, copied straight from your browser. For example: https://www.booklink.com/', 'wpbooklist' );
			$this->trans_202 = __( 'Here you can enter the link to the Author\'s website, if one exists, or maybe a link to the website for this book itself, if it has one', 'wpbooklist' );
			$this->trans_203 = __( 'Select WPBookList Libraries', 'wpbooklist' );
			$this->trans_204 = __( 'Here you\'ll select which WPBookList Library(s) to add this book to. You can select multiple libraries, or leave this field as it is to add this book to only the Default WPBookList Library. Create your own custom WPBookList Libraries towards the bottom of the <a href="', 'wpbooklist' );
			$this->trans_205 = __( '">WPBookList Settings Page</a>', 'wpbooklist' );
			$this->trans_206 = __( 'By checking yes, WPBookList will try and grab as much info as possible for this book from Amazon, but you\'ll have to provide either an ISBN or ASIN number to do so. WPBookList uses it\'s own Amazon API keys to do this, but if have your own API keys and would like to use those instead, you can do so on the <a href="', 'wpbooklist' );

			$this->trans_207 = __( '&tab=api">API Settings Tab of the WPBookList Settings Page</a>', 'wpbooklist' );
			$this->trans_208 = __( 'If you check no, WPBookList will still try and grab book info from other sources such as Google, OpenLibrary, and iBooks. In this case, the Title field is the only required field. Either way, whatever values you enter into the fields below will override what WPBookList finds out on the Internet', 'wpbooklist' );
			$this->trans_209 = __( 'Grab Amazon Info?', 'wpbooklist' );
			$this->trans_210 = __( 'Add Book', 'wpbooklist' );
			$this->trans_211 = __( 'Star Rating', 'wpbooklist' );
			$this->trans_212 = __( 'Select a Rating...', 'wpbooklist' );
			$this->trans_213 = __( '5', 'wpbooklist' );
			$this->trans_214 = __( '4', 'wpbooklist' );
			$this->trans_215 = __( '3', 'wpbooklist' );
			$this->trans_216 = __( '2', 'wpbooklist' );
			$this->trans_217 = __( '1', 'wpbooklist' );
			$this->trans_218 = __( '1/2', 'wpbooklist' );
			$this->trans_219 = __( 'Stars', 'wpbooklist' );
			$this->trans_220 = __( 'Star', 'wpbooklist' );
			$this->trans_221 = __( 'N/A', 'wpbooklist' );
			$this->trans_222 = __( 'Out of Print?', 'wpbooklist' );
			$this->trans_223 = __( 'Finished?', 'wpbooklist' );
			$this->trans_224 = __( 'Signed Copy?', 'wpbooklist' );
			$this->trans_225 = __( 'Create a Page?', 'wpbooklist' );
			$this->trans_226 = __( 'Create a Post?', 'wpbooklist' );
			$this->trans_227 = __( 'Link Text', 'wpbooklist' );
			$this->trans_228 = __( 'Link URL', 'wpbooklist' );
			$this->trans_229 = __( 'Select an Option...', 'wpbooklist' );
			$this->trans_230 = __( 'Here you can manage all of the', 'wpbooklist' );
			$this->trans_231 = __( 'WPBookList StoryTime', 'wpbooklist' );
			$this->trans_232 = __( 'Settings, to include how long Stories are kept, how you\'d like to be notifed when new Stories arrive, whether or not to create a Page and/or Post when new Stories arrive, and more!', 'wpbooklist' );
			$this->trans_233 = __( 'Remember, use this shortcode to display the Storytime Reader:', 'wpbooklist' );
			$this->trans_234 = __( 'Create a Post every time a new Story arrives?', 'wpbooklist' );
			$this->trans_235 = __( 'Create a Page every time a new Story arrives?', 'wpbooklist' );
			$this->trans_236 = __( 'Delete all Default StoryTime Content?', 'wpbooklist' );
			$this->trans_237 = __( 'Display Dashboard notification when new Stories arrive?', 'wpbooklist' );
			$this->trans_238 = __( 'Disable StoryTime (you will no longer receive', 'wpbooklist' );
			$this->trans_239 = __( 'ANY', 'wpbooklist' );
			$this->trans_240 = __( 'Stories', 'wpbooklist' );
			$this->trans_241 = __( 'Keep Stories for', 'wpbooklist' );
			$this->trans_242 = __( 'Days (leave blank to keep all Stories forever)', 'wpbooklist' );
			$this->trans_243 = __( 'Save Settings', 'wpbooklist' );
			$this->trans_244 = __( 'StoryTime', 'wpbooklist' );
			$this->trans_245 = __( 'Save Changes', 'wpbooklist' );
			$this->trans_246 = __( 'To Edit this book, simply make your desired changes in the fields below and click the \'Save Changes\' button at the bottom of this section.', 'wpbooklist' );
			$this->trans_247  = __( 'Click Here to View Your Edited Book', 'wpbooklist' );
			$this->trans_248  = __( 'Filter Section', 'wpbooklist' );
			$this->trans_249  = __( 'Edition Sort Option', 'wpbooklist' );
			$this->trans_250  = __( 'Quote Section', 'wpbooklist' );
			$this->trans_251  = __( 'Review Stars', 'wpbooklist' );
			$this->trans_252  = __( 'Search & Sort', 'wpbooklist' );
			$this->trans_253  = __( 'Signed Sort Option', 'wpbooklist' );
			$this->trans_254  = __( 'Statistics Section', 'wpbooklist' );
			$this->trans_255  = __( 'Subject Sort Option', 'wpbooklist' );
			$this->trans_256  = __( 'Finished Sort Option', 'wpbooklist' );
			$this->trans_257  = __( 'Check All', 'wpbooklist' );
			$this->trans_258  = __( 'Uncheck All', 'wpbooklist' );
			$this->trans_259  = __( 'Set Default Sorting', 'wpbooklist' );
			$this->trans_260  = __( 'Set Books Per Page', 'wpbooklist' );
			$this->trans_261  = __( 'Library View Display Options', 'wpbooklist' );
			$this->trans_262  = __( 'Here you can set what display options are visible or hidden in your Library Views (the view with all the books in a Library). Select a Library to apply these display options to from the drop-down below, place checkmarks in the checkboxes for the items you want hidden, and click the \'Save Changes\' button at the bottom of the page.', 'wpbooklist' );
			$this->trans_263  = __( 'Book View Display Options', 'wpbooklist' );
			$this->trans_264  = __( 'Here you can set what display options are visible or hidden in your Book Views (the pop-up window that appears when clicking on a book). Select a Library to apply these display options to from the drop-down below, place checkmarks in the checkboxes for the items you want hidden, and click the \'Save Changes\' button at the bottom of the page.', 'wpbooklist' );




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
				'trans128' => $this->trans_128,
				'trans129' => $this->trans_129,
				'trans130' => $this->trans_130,
				'trans131' => $this->trans_131,
				'trans132' => $this->trans_132,
				'trans133' => $this->trans_133,
				'trans134' => $this->trans_134,
				'trans135' => $this->trans_135,
				'trans136' => $this->trans_136,
				'trans137' => $this->trans_137,
				'trans138' => $this->trans_138,
				'trans139' => $this->trans_139,
				'trans140' => $this->trans_140,
				'trans141' => $this->trans_141,
				'trans142' => $this->trans_142,
				'trans143' => $this->trans_143,
				'trans144' => $this->trans_144,
				'trans145' => $this->trans_145,
				'trans146' => $this->trans_146,
				'trans147' => $this->trans_147,
				'trans148' => $this->trans_148,
				'trans149' => $this->trans_149,
				'trans150' => $this->trans_150,
				'trans151' => $this->trans_151,
				'trans152' => $this->trans_152,
				'trans153' => $this->trans_153,
				'trans154' => $this->trans_154,
				'trans155' => $this->trans_155,
				'trans156' => $this->trans_156,
				'trans157' => $this->trans_157,
				'trans158' => $this->trans_158,
				'trans159' => $this->trans_159,
				'trans160' => $this->trans_160,
				'trans161' => $this->trans_161,
				'trans162' => $this->trans_162,
				'trans163' => $this->trans_163,
				'trans164' => $this->trans_164,
				'trans165' => $this->trans_165,
				'trans166' => $this->trans_166,
				'trans167' => $this->trans_167,
				'trans168' => $this->trans_168,
				'trans169' => $this->trans_169,
				'trans170' => $this->trans_170,
				'trans171' => $this->trans_171,
				'trans172' => $this->trans_172,
				'trans173' => $this->trans_173,
				'trans174' => $this->trans_174,
				'trans175' => $this->trans_175,
				'trans176' => $this->trans_176,
				'trans177' => $this->trans_177,
				'trans178' => $this->trans_178,
				'trans179' => $this->trans_179,
				'trans180' => $this->trans_180,
				'trans181' => $this->trans_181,
				'trans182' => $this->trans_182,
				'trans183' => $this->trans_183,
				'trans184' => $this->trans_184,
				'trans185' => $this->trans_185,
				'trans186' => $this->trans_186,
				'trans187' => $this->trans_187,
				'trans188' => $this->trans_188,
				'trans189' => $this->trans_189,
				'trans190' => $this->trans_190,
				'trans191' => $this->trans_191,
				'trans192' => $this->trans_192,
				'trans193' => $this->trans_193,
				'trans194' => $this->trans_194,
				'trans195' => $this->trans_195,
				'trans196' => $this->trans_196,
				'trans197' => $this->trans_197,
				'trans198' => $this->trans_198,
				'trans199' => $this->trans_199,
				'trans200' => $this->trans_200,
				'trans201' => $this->trans_201,
				'trans202' => $this->trans_202,
				'trans203' => $this->trans_203,
				'trans204' => $this->trans_204,
				'trans205' => $this->trans_205,
				'trans206' => $this->trans_206,
				'trans207' => $this->trans_207,
				'trans208' => $this->trans_208,
				'trans209' => $this->trans_209,
				'trans210' => $this->trans_210,
				'trans211' => $this->trans_211,
				'trans212' => $this->trans_212,
				'trans213' => $this->trans_213,
				'trans214' => $this->trans_214,
				'trans215' => $this->trans_214,
				'trans216' => $this->trans_216,
				'trans217' => $this->trans_217,
				'trans218' => $this->trans_218,
				'trans219' => $this->trans_219,
				'trans220' => $this->trans_220,
				'trans221' => $this->trans_221,
				'trans222' => $this->trans_222,
				'trans223' => $this->trans_223,
				'trans224' => $this->trans_224,
				'trans225' => $this->trans_225,
				'trans226' => $this->trans_226,
				'trans227' => $this->trans_227,
				'trans228' => $this->trans_228,
				'trans229' => $this->trans_229,
				'trans230' => $this->trans_230,
				'trans231' => $this->trans_231,
				'trans232' => $this->trans_232,
				'trans233' => $this->trans_233,
				'trans234' => $this->trans_234,
				'trans235' => $this->trans_235,
				'trans236' => $this->trans_236,
				'trans237' => $this->trans_237,
				'trans238' => $this->trans_238,
				'trans239' => $this->trans_239,
				'trans240' => $this->trans_240,
				'trans241' => $this->trans_241,
				'trans242' => $this->trans_242,
				'trans243' => $this->trans_243,
				'trans244' => $this->trans_244,
				'trans245' => $this->trans_245,
				'trans246' => $this->trans_246,
				'trans247' => $this->trans_247,

			);

			return $translation_array;
		}
	}
endif;
