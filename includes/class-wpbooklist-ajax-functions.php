<?php
/**
 * Class WPBookList_Ajax_Functions - class-wpbooklist-ajax-functions.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Ajax_Functions', false ) ) :
	/**
	 * WPBookList_Ajax_Functions class. Here we'll do things like enqueue scripts/css, set up menus, etc.
	 */
	class WPBookList_Ajax_Functions {

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
		 * Callback function for adding a book.
		 */
		public function wpbooklist_dashboard_add_book_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_dashboard_add_book_action_callback', 'security' );

			// First set the variables we'll be passing to class-wpbooklist-book.php to ''.
			$amazon_auth_yes = '';
			$library = '';
			$use_amazon_yes = '';
			$isbn = '';
			$title = '';
			$author = '';
			$author_url = '';
			$category = '';
			$price = '';
			$pages = '';
			$pub_year = '';
			$publisher = '';
			$description = '';
			$subject = '';
			$country = '';
			$notes = '';
			$rating = '';
			$image = '';
			$finished = '';
			$date_finished = '';
			$signed = '';
			$first_edition = '';
			$page_yes = '';
			$post_yes = '';
			$swap_yes = '';
			$copies = '';
			$woocommerce = '';
			$saleprice = '';
			$regularprice = '';
			$stock = '';
			$length = '';
			$width = '';
			$height = '';
			$weight = '';
			$sku = '';
			$virtual = '';
			$download = '';
			$woofile = '';
			$salebegin = '';
			$saleend = '';
			$purchasenote = '';
			$productcategory = '';
			$reviews = '';
			$crosssells = '';
			$upsells = '';

			if(isset($_POST['amazonAuthYes'])){
				$amazon_auth_yes = filter_var($_POST['amazonAuthYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['library'])){
				$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['useAmazonYes'])){
				$use_amazon_yes = filter_var($_POST['useAmazonYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['isbn'])){
				$isbn = filter_var($_POST['isbn'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['title'])){
				$title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['author'])){
				$author = filter_var($_POST['author'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['authorUrl'])){
				$author_url = filter_var($_POST['authorUrl'],FILTER_SANITIZE_URL);
			}

			if(isset($_POST['category'])){
				$category = filter_var($_POST['category'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['price'])){
				$price = filter_var($_POST['price'],FILTER_SANITIZE_STRING);
			}	

			if(isset($_POST['pages'])){
				$pages = filter_var($_POST['pages'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['pubYear'])){
				$pub_year = filter_var($_POST['pubYear'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['publisher'])){
				$publisher = filter_var($_POST['publisher'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['description'])){
				$description = filter_var(htmlentities($_POST['description']),FILTER_SANITIZE_STRING);
			}	

			if(isset($_POST['subject'])){
				$subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['country'])){
				$country = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['notes'])){
				$notes = filter_var(htmlentities($_POST['notes']),FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['rating'])){
				$rating = filter_var($_POST['rating'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['image'])){
				$image = filter_var($_POST['image'],FILTER_SANITIZE_URL);
			}

			if(isset($_POST['finished'])){
				$finished = filter_var($_POST['finished'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['dateFinished'])){
				$date_finished = filter_var($_POST['dateFinished'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['signed'])){
				$signed = filter_var($_POST['signed'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['firstEdition'])){
				$first_edition = filter_var($_POST['firstEdition'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['pageYes'])){
				$page_yes = filter_var($_POST['pageYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['postYes'])){
				$post_yes = filter_var($_POST['postYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['swapYes'])){
				$swap_yes = filter_var($_POST['swapYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['copies'])){
				$copies = filter_var($_POST['copies'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['woocommerce'])){
				$woocommerce = filter_var($_POST['woocommerce'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['saleprice'])){
				$saleprice = filter_var($_POST['saleprice'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['regularprice'])){
				$regularprice = filter_var($_POST['regularprice'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['stock'])){
				$stock = filter_var($_POST['stock'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['length'])){
				$length = filter_var($_POST['length'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['width'])){
				$width = filter_var($_POST['width'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['height'])){
				$height = filter_var($_POST['height'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['weight'])){
				$weight = filter_var($_POST['weight'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['sku'])){
				$sku = filter_var($_POST['sku'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['virtual'])){
				$virtual = filter_var($_POST['virtual'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['download'])){
				$download = filter_var($_POST['download'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['woofile'])){
				$woofile = filter_var($_POST['woofile'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['salebegin'])){
				$salebegin = filter_var($_POST['salebegin'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['saleend'])){
				$saleend = filter_var($_POST['saleend'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['purchasenote'])){
				$purchasenote = filter_var($_POST['purchasenote'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['productcategory'])){
				$productcategory = filter_var($_POST['productcategory'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['reviews'])){
				$reviews = filter_var($_POST['reviews'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['crosssells'])){
				$crosssells = filter_var($_POST['crosssells'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['upsells'])){
				$upsells = filter_var($_POST['upsells'],FILTER_SANITIZE_STRING);
			}


			$book_array = array(
				'amazon_auth_yes' => $amazon_auth_yes,
				'library' => $library,
				'use_amazon_yes' => $use_amazon_yes,
				'isbn' => $isbn,
				'title' => $title,
				'author' => $author,
				'author_url' => $author_url,
				'category' => $category,
				'price' => $price,
				'pages' => $pages,
				'pub_year' => $pub_year,
				'publisher' => $publisher,
				'description' => $description,
				'subject' => $subject,
				'country' => $country,
				'notes' => $notes,
				'rating' => $rating,
				'image' => $image,
				'finished' => $finished,
				'date_finished' => $date_finished,
				'signed' => $signed,
				'first_edition' => $first_edition,
				'page_yes' => $page_yes,
				'post_yes' => $post_yes,
				'swap_yes' => $swap_yes,
				'copies' => $copies,
				'woocommerce' => $woocommerce,
				'saleprice' => $saleprice,
				'regularprice' => $regularprice,
				'stock' => $stock,
				'length' => $length,
				'width' => $width,
				'height' => $height,
				'weight' => $weight,
				'sku' => $sku,
				'virtual' => $virtual,
				'download' => $download,
				'woofile' => $woofile,
				'salebegin' => $salebegin,
				'saleend' => $saleend,
				'purchasenote' => $purchasenote,
				'productcategory' => $productcategory,
				'reviews' => $reviews,
				'crosssells' => $crosssells,
				'upsells' => $upsells,
			);

			// Now adding in any custom fields to above arrays for insertion into DB.
			$this->user_options = $wpdb->get_row( 'SELECT * FROM ' . $wpdb->prefix . 'wpbooklist_jre_user_options' );
			$this->user_options->customfields;

			// Loop through the Custom Fields.
			if ( false !== stripos( $this->user_options->customfields, '--' ) ) {
				$fields = explode( '--', $this->user_options->customfields );

				// Loop through each custom field entry.
				foreach ( $fields as $key => $entry ) {

					if ( false !== stripos( $entry, ';' ) ) {
						$entry_details = explode( ';', $entry );

						// All kinds of checks to make sure good value exists.
						if ( array_key_exists( 0, $entry_details ) && isset( $entry_details[0] ) && '' !== $entry_details[0] && null !== $entry_details[0] ) {

							// Add new value with key into DB array.
							if ( isset($_POST[ $entry_details[0] ] ) ) {
								$book_array[ $entry_details[0] ] = filter_var($_POST[ $entry_details[0] ], FILTER_SANITIZE_STRING );
							}	
						}
					}
				}
			}

			error_log(print_r($book_array,true));

			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book('add', $book_array, null);
			$insert_result = explode(',',$book_class->add_result);
			// If book added succesfully, get the ID of the book we just inserted, and return the result and that ID
			if($insert_result[0] == 1){
				$book_table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';
		  		$id_result = $insert_result[1];
		  		$row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $library WHERE ID = %d", $id_result));

		  		// Get saved page URL
		  		$pageurl = '';
				$table_name = $wpdb->prefix.'wpbooklist_jre_saved_page_post_log';
		  		$page_results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE book_uid = %s AND type = 'page'" , $row->book_uid));
		  		if(is_object($page_results)){
		  			$pageurl = $page_results->post_url;
		  		}

		  		// Get saved post URL
		  		$posturl = '';
				$table_name = $wpdb->prefix.'wpbooklist_jre_saved_page_post_log';
		  		$post_results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE book_uid = %s AND type = 'post'", $row->book_uid));
		  		if(is_object($post_results)){
		  			$posturl = $post_results->post_url;
		  		}

		  		echo $insert_result[0].'--sep--'.$id_result.'--sep--'.$library.'--sep--'.$page_yes.'--sep--'.$post_yes.'--sep--'.$pageurl.'--sep--'.$posturl.'--sep--'.$book_class->apireport.'--sep--'.json_encode($book_class->whichapifound).'--sep--'.$book_class->apiamazonfailcount.'--sep--'.$book_class->amazon_transient_use.'--sep--'.$book_class->google_transient_use.'--sep--'.$book_class->openlib_transient_use.'--sep--'.$book_class->itunes_transient_use.'--sep--'.$book_class->itunes_audio_transient_use;
			} else {
				echo $insert_result[0].'--sep--'.$insert_result[1];
			}

			wp_die();
		}

		/**
		 * Callback function for showing books in the colorbox window
		 */
		public function wpbooklist_show_book_in_colorbox_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_show_book_in_colorbox_action_callback', 'security' );
			$book_id = filter_var($_POST['bookId'],FILTER_SANITIZE_NUMBER_INT);
			$book_table = filter_var($_POST['bookTable'],FILTER_SANITIZE_STRING);
			$sortParam = filter_var($_POST['sortParam'],FILTER_SANITIZE_STRING);

			// Double-check that Amazon review isn't expired
			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book = new WPBookList_Book($book_id, $book_table);
			$book->refresh_amazon_review($book_id, $book_table);

			// Instantiate the class that shows the book in colorbox
			require_once(CLASS_DIR.'class-show-book-in-colorbox.php');
			$colorbox = new WPBookList_Show_Book_In_Colorbox($book_id, $book_table, null, $sortParam);

			echo $colorbox->output.'---sep---'.$colorbox->isbn;
			wp_die();
		}


		

		public function wpbooklist_new_library_action_callback() {
		  // Grabbing the existing options from DB
		  global $wpdb;
		  global $charset_collate;
		  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		  check_ajax_referer( 'wpbooklist_new_library_action_callback', 'security' );
		  $table_name_dynamic = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
		  $db_name;

		  function wpbooklist_clean($string) {
		      $string = str_replace(' ', '_', $string); // Replaces all spaces with underscores.
		      $string = str_replace('-', '_', $string);
		      return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		  }
		 
		  // Create a new custom table
		  if(isset($_POST['currentval'])){
		      $db_name = sanitize_text_field($_POST['currentval']);
		      $db_name = wpbooklist_clean($db_name);
		  }

		  // Delete the table
		  if(isset($_POST['table'])){ 
		      $table = $wpdb->prefix."wpbooklist_jre_".sanitize_text_field($_POST['table']);
		      $pos = strripos($table,"_");
		      $table = substr($table, 0, $pos);
		      echo $table;
		      $wpdb->query("DROP TABLE IF EXISTS $table");

		      $delete_from_list = sanitize_text_field($_POST['table']);
		      $pos2 = strripos($delete_from_list,"_");
		      $delete_id = substr($delete_from_list, ($pos2+1));
		      $wpdb->delete( $table_name_dynamic, array( 'ID' => $delete_id ), array( '%d' ) );
		         
		      // Dropping primary key in database to alter the IDs and the AUTO_INCREMENT value
		      $table_name_dynamic = str_replace('\'', '`', $table_name_dynamic);
		      $wpdb->query("ALTER TABLE $table_name_dynamic MODIFY ID bigint(190) NOT NULL");

		      $wpdb->query("ALTER TABLE $table_name_dynamic DROP PRIMARY KEY");

		      // Adjusting ID values of remaining entries in database
		      $my_query = $wpdb->get_results("SELECT * FROM $table_name_dynamic");
		      $title_count = $wpdb->num_rows;

		      for ($x = $delete_id ; $x <= $title_count; $x++) {
		        $data = array(
		            'ID' => $delete_id 
		        );
		        $format = array( '%s'); 
		        $delete_id ++;  
		        $where = array( 'ID' => ($delete_id ) );
		        $where_format = array( '%d' );
		        $wpdb->update( $table_name_dynamic, $data, $where, $format, $where_format );
		      }  
		        
		      // Adding primary key back to database 
		      $wpdb->query("ALTER TABLE $table_name_dynamic ADD PRIMARY KEY (`ID`)");    

		      $wpdb->query("ALTER TABLE $table_name_dynamic MODIFY ID bigint(190) AUTO_INCREMENT");

		      // Setting the AUTO_INCREMENT value based on number of remaining entries
		      $title_count++;
		      $query5 = $wpdb->prepare( "ALTER TABLE $table_name_dynamic AUTO_INCREMENT=%d",$title_count);
		      $query5 = str_replace('\'', '`', $query5);
		      $wpdb->query($query5);
		      
		  }

		  if(isset($db_name)){
		      if(($db_name != "")  ||  ($db_name != null)){
		          $wpdb->wpbooklist_jre_dynamic_db_name = "{$wpdb->prefix}wpbooklist_jre_{$db_name}";
		          $wpdb->wpbooklist_jre_dynamic_db_name_settings = "{$wpdb->prefix}wpbooklist_jre_settings_{$db_name}";
		          $wpdb->wpbooklist_jre_list_dynamic_db_names = "{$wpdb->prefix}wpbooklist_jre_list_dynamic_db_names";
		          $sql_create_table = "CREATE TABLE {$wpdb->wpbooklist_jre_dynamic_db_name} 
		          (
		            ID bigint(190) auto_increment,
					amazon_detail_page varchar(255),
					author varchar(255),
					author2 varchar(255),
					author3 varchar(255),
					author_url varchar(255),
					authorfirst varchar(255),
					authorlast varchar(255),
					authorfirst2 varchar(255),
					authorlast2 varchar(255),
					authorfirst3 varchar(255),
					authorlast3 varchar(255),
					backimage varchar(255),
					bam_link varchar(255),
					bn_link varchar(255),
					book_uid varchar(255),
					callnumber varchar(255),
					category varchar(255),
					copies bigint(255),
					copieschecked bigint(255),
					country varchar(255),
					currentlendemail varchar(255),
					currentlendname varchar(255),
					date_finished varchar(255),
					description MEDIUMTEXT, 
					finished varchar(255),
					first_edition varchar(255),
					format varchar(255),
					genre varchar(255),
					google_preview varchar(255),
					illustrator varchar(255),
					image varchar(255),
					isbn varchar(190),
					isbn13 varchar(190),
					asin varchar(190),
					itunes_page varchar(255),
					keywords MEDIUMTEXT,
					kobo_link varchar(255),
					language varchar(255),
					lendable varchar(255),
					lendedon bigint(255),
					lendstatus varchar(255),
					notes MEDIUMTEXT,
					numberinseries varchar(255),
					originalpub_year bigint(255),
					originaltitle varchar(255),
					othereditions MEDIUMTEXT,
					outofprint varchar(255),
					page_yes varchar(255),
					pages bigint(255),
					post_yes varchar(255),
					price varchar(255),
					pub_year bigint(255),
					publisher varchar(255),
					rating bigint(255),
					review_iframe varchar(255),
					series varchar(255),
					shortdescription MEDIUMTEXT, 
					signed varchar(255),
					similar_products MEDIUMTEXT,
					similar_books MEDIUMTEXT,
					subgenre varchar(255),
					subject varchar(255),
					title varchar(255),
					woocommerce varchar(255),
		              PRIMARY KEY  (ID),
		                KEY isbn (isbn)
		          ) $charset_collate; ";
		          dbDelta( $sql_create_table );


		          $sql_create_table2 = "CREATE TABLE {$wpdb->wpbooklist_jre_dynamic_db_name_settings} 
				  (
			        ID bigint(190) auto_increment,
			        username varchar(190),
			        version varchar(255) NOT NULL DEFAULT '3.3',
			        amazonaff varchar(255) NOT NULL DEFAULT 'wpbooklistid-20',
			        amazonauth varchar(255),
			        itunesaff varchar(255) NOT NULL DEFAULT '1010lnPx',
			        enablepurchase bigint(255),
			        amazonapipublic varchar(255),
			        amazonapisecret varchar(255),
			        googleapi varchar(255),
			        appleapi varchar(255),
			        openlibraryapi varchar(255),
			        hidestats bigint(255),
			        hidesortby bigint(255),
			        hidesearch bigint(255),
			        hidefilter bigint(255),
			        hidebooktitle bigint(255),
			        hidebookimage bigint(255),
			        hidefinished bigint(255),
			        hidelibrarytitle bigint(255),
			        hideauthor bigint(255),
			        hidecategory bigint(255),
			        hidepages bigint(255),
			        hidebookpage bigint(255),
			        hidebookpost bigint(255),
			        hidepublisher bigint(255),
			        hidepubdate bigint(255),
			        hidesigned bigint(255),
			        hidesubject bigint(255),
			        hidecountry bigint(255),
			        hidefirstedition bigint(255),
			        hidefinishedsort bigint(255),
			        hidesignedsort bigint(255),
			        hidefirstsort bigint(255),
			        hidesubjectsort bigint(255),
			        hidefacebook bigint(255),
			        hidemessenger bigint(255),
			        hidetwitter bigint(255),
			        hidegoogleplus bigint(255),
			        hidepinterest bigint(255),
			        hideemail bigint(255),
			        hidefrontendbuyimg bigint(255),
			        hidefrontendbuyprice bigint(255),
			        hidecolorboxbuyimg bigint(255),
			        hidecolorboxbuyprice bigint(255),
			        hidegoodreadswidget bigint(255),
			        hidedescription bigint(255),
			        hidesimilar bigint(255),
			        hideamazonreview bigint(255),
			        hidenotes bigint(255),
			        hidegooglepurchase bigint(255),
			        hidefeaturedtitles bigint(255),
			        hidebnpurchase bigint(255),
			        hideitunespurchase bigint(255),
			        hideamazonpurchase bigint(255),
			        hiderating bigint(255),
			        hideratingbook bigint(255),
			        hidequote bigint(255),
			        hidequotebook bigint(255),
			        sortoption varchar(255),
			        booksonpage bigint(255) NOT NULL DEFAULT 12,
			        amazoncountryinfo varchar(255) NOT NULL DEFAULT 'US',
			        stylepak varchar(255) NOT NULL DEFAULT 'Default',
			        admindismiss bigint(255) NOT NULL DEFAULT 1,
			        activeposttemplate varchar(255),
			        activepagetemplate varchar(255),
			        hidekindleprev bigint(255),
			        hidegoogleprev bigint(255),
			        hidebampurchase bigint(255),
			        hidekobopurchase bigint(255),
			        adminmessage varchar(10000) NOT NULL DEFAULT '".ADMIN_MESSAGE."',
			        PRIMARY KEY  (ID),
		          	KEY username (username)
				  ) $charset_collate; ";
				  dbDelta( $sql_create_table2 );

				  	$table_name = $wpdb->wpbooklist_jre_dynamic_db_name_settings;
		  			$wpdb->insert( $table_name, array('ID' => 1));

		          $wpdb->insert( $table_name_dynamic, array('user_table_name' => $db_name ));
		      }
		  }
		      
		  wp_die();
		}

		public function wpbooklist_delete_library_action_callback() {
		  // Grabbing the existing options from DB
		  global $wpdb;
		  global $charset_collate;
		  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		  check_ajax_referer( 'wpbooklist_delete_library_action_callback', 'security' );
		  $table_name_dynamic = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
		  $db_name;

		  function wpbooklist_clean($string) {
		      $string = str_replace(' ', '_', $string); // Replaces all spaces with underscores.
		      $string = str_replace('-', '_', $string);
		      return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		  }
		 
		  // Create a new custom table
		  if(isset($_POST['currentval'])){
		      $db_name = sanitize_text_field($_POST['currentval']);
		      $db_name = wpbooklist_clean($db_name);
		  }

		  // Delete the table

			$table = $wpdb->prefix."wpbooklist_jre_".sanitize_text_field($_POST['table']);
			$pos = strripos($table,"_");
			$table = substr($table, 0, $pos);
			echo $table;
			$wpdb->query("DROP TABLE IF EXISTS $table");

			$delete_from_list = sanitize_text_field($_POST['table']);
			$pos2 = strripos($delete_from_list,"_");
			$delete_id = substr($delete_from_list, ($pos2+1));
			$wpdb->delete( $table_name_dynamic, array( 'ID' => $delete_id ), array( '%d' ) );
			 
			// Dropping primary key in database to alter the IDs and the AUTO_INCREMENT value
			$table_name_dynamic = str_replace('\'', '`', $table_name_dynamic);
			$wpdb->query("ALTER TABLE $table_name_dynamic MODIFY ID bigint(190) NOT NULL");

			$wpdb->query("ALTER TABLE $table_name_dynamic DROP PRIMARY KEY");

			// Adjusting ID values of remaining entries in database
			$my_query = $wpdb->get_results("SELECT * FROM $table_name_dynamic");
			$title_count = $wpdb->num_rows;

			for ($x = $delete_id ; $x <= $title_count; $x++) {
			$data = array(
			    'ID' => $delete_id 
			);
			$format = array( '%s'); 
			$delete_id ++;  
			$where = array( 'ID' => ($delete_id ) );
			$where_format = array( '%d' );
			$wpdb->update( $table_name_dynamic, $data, $where, $format, $where_format );
			}  

			// Adding primary key back to database 
			$wpdb->query("ALTER TABLE $table_name_dynamic ADD PRIMARY KEY (`ID`)");    

			$wpdb->query("ALTER TABLE $table_name_dynamic MODIFY ID bigint(190) AUTO_INCREMENT");

			// Setting the AUTO_INCREMENT value based on number of remaining entries
			$title_count++;
			$query5 = $wpdb->prepare( "ALTER TABLE $table_name_dynamic AUTO_INCREMENT=%d",$title_count);
			$query5 = str_replace('\'', '`', $query5);
			$wpdb->query($query5);
		  	wp_die();
		}

		// Callback function for saving library display options
		public function wpbooklist_dashboard_save_library_display_options_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_dashboard_save_library_display_options_action_callback', 'security' );

			$enablepurchase = filter_var($_POST['enablepurchase'],FILTER_SANITIZE_STRING);
			$hidesearch = filter_var($_POST['hidesearch'],FILTER_SANITIZE_STRING);
			$hidefacebook = filter_var($_POST['hidefacebook'],FILTER_SANITIZE_STRING);
			$hidetwitter = filter_var($_POST['hidetwitter'],FILTER_SANITIZE_STRING);
			$hidegoogleplus = filter_var($_POST['hidegoogleplus'],FILTER_SANITIZE_STRING);
			$hidemessenger = filter_var($_POST['hidemessenger'],FILTER_SANITIZE_STRING);
			$hidepinterest = filter_var($_POST['hidepinterest'],FILTER_SANITIZE_STRING);
			$hideemail = filter_var($_POST['hideemail'],FILTER_SANITIZE_STRING);
			$hidestats = filter_var($_POST['hidestats'],FILTER_SANITIZE_STRING);
			$hidefilter = filter_var($_POST['hidefilter'],FILTER_SANITIZE_STRING);
			$hidegoodreadswidget = filter_var($_POST['hidegoodreadswidget'],FILTER_SANITIZE_STRING);
			$hideamazonreview = filter_var($_POST['hideamazonreview'],FILTER_SANITIZE_STRING);
			$hidedescription = filter_var($_POST['hidedescription'],FILTER_SANITIZE_STRING);
			$hidesimilar = filter_var($_POST['hidesimilar'],FILTER_SANITIZE_STRING);
			$hidebooktitle = filter_var($_POST['hidebooktitle'],FILTER_SANITIZE_STRING);
			$hidebookimage = filter_var($_POST['hidebookimage'],FILTER_SANITIZE_STRING);
			$hidefinished = filter_var($_POST['hidefinished'],FILTER_SANITIZE_STRING);
			$hidefinishedsort = filter_var($_POST['hidefinishedsort'],FILTER_SANITIZE_STRING);
			$hidesignedsort = filter_var($_POST['hidesignedsort'],FILTER_SANITIZE_STRING);
			$hidefirstsort = filter_var($_POST['hidefirstsort'],FILTER_SANITIZE_STRING);
			$hidesubjectsort = filter_var($_POST['hidesubjectsort'],FILTER_SANITIZE_STRING);
			$hidelibrarytitle = filter_var($_POST['hidelibrarytitle'],FILTER_SANITIZE_STRING);
			$hideauthor = filter_var($_POST['hideauthor'],FILTER_SANITIZE_STRING);
			$hidecategory = filter_var($_POST['hidecategory'],FILTER_SANITIZE_STRING);
			$hidepages = filter_var($_POST['hidepages'],FILTER_SANITIZE_STRING);
			$hidebookpage = filter_var($_POST['hidebookpage'],FILTER_SANITIZE_STRING);
			$hidebookpost = filter_var($_POST['hidebookpost'],FILTER_SANITIZE_STRING);	
			$hidepublisher = filter_var($_POST['hidepublisher'],FILTER_SANITIZE_STRING);
			$hidepubdate = filter_var($_POST['hidepubdate'],FILTER_SANITIZE_STRING);
			$hidesigned = filter_var($_POST['hidesigned'],FILTER_SANITIZE_STRING);
			$hidesubject = filter_var($_POST['hidesubject'],FILTER_SANITIZE_STRING);
			$hidecountry = filter_var($_POST['hidecountry'],FILTER_SANITIZE_STRING);
			$hidefirstedition= filter_var($_POST['hidefirstedition'],FILTER_SANITIZE_STRING); 
			$hidefeaturedtitles = filter_var($_POST['hidefeaturedtitles'],FILTER_SANITIZE_STRING);
			$hidenotes = filter_var($_POST['hidenotes'],FILTER_SANITIZE_STRING);
			$hidequotebook = filter_var($_POST['hidequotebook'],FILTER_SANITIZE_STRING);
			$hidequote = filter_var($_POST['hidequote'],FILTER_SANITIZE_STRING);
			$hideratingbook = filter_var($_POST['hideratingbook'],FILTER_SANITIZE_STRING);
			$hiderating = filter_var($_POST['hiderating'],FILTER_SANITIZE_STRING);
			$hidegooglepurchase = filter_var($_POST['hidegooglepurchase'],FILTER_SANITIZE_STRING);
			$hideamazonpurchase = filter_var($_POST['hideamazonpurchase'],FILTER_SANITIZE_STRING);
			$hidebnpurchase = filter_var($_POST['hidebnpurchase'],FILTER_SANITIZE_STRING);
			$hideitunespurchase = filter_var($_POST['hideitunespurchase'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyimg = filter_var($_POST['hidefrontendbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyimg = filter_var($_POST['hidecolorboxbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyprice = filter_var($_POST['hidecolorboxbuyprice'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyprice = filter_var($_POST['hidefrontendbuyprice'],FILTER_SANITIZE_STRING);
			$hidekindleprev = filter_var($_POST['hidekindleprev'],FILTER_SANITIZE_STRING);
			$hidegoogleprev = filter_var($_POST['hidegoogleprev'],FILTER_SANITIZE_STRING);
			$hidekobopurchase = filter_var($_POST['hidekobopurchase'],FILTER_SANITIZE_STRING);
			$hidebampurchase = filter_var($_POST['hidebampurchase'],FILTER_SANITIZE_STRING);
			$sortoption = filter_var($_POST['sortoption'],FILTER_SANITIZE_STRING);
			$booksonpage = filter_var($_POST['booksonpage'], FILTER_SANITIZE_NUMBER_INT);
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);

			$settings_array = array(
				'enablepurchase' => $enablepurchase,
				'hidesearch' => $hidesearch,
				'hidefacebook' => $hidefacebook,
				'hidetwitter' => $hidetwitter,
				'hidegoogleplus' => $hidegoogleplus,
				'hidemessenger' => $hidemessenger,
				'hidepinterest' => $hidepinterest,
				'hideemail' => $hideemail,
				'hidestats' => $hidestats,
				'hidequote' => $hidequote,
				'hidefilter' => $hidefilter,
				'hidegoodreadswidget' => $hidegoodreadswidget,
				'hideamazonreview' => $hideamazonreview,
				'hidedescription' => $hidedescription,
				'hidesimilar' => $hidesimilar,
				'hidebooktitle'=> $hidebooktitle,
				'hidebookimage' => $hidebookimage,
				'hidefinished'=> $hidefinished,
				'hidefinishedsort' => $hidefinishedsort,
				'hidesignedsort' => $hidesignedsort,
				'hidefirstsort' => $hidefirstsort,
				'hidesubjectsort' => $hidesubjectsort,
				'hidelibrarytitle'=> $hidelibrarytitle,
				'hideauthor'=> $hideauthor,
				'hidecategory'=> $hidecategory,
				'hidepages'=> $hidepages,
				'hidebookpage'=> $hidebookpage,
				'hidebookpost'=> $hidebookpost,
				'hidepublisher'=> $hidepublisher,
				'hidepubdate'=> $hidepubdate,
				'hidesigned'=> $hidesigned,
				'hidesubject'=> $hidesubject,
				'hidecountry'=> $hidecountry,
				'hidefirstedition'=> $hidefirstedition,
				'hidefeaturedtitles' => $hidefeaturedtitles,
				'hidenotes' => $hidenotes,
				'hidequotebook' => $hidequotebook,
				'hiderating' => $hiderating,
				'hideratingbook' => $hideratingbook,
				'hidegooglepurchase' => $hidegooglepurchase,
				'hideamazonpurchase' => $hideamazonpurchase,
				'hidebnpurchase' => $hidebnpurchase,
				'hideitunespurchase' => $hideitunespurchase,
				'hidefrontendbuyimg' => $hidefrontendbuyimg,
				'hidecolorboxbuyimg' => $hidecolorboxbuyimg,
				'hidecolorboxbuyprice' => $hidecolorboxbuyprice,
				'hidefrontendbuyprice' => $hidefrontendbuyprice,
				'hidekindleprev' => $hidekindleprev,
				'hidegoogleprev' => $hidegoogleprev,
				'hidebampurchase' => $hidebampurchase,
				'hidekobopurchase' => $hidekobopurchase,
				'sortoption' => $sortoption,
				'booksonpage' => $booksonpage
			);

			require_once(CLASS_DIR.'class-display-options.php');
			$settings_class = new WPBookList_Display_Options();
			$settings_class->save_library_settings($library, $settings_array);
			wp_die();
		}

		// Callback function for saving post display options
		public function wpbooklist_dashboard_save_post_display_options_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_dashboard_save_post_display_options_action_callback', 'security' );

			$enablepurchase = filter_var($_POST['enablepurchase'],FILTER_SANITIZE_STRING);
			$hidefacebook = filter_var($_POST['hidefacebook'],FILTER_SANITIZE_STRING);
			$hidetwitter = filter_var($_POST['hidetwitter'],FILTER_SANITIZE_STRING);
			$hidegoogleplus = filter_var($_POST['hidegoogleplus'],FILTER_SANITIZE_STRING);
			$hidemessenger = filter_var($_POST['hidemessenger'],FILTER_SANITIZE_STRING);
			$hidepinterest = filter_var($_POST['hidepinterest'],FILTER_SANITIZE_STRING);
			$hideemail = filter_var($_POST['hideemail'],FILTER_SANITIZE_STRING);
			$hideamazonreview = filter_var($_POST['hideamazonreview'],FILTER_SANITIZE_STRING);
			$hidedescription = filter_var($_POST['hidedescription'],FILTER_SANITIZE_STRING);
			$hidesimilar = filter_var($_POST['hidesimilar'],FILTER_SANITIZE_STRING);
			$hidetitle = filter_var($_POST['hidetitle'],FILTER_SANITIZE_STRING);
			$hidebookimage = filter_var($_POST['hidebookimage'],FILTER_SANITIZE_STRING);
			$hidefinished = filter_var($_POST['hidefinished'],FILTER_SANITIZE_STRING);
			$hideauthor = filter_var($_POST['hideauthor'],FILTER_SANITIZE_STRING);
			$hidecategory = filter_var($_POST['hidecategory'],FILTER_SANITIZE_STRING);
			$hidepages = filter_var($_POST['hidepages'],FILTER_SANITIZE_STRING);
			$hidepublisher = filter_var($_POST['hidepublisher'],FILTER_SANITIZE_STRING);
			$hidepubdate = filter_var($_POST['hidepubdate'],FILTER_SANITIZE_STRING);
			$hidesigned = filter_var($_POST['hidesigned'],FILTER_SANITIZE_STRING);
			$hidesubject = filter_var($_POST['hidesubject'],FILTER_SANITIZE_STRING);
			$hidecountry = filter_var($_POST['hidecountry'],FILTER_SANITIZE_STRING);
			$hidefirstedition= filter_var($_POST['hidefirstedition'],FILTER_SANITIZE_STRING); 
			$hidefeaturedtitles = filter_var($_POST['hidefeaturedtitles'],FILTER_SANITIZE_STRING);
			$hidenotes = filter_var($_POST['hidenotes'],FILTER_SANITIZE_STRING);
			$hidequote = filter_var($_POST['hidequote'],FILTER_SANITIZE_STRING);
			$hiderating = filter_var($_POST['hiderating'],FILTER_SANITIZE_STRING);
			$hidegooglepurchase = filter_var($_POST['hidegooglepurchase'],FILTER_SANITIZE_STRING);
			$hideamazonpurchase = filter_var($_POST['hideamazonpurchase'],FILTER_SANITIZE_STRING);
			$hidebnpurchase = filter_var($_POST['hidebnpurchase'],FILTER_SANITIZE_STRING);
			$hideitunespurchase = filter_var($_POST['hideitunespurchase'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyimg = filter_var($_POST['hidefrontendbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyimg = filter_var($_POST['hidecolorboxbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyprice = filter_var($_POST['hidecolorboxbuyprice'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyprice = filter_var($_POST['hidefrontendbuyprice'],FILTER_SANITIZE_STRING);
			$hidekindleprev = filter_var($_POST['hidekindleprev'],FILTER_SANITIZE_STRING);
			$hidegoogleprev = filter_var($_POST['hidegoogleprev'],FILTER_SANITIZE_STRING);
			$hidekobopurchase = filter_var($_POST['hidekobopurchase'],FILTER_SANITIZE_STRING);
			$hidebampurchase = filter_var($_POST['hidebampurchase'],FILTER_SANITIZE_STRING);

			$settings_array = array(
				'enablepurchase' => $enablepurchase,
				'hidefacebook' => $hidefacebook,
				'hidetwitter' => $hidetwitter,
				'hidegoogleplus' => $hidegoogleplus,
				'hidemessenger' => $hidemessenger,
				'hidepinterest' => $hidepinterest,
				'hideemail' => $hideemail,
				'hidequote' => $hidequote,
				'hideamazonreview' => $hideamazonreview,
				'hidedescription' => $hidedescription,
				'hidesimilar' => $hidesimilar,
				'hidetitle'=> $hidetitle,
				'hidebookimage' => $hidebookimage,
				'hidefinished'=> $hidefinished,
				'hideauthor'=> $hideauthor,
				'hidecategory'=> $hidecategory,
				'hidepages'=> $hidepages,
				'hidepublisher'=> $hidepublisher,
				'hidepubdate'=> $hidepubdate,
				'hidesigned'=> $hidesigned,
				'hidesubject'=> $hidesubject,
				'hidecountry'=> $hidecountry,
				'hidefirstedition'=> $hidefirstedition,
				'hidefeaturedtitles' => $hidefeaturedtitles,
				'hidenotes' => $hidenotes,
				'hiderating' => $hiderating,
				'hidegooglepurchase' => $hidegooglepurchase,
				'hideamazonpurchase' => $hideamazonpurchase,
				'hidebnpurchase' => $hidebnpurchase,
				'hideitunespurchase' => $hideitunespurchase,
				'hidefrontendbuyimg' => $hidefrontendbuyimg,
				'hidecolorboxbuyimg' => $hidecolorboxbuyimg,
				'hidecolorboxbuyprice' => $hidecolorboxbuyprice,
				'hidefrontendbuyprice' => $hidefrontendbuyprice,
				'hidekindleprev' => $hidekindleprev,
				'hidegoogleprev' => $hidegoogleprev,
				'hidebampurchase' => $hidebampurchase,
				'hidekobopurchase' => $hidekobopurchase
			);

			require_once(CLASS_DIR.'class-display-options.php');
			$settings_class = new WPBookList_Display_Options();
			$settings_class->save_post_settings($settings_array);
			wp_die();
		}

		// Callback function for saving page display options
		public function wpbooklist_dashboard_save_page_display_options_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_dashboard_save_page_display_options_action_callback', 'security' );

			$enablepurchase = filter_var($_POST['enablepurchase'],FILTER_SANITIZE_STRING);
			$hidefacebook = filter_var($_POST['hidefacebook'],FILTER_SANITIZE_STRING);
			$hidetwitter = filter_var($_POST['hidetwitter'],FILTER_SANITIZE_STRING);
			$hidegoogleplus = filter_var($_POST['hidegoogleplus'],FILTER_SANITIZE_STRING);
			$hidemessenger = filter_var($_POST['hidemessenger'],FILTER_SANITIZE_STRING);
			$hidepinterest = filter_var($_POST['hidepinterest'],FILTER_SANITIZE_STRING);
			$hideemail = filter_var($_POST['hideemail'],FILTER_SANITIZE_STRING);
			$hideamazonreview = filter_var($_POST['hideamazonreview'],FILTER_SANITIZE_STRING);
			$hidedescription = filter_var($_POST['hidedescription'],FILTER_SANITIZE_STRING);
			$hidesimilar = filter_var($_POST['hidesimilar'],FILTER_SANITIZE_STRING);
			$hidetitle = filter_var($_POST['hidetitle'],FILTER_SANITIZE_STRING);
			$hidebookimage = filter_var($_POST['hidebookimage'],FILTER_SANITIZE_STRING);
			$hidefinished = filter_var($_POST['hidefinished'],FILTER_SANITIZE_STRING);
			$hideauthor = filter_var($_POST['hideauthor'],FILTER_SANITIZE_STRING);
			$hidecategory = filter_var($_POST['hidecategory'],FILTER_SANITIZE_STRING);
			$hidepages = filter_var($_POST['hidepages'],FILTER_SANITIZE_STRING);
			$hidepublisher = filter_var($_POST['hidepublisher'],FILTER_SANITIZE_STRING);
			$hidepubdate = filter_var($_POST['hidepubdate'],FILTER_SANITIZE_STRING);
			$hidesigned = filter_var($_POST['hidesigned'],FILTER_SANITIZE_STRING);
			$hidesubject = filter_var($_POST['hidesubject'],FILTER_SANITIZE_STRING);
			$hidecountry = filter_var($_POST['hidecountry'],FILTER_SANITIZE_STRING);
			$hidefirstedition= filter_var($_POST['hidefirstedition'],FILTER_SANITIZE_STRING); 
			$hidefeaturedtitles = filter_var($_POST['hidefeaturedtitles'],FILTER_SANITIZE_STRING);
			$hidenotes = filter_var($_POST['hidenotes'],FILTER_SANITIZE_STRING);
			$hidequote = filter_var($_POST['hidequote'],FILTER_SANITIZE_STRING);
			$hiderating = filter_var($_POST['hiderating'],FILTER_SANITIZE_STRING);
			$hidegooglepurchase = filter_var($_POST['hidegooglepurchase'],FILTER_SANITIZE_STRING);
			$hideamazonpurchase = filter_var($_POST['hideamazonpurchase'],FILTER_SANITIZE_STRING);
			$hidebnpurchase = filter_var($_POST['hidebnpurchase'],FILTER_SANITIZE_STRING);
			$hideitunespurchase = filter_var($_POST['hideitunespurchase'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyimg = filter_var($_POST['hidefrontendbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyimg = filter_var($_POST['hidecolorboxbuyimg'],FILTER_SANITIZE_STRING);
			$hidecolorboxbuyprice = filter_var($_POST['hidecolorboxbuyprice'],FILTER_SANITIZE_STRING);
			$hidefrontendbuyprice = filter_var($_POST['hidefrontendbuyprice'],FILTER_SANITIZE_STRING);
			$hidekindleprev = filter_var($_POST['hidekindleprev'],FILTER_SANITIZE_STRING);
			$hidegoogleprev = filter_var($_POST['hidegoogleprev'],FILTER_SANITIZE_STRING);
			$hidekobopurchase = filter_var($_POST['hidekobopurchase'],FILTER_SANITIZE_STRING);
			$hidebampurchase = filter_var($_POST['hidebampurchase'],FILTER_SANITIZE_STRING);

			$settings_array = array(
				'enablepurchase' => $enablepurchase,
				'hidefacebook' => $hidefacebook,
				'hidetwitter' => $hidetwitter,
				'hidegoogleplus' => $hidegoogleplus,
				'hidemessenger' => $hidemessenger,
				'hidepinterest' => $hidepinterest,
				'hideemail' => $hideemail,
				'hidequote' => $hidequote,
				'hideamazonreview' => $hideamazonreview,
				'hidedescription' => $hidedescription,
				'hidesimilar' => $hidesimilar,
				'hidetitle'=> $hidetitle,
				'hidebookimage' => $hidebookimage,
				'hidefinished'=> $hidefinished,
				'hideauthor'=> $hideauthor,
				'hidecategory'=> $hidecategory,
				'hidepages'=> $hidepages,
				'hidepublisher'=> $hidepublisher,
				'hidepubdate'=> $hidepubdate,
				'hidesigned'=> $hidesigned,
				'hidesubject'=> $hidesubject,
				'hidecountry'=> $hidecountry,
				'hidefirstedition'=> $hidefirstedition,
				'hidefeaturedtitles' => $hidefeaturedtitles,
				'hidenotes' => $hidenotes,
				'hiderating' => $hiderating,
				'hidegooglepurchase' => $hidegooglepurchase,
				'hideamazonpurchase' => $hideamazonpurchase,
				'hidebnpurchase' => $hidebnpurchase,
				'hideitunespurchase' => $hideitunespurchase,
				'hidefrontendbuyimg' => $hidefrontendbuyimg,
				'hidecolorboxbuyimg' => $hidecolorboxbuyimg,
				'hidecolorboxbuyprice' => $hidecolorboxbuyprice,
				'hidefrontendbuyprice' => $hidefrontendbuyprice,
				'hidekindleprev' => $hidekindleprev,
				'hidegoogleprev' => $hidegoogleprev,
				'hidebampurchase' => $hidebampurchase,
				'hidekobopurchase' => $hidekobopurchase,

			);

			require_once(CLASS_DIR.'class-display-options.php');
			$settings_class = new WPBookList_Display_Options();
			$settings_class->save_page_settings($settings_array);
			wp_die();
		}

		// Callback function for saving library display options.
		public function wpbooklist_change_library_display_options_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_change_library_display_options_action_callback', 'security' );
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			$table_name = '';
			if($library == $wpdb->prefix.'wpbooklist_jre_saved_book_log'){
				$table_name = $wpdb->prefix.'wpbooklist_jre_user_options';
			} else {
				$library = explode('_', $library);
				$library = array_pop($library);
				$table_name = $wpdb->prefix.'wpbooklist_jre_settings_'.$library;
			}
			//$var2 = filter_var($_POST['var'],FILTER_SANITIZE_NUMBER_INT);
			$row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE ID = %d", 1));
			echo $jsonData = json_encode($row); 
			wp_die();
		}

		// Callback Function for showing the Edit Book form
		public function wpbooklist_edit_book_show_form_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_edit_book_show_form_action_callback', 'security' );
			$book_id = filter_var($_POST['bookId'],FILTER_SANITIZE_NUMBER_INT);
			$table = filter_var($_POST['table'],FILTER_SANITIZE_STRING);
			$book_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE ID = %d",$book_id));
			$crosssell_ids = '';
			$crosssell_titles = '';
			$upsell_ids = '';
			$upsell_titles = '';
			$product = 'null';
			$image_thumb = array();
			$id = null;
			$image_url["file"] = '';
			$image_url["name"] = '';
			$attachment = array();

			// Get Woocommerce product, if one exists
			// $product = array();
			$cat = '';
			if($book_data->woocommerce != null){
				//$product = wc_get_product( $book_data->woocommerce );
				$product = get_post_meta($book_data->woocommerce); 

				// Get all downloadable files associated with product
				if(array_key_exists('_downloadable_files', $product) && array_key_exists(0, $product["_downloadable_files"])){
					$df = json_encode(current(unserialize($product["_downloadable_files"][0])));
					$image_url = current(unserialize($product["_downloadable_files"][0]));
					$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url["file"] ));

					if(is_array($attachment) && array_key_exists(0, $attachment)){
						$image_thumb = wp_get_attachment_image_src($attachment[0], 'thumbnail');
					}
				}
				//$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
				//$image_url = $attachment[0]

				// Get crosssell IDs and titles
				$cs = unserialize($product["_crosssell_ids"][0]);
				foreach ($cs as $key => $value) {
				    $crosssell_ids = $crosssell_ids.','.$value;
				}

				// Get upsell IDs and titles
				$us = unserialize($product["_upsell_ids"][0]);
				foreach ($us as $key => $value) {
				    $upsell_ids = $upsell_ids.','.$value;
				}

				// Get product category
				$cat = get_the_terms ( $book_data->woocommerce, 'product_cat' );
				if(is_array($cat) && array_key_exists(0, $cat)){
					$cat = $cat[0]->name;
				} else {
					$cat = '';
				}

				$product = json_encode($product);
			}

			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$form = new WPBookList_Book;
			$edit_form = $form->display_edit_book_form();

			// Convert html entites back to normal as needed
			$book_data->title = stripslashes(html_entity_decode($book_data->title, ENT_QUOTES | ENT_XML1, 'UTF-8'));

			// Encode all book data for return trip
			$book_data = json_encode($book_data);

			// Check to see if Storefront extension is active
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if(is_plugin_active('wpbooklist-storefront/wpbooklist-storefront.php')){
				$storefront = 'true';
			} else {
				$storefront = 'false';
			}


			if(is_array($attachment) && array_key_exists(0, $attachment)){
				$attachment = $attachment[0];
			} else {
				$attachment = '';
			}

			

			echo $book_data.'–sep-seperator-sep–'.$edit_form.'–sep-seperator-sep–'.$product.'–sep-seperator-sep–'.$storefront.'–sep-seperator-sep–'.$crosssell_ids.'–sep-seperator-sep–'.$crosssell_ids.'–sep-seperator-sep–'.$upsell_ids.'–sep-seperator-sep–'.$upsell_ids.'–sep-seperator-sep–'.$cat.'–sep-seperator-sep–'.basename($image_url["file"]).'–sep-seperator-sep–'.$attachment;

			wp_die();
		}

		// Callback function for the Edit Book pagination.
		public function wpbooklist_edit_book_pagination_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_edit_book_pagination_action_callback', 'security' );
			$currentOffset = filter_var($_POST['currentOffset'],FILTER_SANITIZE_NUMBER_INT);
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);

			require_once(CLASS_BOOK_DIR.'class-edit-book-form.php');
			$form = new WPBookList_Edit_Book_Form;
			echo $form->output_edit_book_form($library, $currentOffset).'_Separator_'.$library;
			wp_die();
		}

		// Callback Function for switching libraries on the Edit Book tab
		public function wpbooklist_edit_book_switch_lib_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_edit_book_switch_lib_action_callback', 'security' );
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);

			require_once(CLASS_BOOK_DIR.'class-edit-book-form.php');
			$form = new WPBookList_Edit_Book_Form;
			echo $form->output_edit_book_form($library, 0).'_Separator_'.$library;

			wp_die();
		}

		// Callback Function for searching for a title to edit.
		public function wpbooklist_edit_book_search_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_edit_book_search_action_callback', 'security' );
			$search_term = filter_var($_POST['searchTerm'],FILTER_SANITIZE_STRING);
			$author_check = filter_var($_POST['authorCheck'],FILTER_SANITIZE_STRING);
			$title_check = filter_var($_POST['titleCheck'],FILTER_SANITIZE_STRING);
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);

			if($title_check == 'true'){
				$search_mode = 'title';
			}

			if($author_check == 'true'){
				$search_mode = 'author';
			}

			if($author_check == 'true' && $title_check == 'true'){
				$search_mode = 'both';
			}

			if($author_check != 'true' && $title_check != 'true'){
				$search_mode = 'both';
			}

			require_once(CLASS_BOOK_DIR.'class-edit-book-form.php');
			$form = new WPBookList_Edit_Book_Form;
			echo $form->output_edit_book_form($library, 0, $search_mode, $search_term).'_Separator_'.$library.'_Separator_'.$form->limit;
			wp_die();
		}


		// Callback function editing a book
		public function wpbooklist_edit_book_actual_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_edit_book_actual_action_callback', 'security' );
			
			// First set the variables we'll be passing to class-wpbooklist-book.php to ''
			$amazon_auth_yes = '';    
			$library = '';    
			$use_amazon_yes = '';    
			$isbn = '';    
			$title = '';    
			$author = '';    
			$author_url = '';    
			$category = '';    
			$price = '';    
			$pages = '';    
			$pub_year = '';    
			$publisher = '';    
			$description = '';    
			$subject = '';    
			$country = '';    
			$notes = '';    
			$rating = '';    
			$image = '';    
			$finished = '';    
			$date_finished = '';    
			$signed = '';    
			$first_edition = '';    
			$page_yes = '';    
			$post_yes = '';    
			$lendable = '';    
			$copies = '';    
			$page_id = '';    
			$post_id = '';    
			$book_uid = '';    
			$book_id = '';    
			$woocommerce = '';    
			$saleprice = '';    
			$regularprice = '';    
			$stock = '';    
			$length = '';    
			$width = '';    
			$height = '';    
			$weight = '';    
			$sku = '';    
			$virtual = '';    
			$download = '';    
			$woofile = '';    
			$salebegin = '';    
			$saleend = '';    
			$purchasenote = '';    
			$productcategory = '';    
			$reviews = '';    
			$crosssells = '';    
			$upsells = '';    
			$amazonbuylink = '';    
			$bnbuylink = '';    
			$googlebuylink = '';    
			$itunesbuylink = '';    
			$booksamillionbuylink = '';    
			$kobobuylink = ''; 

			if(isset($_POST['amazonAuthYes'])){
				$amazon_auth_yes = filter_var($_POST['amazonAuthYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['library'])){
				$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['useAmazonYes'])){
				$use_amazon_yes = filter_var($_POST['useAmazonYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['isbn'])){
				$isbn = filter_var($_POST['isbn'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['title'])){
				$title = filter_var($_POST['title'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['author'])){
				$author = filter_var($_POST['author'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['authorUrl'])){
				$author_url = filter_var($_POST['authorUrl'],FILTER_SANITIZE_URL);
			}

			if(isset($_POST['category'])){
				$category = filter_var($_POST['category'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['price'])){
				$price = filter_var($_POST['price'],FILTER_SANITIZE_STRING);
			}	

			if(isset($_POST['pages'])){
				$pages = filter_var($_POST['pages'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['pubYear'])){
				$pub_year = filter_var($_POST['pubYear'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['publisher'])){
				$publisher = filter_var($_POST['publisher'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['description'])){
				$description = filter_var(htmlentities($_POST['description']),FILTER_SANITIZE_STRING);
			}	

			if(isset($_POST['subject'])){
				$subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['country'])){
				$country = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['notes'])){
				$notes = filter_var(htmlentities($_POST['notes']),FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['rating'])){
				$rating = filter_var($_POST['rating'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['image'])){
				$image = filter_var($_POST['image'],FILTER_SANITIZE_URL);
			}

			if(isset($_POST['finished'])){
				$finished = filter_var($_POST['finished'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['dateFinished'])){
				$date_finished = filter_var($_POST['dateFinished'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['signed'])){
				$signed = filter_var($_POST['signed'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['firstEdition'])){
				$first_edition = filter_var($_POST['firstEdition'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['pageYes'])){
				$page_yes = filter_var($_POST['pageYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['postYes'])){
				$post_yes = filter_var($_POST['postYes'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['lendable'])){
				$signed = filter_var($_POST['lendable'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['copies'])){
				$copies = filter_var($_POST['copies'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['pageId'])){
				$page_yes = filter_var($_POST['pageId'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['postId'])){
				$post_yes = filter_var($_POST['postId'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['bookUid'])){
				$book_uid = filter_var($_POST['bookUid'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['woocommerce'])){
				$woocommerce = filter_var($_POST['woocommerce'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['saleprice'])){
				$saleprice = filter_var($_POST['saleprice'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['regularprice'])){
				$regularprice = filter_var($_POST['regularprice'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['stock'])){
				$stock = filter_var($_POST['stock'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['length'])){
				$length = filter_var($_POST['length'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['width'])){
				$width = filter_var($_POST['width'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['height'])){
				$height = filter_var($_POST['height'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['weight'])){
				$weight = filter_var($_POST['weight'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['sku'])){
				$sku = filter_var($_POST['sku'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['virtual'])){
				$virtual = filter_var($_POST['virtual'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['download'])){
				$download = filter_var($_POST['download'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['woofile'])){
				$woofile = filter_var($_POST['woofile'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['salebegin'])){
				$salebegin = filter_var($_POST['salebegin'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['saleend'])){
				$saleend = filter_var($_POST['saleend'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['purchasenote'])){
				$purchasenote = filter_var($_POST['purchasenote'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['productcategory'])){
				$productcategory = filter_var($_POST['productcategory'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['reviews'])){
				$reviews = filter_var($_POST['reviews'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['crosssells'])){
				$crosssells = filter_var($_POST['crosssells'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['upsells'])){
				$upsells = filter_var($_POST['upsells'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['amazonbuylink'])){
				$amazonbuylink = filter_var($_POST['amazonbuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['bnbuylink'])){
				$bnbuylink = filter_var($_POST['bnbuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['googlebuylink'])){
				$googlebuylink = filter_var($_POST['googlebuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['itunesbuylink'])){
				$itunesbuylink = filter_var($_POST['itunesbuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['booksamillionbuylink'])){
				$booksamillionbuylink = filter_var($_POST['booksamillionbuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['kobobuylink'])){
				$kobobuylink = filter_var($_POST['kobobuylink'],FILTER_SANITIZE_STRING);
			}

			if(isset($_POST['bookId'])){
				$book_id = filter_var($_POST['bookId'],FILTER_SANITIZE_STRING);
			}





			$book_array = array(
				'amazon_auth_yes' => $amazon_auth_yes,
				'library' => $library,
				'use_amazon_yes' => $use_amazon_yes,
				'isbn' => $isbn,
				'title' => $title,
				'author' => $author,
				'author_url' => $author_url,
				'category' => $category,
				'price' => $price,
				'pages' => $pages,
				'pub_year' => $pub_year,
				'publisher' => $publisher,
				'description' => $description,
				'subject' => $subject,
				'country' => $country,
				'notes' => $notes,
				'rating' => $rating,
				'image' => $image,
				'finished' => $finished,
				'date_finished' => $date_finished,
				'signed' => $signed,
				'first_edition' => $first_edition,
				'page_yes' => $page_yes,
				'post_yes' => $post_yes,
				'lendable' => $lendable,
				'copies' => $copies,
				'page_id' => $page_id,
				'post_id' => $post_id,
				'book_uid' => $book_uid,
				'woocommerce' => $woocommerce,
				'saleprice' => $saleprice,
				'regularprice' => $regularprice,
				'stock' => $stock,
				'length' => $length,
				'width' => $width,
				'height' => $height,
				'weight' => $weight,
				'sku' => $sku,
				'virtual' => $virtual,
				'download' => $download,
				'woofile' => $woofile,
				'salebegin' => $salebegin,
				'saleend' => $saleend,
				'purchasenote' => $purchasenote,
				'productcategory' => $productcategory,
				'reviews' => $reviews,
				'crosssells' => $crosssells,
				'upsells' => $upsells,
				'amazonbuylink' => $amazonbuylink,
				'bnbuylink' => $bnbuylink,
				'googlebuylink' => $googlebuylink,
				'itunesbuylink' => $itunesbuylink,
				'booksamillionbuylink' => $booksamillionbuylink,
				'kobobuylink' => $kobobuylink
			);

			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book('edit', $book_array, $book_id);

			$edit_result = $book_class->edit_result;

			// If book was succesfully edited, and return the page/post results
			if($edit_result == 1){
		  		$row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $library WHERE ID = %d", $book_id));

		  		// Get saved page URL
				$table_name = $wpdb->prefix.'wpbooklist_jre_saved_page_post_log';
		  		$page_results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE book_uid = %s AND type = 'page'" , $row->book_uid));
		  		if(is_object($page_results)){
		  			$page_url = $page_results->post_url;
		  		} else {
		  			$page_url = '';
		  		}

		  		// Get saved post URL
				$table_name = $wpdb->prefix.'wpbooklist_jre_saved_page_post_log';
		  		$post_results = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE book_uid = %s AND type = 'post'", $row->book_uid));
		  		if(is_object($page_results)){
		  			$post_url = $post_results->post_url;
		  		} else {
		  			$post_url = '';
		  		}

		  		echo $edit_result.'--sep--'.$book_id.'--sep--'.$library.'--sep--'.$page_yes.'--sep--'.$post_yes.'--sep--'.$page_url.'--sep--'.$post_url.'--sep--'.$wpdb->prefix.'--sep--'.$book_class->apireport.'--sep--'.json_encode($book_class->whichapifound).'--sep--'.$book_class->apiamazonfailcount.'---sep--'.$book_class->amazon_transient_use;


		  	} else {
		  		echo $edit_result;
		  	}

			wp_die();
		}

		// Callback function for deleting books 
		public function wpbooklist_delete_book_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_delete_book_action_callback', 'security' );
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			$delete_string = filter_var($_POST['deleteString'],FILTER_SANITIZE_STRING);
			$book_id = filter_var($_POST['bookId'],FILTER_SANITIZE_NUMBER_INT);


			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book;
			$delete_result = $book_class->delete_book($library, $book_id, $delete_string);
			echo $delete_result;
			wp_die();
		}

		// Callback function for saving user's API info.
		public function wpbooklist_user_apis_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_user_apis_action_callback', 'security' );
			$amazonapipublic = filter_var($_POST['amazonapipublic'],FILTER_SANITIZE_STRING);
			$amazonapisecret = filter_var($_POST['amazonapisecret'],FILTER_SANITIZE_STRING);
			$googleapi = filter_var($_POST['googleapi'],FILTER_SANITIZE_STRING);

			$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';
			$data = array(
		        'amazonapipublic' => $amazonapipublic, 
		        'amazonapisecret' => $amazonapisecret, 
		        'googleapi' => $googleapi, 
		    );
		    $format = array( '%s');  
		    $where = array( 'ID' => ( 1 ) );
		    $where_format = array( '%d' );
		    $result = $wpdb->update( $table_name, $data, $where, $format, $where_format );

			echo $result;
			wp_die();
		}

		

		// Callback function for uploading a new StylePak after purchase.
		public function wpbooklist_upload_new_stylepak_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_upload_new_stylepak_action_callback', 'security' );
			
			// Create file structure in the uploads dir 
			$mkdir1 = null;
			if (!file_exists(UPLOADS_BASE_DIR."wpbooklist")) {
				// TODO: create log file entry 
				$mkdir1 = mkdir(UPLOADS_BASE_DIR."wpbooklist", 0777, true);
			}

			// Create file structure in the uploads dir 
			$mkdir2 = null;
			if (!file_exists(LIBRARY_STYLEPAKS_UPLOAD_DIR)) {
				// TODO: create log file entry 
				$mkdir2 = mkdir(LIBRARY_STYLEPAKS_UPLOAD_DIR, 0777, true);
			}

			// TODO: create log file entry 
			$move_result = move_uploaded_file($_FILES['my_uploaded_file']['tmp_name'], LIBRARY_STYLEPAKS_UPLOAD_DIR."{$_FILES['my_uploaded_file'] ['name']}");

			// Unzip the file if it's zipped
			if(strpos($_FILES['my_uploaded_file']['name'], '.zip') !== false){
				$zip = new ZipArchive;
				$res = $zip->open(LIBRARY_STYLEPAKS_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
				if ($res === TRUE) {
				  $zip->extractTo(LIBRARY_STYLEPAKS_UPLOAD_DIR);
				  $zip->close();
				  unlink(LIBRARY_STYLEPAKS_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
				}
			}

			echo $mkdir1.'sep'.$mkdir2.'sep'.$move_result;
			wp_die();
		}




		// Callback function for assigning a StylePak to a library.
		public function wpbooklist_assign_stylepak_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_assign_stylepak_action_callback', 'security' );

			// For assigning a StylePak to a Library
				$stylepak = filter_var($_POST["stylepak"],FILTER_SANITIZE_STRING);
		  		$library = filter_var($_POST["library"],FILTER_SANITIZE_STRING);

		  		$stylepak = str_replace('.css', '', $stylepak);
		  		$stylepak = str_replace('.zip', '', $stylepak);

		  		// Build table name to store StylePak in
		  		if(strpos($library, 'wpbooklist_jre_saved_book_log') !== false){
		  			$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';
			  		$data = array(
				      'stylepak' => $stylepak,
				    );
				    $format = array( '%s');   
				    $where = array( 'ID' => 1 );
				    $where_format = array( '%d' );
				    echo $wpdb->update( $table_name, $data, $where, $format, $where_format );
		  		} else {
		  			$table_name = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
		  			$library = substr($library, strrpos($library, '_') + 1);
		  			$data = array(
				      'stylepak' => $stylepak,
				    );
				    $format = array( '%s');   
				    $where = array( 'user_table_name' => $library );
				    $where_format = array( '%s' );
				    echo $stylepak.' '.$library;
				    echo $wpdb->update( $table_name, $data, $where, $format, $where_format );
		  		}

			wp_die();
		}

		// Callback function for uploading a new Post Template after purchase
		public function wpbooklist_upload_new_post_template_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_upload_new_post_template_action_callback', 'security' );

			
				// Create file structure in the uploads dir 
				$mkdir1 = null;
				if (!file_exists(UPLOADS_BASE_DIR."wpbooklist")) {
					// TODO: create log file entry 
					$mkdir1 = mkdir(UPLOADS_BASE_DIR."wpbooklist", 0777, true);
				}

				// Create file structure in the uploads dir 
				$mkdir2 = null;
				if (!file_exists(POST_TEMPLATES_UPLOAD_DIR)) {
					// TODO: create log file entry 
					$mkdir2 = mkdir(POST_TEMPLATES_UPLOAD_DIR, 0777, true);
				}

				// TODO: create log file entry 
				$move_result = move_uploaded_file($_FILES['my_uploaded_file']['tmp_name'], POST_TEMPLATES_UPLOAD_DIR."{$_FILES['my_uploaded_file'] ['name']}");

				// Unzip the file if it's zipped
				if(strpos($_FILES['my_uploaded_file']['name'], '.zip') !== false){
					$zip = new ZipArchive;
					$res = $zip->open(POST_TEMPLATES_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
					if ($res === TRUE) {
					  $zip->extractTo(POST_TEMPLATES_UPLOAD_DIR);
					  $zip->close();
					  unlink(POST_TEMPLATES_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
					}
				}

				echo $mkdir1.'sep'.$mkdir2.'sep'.$move_result;
			wp_die();
		}

		// Callback function for uploading a new Post Template after purchase
		public function wpbooklist_assign_post_template_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_assign_post_template_action_callback', 'security' );

			// For assigning a Template to a Library
				$template = filter_var($_POST["template"],FILTER_SANITIZE_STRING);

		  		$template = str_replace('.php', '', $template);
		  		$template = str_replace('.zip', '', $template);

		  		$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

		  		$data = array(
			      'activeposttemplate' => $template,
			    );
			    $format = array( '%s');   
			    $where = array( 'ID' => 1 );
			    $where_format = array( '%d' );
			    echo $wpdb->update( $table_name, $data, $where, $format, $where_format );

			wp_die();
		}

		

		// Callback function for uploading a new page Template after purchase
		public function wpbooklist_upload_new_page_template_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_upload_new_page_template_action_callback', 'security' );


				// Create file structure in the uploads dir 
				$mkdir1 = null;
				if (!file_exists(UPLOADS_BASE_DIR."wpbooklist")) {
					// TODO: create log file entry 
					$mkdir1 = mkdir(UPLOADS_BASE_DIR."wpbooklist", 0777, true);
				}

				// Create file structure in the uploads dir 
				$mkdir2 = null;
				if (!file_exists(PAGE_TEMPLATES_UPLOAD_DIR)) {
					// TODO: create log file entry 
					$mkdir2 = mkdir(PAGE_TEMPLATES_UPLOAD_DIR, 0777, true);
				}

				// TODO: create log file entry 
				$move_result = move_uploaded_file($_FILES['my_uploaded_file']['tmp_name'], PAGE_TEMPLATES_UPLOAD_DIR."{$_FILES['my_uploaded_file'] ['name']}");

				// Unzip the file if it's zipped
				if(strpos($_FILES['my_uploaded_file']['name'], '.zip') !== false){
					$zip = new ZipArchive;
					$res = $zip->open(PAGE_TEMPLATES_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
					if ($res === TRUE) {
					  $zip->extractTo(PAGE_TEMPLATES_UPLOAD_DIR);
					  $zip->close();
					  unlink(PAGE_TEMPLATES_UPLOAD_DIR.$_FILES['my_uploaded_file']['name']);
					}
				}

				echo $mkdir1.'sep'.$mkdir2.'sep'.$move_result;
			wp_die();
		}

		// Callback function for uploading a new page Template after purchase
		public function wpbooklist_assign_page_template_action_callback(){

			global $wpdb;
			check_ajax_referer( 'wpbooklist_assign_page_template_action_callback', 'security' );

			// For assigning a page_template
				$template = filter_var($_POST["template"],FILTER_SANITIZE_STRING);

		  		$template = str_replace('.php', '', $template);
		  		$template = str_replace('.zip', '', $template);

		  		$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

		  		$data = array(
			      'activepagetemplate' => $template,
			    );
			    $format = array( '%s');   
			    $where = array( 'ID' => 1 );
			    $where_format = array( '%d' );
			    $wpdb->update( $table_name, $data, $where, $format, $where_format );

			wp_die();
		}

		// Callback function for creating a DB backup of a Library
		public function wpbooklist_create_db_library_backup_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_create_db_library_backup_action_callback', 'security' );
			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);

			require_once(CLASS_BACKUP_DIR.'class-wpbooklist-backup.php');
			$backup_class = new WPBookList_Backup('library_database_backup', $library);
			echo $backup_class->create_backup_result; 
			wp_die();
		}

		// Callback function for restoring a backup of a Library.
		public function wpbooklist_restore_db_library_backup_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_restore_db_library_backup_action_callback', 'security' );
			$table = filter_var($_POST['table'],FILTER_SANITIZE_STRING);
			$backup = filter_var($_POST['backup'],FILTER_SANITIZE_STRING);

			require_once(CLASS_BACKUP_DIR.'class-wpbooklist-backup.php');
			$backup_class = new WPBookList_Backup('library_database_restore', $table, $backup);

			wp_die();
		}

		// Callback function for creating a .csv file of ISBN/ASIN numbers
		public function wpbooklist_create_csv_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_create_csv_action_callback', 'security' );
			$table = filter_var($_POST['table'],FILTER_SANITIZE_STRING);
			
			require_once(CLASS_BACKUP_DIR.'class-wpbooklist-backup.php');
			$backup_class = new WPBookList_Backup('create_csv_file', $table);

			echo $backup_class->create_csv_result;
			wp_die();
		}

		// Callback function for setting the Amazon Localization.
		public function wpbooklist_amazon_localization_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_amazon_localization_action_callback', 'security' );
			$country = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
			$table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

			$data = array(
			    'amazoncountryinfo' => $country
			);
			$format = array( '%s');  
			$where = array( 'ID' => 1 );
			$where_format = array( '%d' );
			$wpdb->update( $table_name, $data, $where, $format, $where_format );
			wp_die();
		}

	
		// Callback function for deleting all books in library.
		public function wpbooklist_delete_all_books_in_library_action_callback(){

			check_ajax_referer( 'wpbooklist_delete_all_books_in_library_action_callback', 'security' );
			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book;

			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			$delete_result = $book_class->empty_table($library);

			wp_die();
		}

		// Callback function for deleting all books, pages, and posts in library.
		public function wpbooklist_delete_all_books_pages_and_posts_action_callback(){

			check_ajax_referer( 'wpbooklist_delete_all_books_pages_and_posts_action_callback', 'security' );
			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book;

			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			$delete_result = $book_class->empty_everything($library);

			wp_die();
		}

		// Callback function for deleting all checked books.
		public function wpbooklist_delete_all_checked_books_action_callback(){
			require_once(CLASS_BOOK_DIR.'class-wpbooklist-book.php');
			$book_class = new WPBookList_Book;
			check_ajax_referer( 'wpbooklist_delete_all_checked_books_action_callback', 'security' );

			$library = filter_var($_POST['library'],FILTER_SANITIZE_STRING);
			$delete_string = filter_var($_POST['deleteString'],FILTER_SANITIZE_STRING);
			$book_id = filter_var($_POST['bookId'],FILTER_SANITIZE_STRING);
			$book_id = ltrim($book_id, 'sep');

			// Creating array of IDs to delete.
			$delete_array = explode('sep', $book_id);

			// Creating array of Page/Post IDs to delete
			if($delete_string != null && $delete_string != ''){
				$delete_string = ltrim($delete_string, 'sep');
				$delete_page_post_array = explode('sep', $delete_string);
			}	


			// Required to delete the correct book, update the IDs, then delete the next correct book
			$delete_array = array_reverse($delete_array);

			// The loop that will send each book ID and Page/Post ID to class-wpbooklist-book.php to be deleted.
			foreach($delete_array as $key=>$delete){

				// Send page/post IDs to delete to class-wpbooklist-book.php if they exist, otherwise don't send
				if($delete_string != null && $delete_string != ''){
					$delete_result = $book_class->delete_book($library, $delete, $delete_page_post_array[$key]);
				} else {
					$delete_result = $book_class->delete_book($library, $delete, null);
				}	
			}

			

			wp_die();
		}

		// Callback function for dismissing the admin notice forever.
		public function wpbooklist_jre_dismiss_prem_notice_forever_action_callback(){
			
			global $wpdb; // this is how you get access to the database
			check_ajax_referer( 'wpbooklist_jre_dismiss_prem_notice_forever_action', 'security' );

			$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
		 
		 	// Handling the dismiss of the general admin message
			if($id == 'wpbooklist-my-notice-dismiss-forever-general'){
			  $table_name = $wpdb->prefix . 'wpbooklist_jre_user_options';

			  $data = array(
			      'admindismiss' => 0
			  );
			  $where = array( 'ID' => 1 );
			  $format = array( '%d');  
			  $where_format = array( '%d' );
			  echo $wpdb->update( $table_name, $data, $where, $format, $where_format );
			  wp_die();
			}

			// Handling the dismiss of the StoryTime admin message
			if($id == 'wpbooklist-my-notice-dismiss-forever-storytime'){
			  $table_name = $wpdb->prefix . 'wpbooklist_jre_storytime_stories_settings';

			  $data = array(
			      'notifydismiss' => 0
			  );
			  $where = array( 'ID' => 1 );
			  $format = array( '%d');  
			  $where_format = array( '%d' );
			  echo $wpdb->update( $table_name, $data, $where, $format, $where_format );
			  wp_die();
			}
		}

		// Callback function for re-ordering books on the 'Edit & Delete Books' tab.
		public function wpbooklist_reorder_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_reorder_action_callback', 'security' );
			$table = filter_var($_POST['table'], FILTER_SANITIZE_STRING);
			$idarray = stripslashes($_POST['idarray']);
			$idarray = json_decode($idarray);

			// Dropping primary key in database to alter the IDs and the AUTO_INCREMENT value
			$wpdb->query("ALTER TABLE $table MODIFY ID BIGINT(190) NOT NULL");

			$wpdb->query("ALTER TABLE $table DROP PRIMARY KEY");

			foreach ($idarray as $key => $value) {
				$data = array(
				    'ID' => $key+1
				);

				$format = array( '%d');  
				$where = array( 'book_uid' => $value );
				$where_format = array( '%s' );
				$wpdb->update( $table, $data, $where, $format, $where_format );
			}

			// Adding primary key back to database 
			echo $wpdb->query("ALTER TABLE $table ADD PRIMARY KEY (`ID`)"); 

			// Adjusting ID values of remaining entries in database
			$my_query = $wpdb->get_results("SELECT * FROM $table");
			$title_count = $wpdb->num_rows;   

			$wpdb->query("ALTER TABLE $table MODIFY ID BIGINT(190) AUTO_INCREMENT");

			// Setting the AUTO_INCREMENT value based on number of remaining entries
			$title_count++;
			$wpdb->query($wpdb->prepare( "ALTER TABLE $table AUTO_INCREMENT = %d", $title_count));

			wp_die();
		}

		// Callback function for the exit survey triggered when user deactivates WPBookList.
		public function wpbooklist_exit_results_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_exit_results_action_callback', 'security' );
			$reason1 = filter_var($_POST['reason1'],FILTER_SANITIZE_STRING);
			$reason2 = filter_var($_POST['reason2'],FILTER_SANITIZE_STRING);
			$reason3 = filter_var($_POST['reason3'],FILTER_SANITIZE_STRING);
			$reason4 = filter_var($_POST['reason4'],FILTER_SANITIZE_STRING);
			$reason5 = filter_var($_POST['reason5'],FILTER_SANITIZE_STRING);
			$reason6 = filter_var($_POST['reason6'],FILTER_SANITIZE_STRING);
			$reason7 = filter_var($_POST['reason7'],FILTER_SANITIZE_STRING);
			$reason8 = filter_var($_POST['reason8'],FILTER_SANITIZE_STRING);
			$reason9 = filter_var($_POST['reason9'],FILTER_SANITIZE_STRING);
			$id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
			$reasonOther = filter_var($_POST['reasonOther'],FILTER_SANITIZE_STRING);
			$featureSuggestion = filter_var($_POST['featureSuggestion'],FILTER_SANITIZE_STRING);
			$reasonEmail = filter_var($_POST['reasonEmail'],FILTER_SANITIZE_EMAIL);

			$message = $reason1.' '.$reason2.' '.$reason3.' '.$reason4.' '.$reason5.' '.$reason6.' '.$reason7.' '.$reason8.' '.$reason9.' '.$featureSuggestion.' '.$reasonOther.' '.$reasonEmail;

			if($id == 'wpbooklist-modal-submit'){
				wp_mail( 'jake@jakerevans.com', 'WPBookList Exit Survey', $message );

				if($reasonEmail != ''){
					$autoresponseMessage = 'Thanks for trying out WPBookList and providing valuable feedback that will help make WPBookList even better! I\'ll review your feedback and get back with you ASAP.  -Jake' ;
					wp_mail( $reasonEmail, 'WPBookList Deactivation Survey', $autoresponseMessage );
				}
			}

			deactivate_plugins( 'wpbooklist/wpbooklist.php');
			wp_die();
		}

		// Callback function for retrieving the WPBookList StoryTime Stories from the server when the 'Select a Category' drop-down changes.
		public function wpbooklist_storytime_select_category_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_storytime_select_category_action_callback', 'security' );
			$category = filter_var($_POST['category'],FILTER_SANITIZE_STRING);

			require_once(CLASS_STORYTIME_DIR.'class-storytime.php');
		  	$storytime_class = new WPBookList_Storytime('categorychange', $category );


			echo $storytime_class->category_change_output;
			wp_die();
		}

		// Callback function for retreiving a WPBookList StoryTime Story from the server, once the user has selected one in the reader
		public function wpbooklist_storytime_get_story_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_storytime_get_story_action_callback', 'security' );
			$dataId = filter_var($_POST['dataId'],FILTER_SANITIZE_NUMBER_INT);
			
			require_once(CLASS_STORYTIME_DIR.'class-storytime.php');
		  	$storytime_class = new WPBookList_Storytime('getcontent', null, $dataId);

		  	echo json_encode($storytime_class->stories_db_data);

			wp_die();
		}

		// Callback function for expanding the 'Browse Stories' section again once a Story has already been selected
		public function wpbooklist_storytime_expand_browse_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_storytime_expand_browse_action_callback', 'security' );

			require_once(CLASS_STORYTIME_DIR.'class-storytime.php');
		  	$storytime_class = new WPBookList_Storytime('categorychange', 'Recent Additions' );


			echo $storytime_class->category_change_output;
			wp_die();
		}

		

		// Callback function for saving the StoryTime Settings
		public function wpbooklist_storytime_save_settings_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_storytime_save_settings_action_callback', 'security' );
			$createpost = filter_var($_POST['input1'],FILTER_SANITIZE_STRING);
			$createpage = filter_var($_POST['input2'],FILTER_SANITIZE_STRING);
			$deletedefault = filter_var($_POST['input3'],FILTER_SANITIZE_STRING);
			$newnotify = filter_var($_POST['input4'],FILTER_SANITIZE_STRING);
			$getstories = filter_var($_POST['input5'],FILTER_SANITIZE_STRING);
			$storypersist = filter_var($_POST['input6'],FILTER_SANITIZE_NUMBER_INT);

			if($createpost == 'true'){
				$createpost = 1;
			} else {
				$createpost = 0;
			}

			if($createpage == 'true'){
				$createpage = 1;
			} else {
				$createpage = 0;
			}

			if($deletedefault == 'true'){
				$deletedefault = 1;

				// Delete default data
				$stories_table = $wpdb->prefix . 'wpbooklist_jre_storytime_stories';
				$query_for_default_data = $wpdb->get_results("SELECT * FROM $stories_table");

				// If the default data still exists (based on the fact that war of the worlds should be first in db), proceed, otherwise do nothing.
				if($query_for_default_data[0]->title == 'Sample Chapter - The War of the Worlds'){

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'H. G. Wells' AND title = 'Sample Chapter - The War of the Worlds'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Jane Austen' AND title = 'Sample Chapter - Pride and Predjudice'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Matthew Dawes' AND title = 'Sample Chapter - Nightfall'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Maine Authors Publishing' AND title = 'Interview - Maine Authors Publishing'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Missouri Writers’ Guild' AND title = 'Article - Missouri Writers’ Guild'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Benjamin Franklin' AND title = 'Autobiography of Benjamin Franklin'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Zac Wilson' AND title = 'Sample Chapter - Morningland'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'David Luddington' AND title = 'Author Showcase - David Luddington'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Bram Stoker' AND title = 'Sample Chapter - Dracula'");

					$wpdb->query("DELETE FROM $stories_table WHERE providername = 'Brendan T. Beery' AND title = 'Author Showcase - Brendan T. Beery'");

					// Dropping primary key in database to alter the IDs and the AUTO_INCREMENT value
					$wpdb->query("ALTER TABLE $stories_table MODIFY ID bigint(190)");
					$wpdb->query("ALTER TABLE $stories_table DROP PRIMARY KEY");

					// Adjusting ID values of remaining entries in database
					$my_query = $wpdb->get_results("SELECT * FROM $stories_table");
					$title_count = $wpdb->num_rows;
					$book_id = 10; // Hard-coded based on number of default rows included with WPBookList
					for ($x = 1; $x <= $title_count; $x++) {
						$data = array(
						    'ID' => $x
						);
						$format = array( '%d');  
						$where = array( 'ID' => $book_id);
						$where_format = array( '%d' );
						$wpdb->update( $stories_table, $data, $where, $format, $where_format );
						$book_id++; 
					}  

					// Adding primary key back to database 
					$wpdb->query("ALTER TABLE $stories_table ADD PRIMARY KEY (`ID`)");    
					$wpdb->query("ALTER TABLE $stories_table MODIFY ID bigint(190) AUTO_INCREMENT");

					// Setting the AUTO_INCREMENT value based on number of remaining entries
					$title_count++;
					$wpdb->query($wpdb->prepare( "ALTER TABLE $stories_table AUTO_INCREMENT = %d", $title_count));
				}

			} else {
				$deletedefault = 0;
			}

			if($newnotify == 'true'){
				$newnotify = 1;
			} else {
				$newnotify = 0;
			}

			if($getstories == 'true'){
				$getstories = 1;
			} else {
				$getstories = 0;
			}

			if($storypersist == '' || $storypersist == null || $storypersist == 0){
				$storypersist = null;
			}

			// Update StoryTime settings table
			$table_name = $wpdb->prefix . 'wpbooklist_jre_storytime_stories_settings';
			$data = array(
		        'createpost' => $createpost,
				'createpage' => $createpage,
				'deletedefault' => $deletedefault,
				'newnotify' => $newnotify,
				'getstories' => $getstories,
				'storypersist' => $storypersist,
		    );
		    $format = array( '%d','%d','%d','%d','%d','%d'); 
		    $where = array( 'ID' => 1 );
		    $where_format = array( '%d' );
		    $wpdb->update( $table_name, $data, $where, $format, $where_format );

			wp_die();
		}

		// Callback function for deleting a Story.
		public function wpbooklist_delete_story_action_callback(){
			global $wpdb;
			check_ajax_referer( 'wpbooklist_delete_story_action_callback', 'security' );
			$id = filter_var($_POST['dataId'],FILTER_SANITIZE_NUMBER_INT);

			$stories_table = $wpdb->prefix . 'wpbooklist_jre_storytime_stories';
			$query_for_default_data = $wpdb->get_results("SELECT * FROM $stories_table");

			$wpdb->query("DELETE FROM $stories_table WHERE ID = $id");

			// Dropping primary key in database to alter the IDs and the AUTO_INCREMENT value
			$wpdb->query("ALTER TABLE $stories_table MODIFY ID bigint(190)");
			$wpdb->query("ALTER TABLE $stories_table DROP PRIMARY KEY");

			// Adjusting ID values of remaining entries in database
			$my_query = $wpdb->get_results("SELECT * FROM $stories_table");
			$title_count = $wpdb->num_rows;
			for ($x = $id; $x <= $title_count; $x++) {
				$data = array(
				    'ID' => $id
				);
				$format = array( '%d'); 
				$id++;  
				$where = array( 'ID' => ($id) );
				$where_format = array( '%d' );
				$wpdb->update( $stories_table, $data, $where, $format, $where_format );
			} 

			// Adding primary key back to database.
			$wpdb->query("ALTER TABLE $stories_table ADD PRIMARY KEY (`ID`)");    
			$wpdb->query("ALTER TABLE $stories_table MODIFY ID bigint(190) AUTO_INCREMENT");

			// Setting the AUTO_INCREMENT value based on number of remaining entries
			$title_count++;
			echo $wpdb->query($wpdb->prepare( "ALTER TABLE $stories_table AUTO_INCREMENT = %d", $title_count));

			wp_die();
		}


		// Makes a call to get every single book saved on website to seed the Book form for Autocomplete stuff.
		public function wpbooklist_seed_book_form_autocomplete_action_callback() {
			global $wpdb;
			check_ajax_referer( 'wpbooklist_seed_book_form_autocomplete_action_callback', 'security' );

			// Get all books from default Library, and push into our final array to return to the javascript.
			$final_total_array  = array();
			$default_table_name = $wpdb->prefix . 'wpbooklist_jre_saved_book_log';
			$default_results = $wpdb->get_results( "SELECT * FROM $default_table_name" );
			array_push( $final_total_array, $default_results );

			// Get all books from all user-created libraries.
			$dynamic_table_name  = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$dynamic_name_db_row = $wpdb->get_results( "SELECT * FROM $dynamic_table_name" );

			foreach ( $dynamic_name_db_row as $db ) {
				if ( ( '' !== $db->user_table_name ) || ( null !== $db->user_table_name ) ) {

					$user_created_lib_name = $wpdb->prefix . 'wpbooklist_jre_' . $db->user_table_name;
					$dynamic_results = $wpdb->get_results( "SELECT * FROM $user_created_lib_name" );
					array_push( $final_total_array, $dynamic_results );
				}
			}

			echo json_encode( $final_total_array );

			wp_die();
		}





	}
endif;
