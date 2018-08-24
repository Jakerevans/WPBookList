<?php
/**
 * Class WPBookList_General_Functions - class-wpbooklist-functions.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_General_Functions', false ) ) :
	/**
	 * WPBookList_General_Functions class. Here we'll do things like enqueue scripts/css, set up menus, etc.
	 */
	class WPBookList_General_Functions {



		/** Function for loading the Form Check JS where needed
		 *
		 *  @param string $hook - The string that contains the admin page url info.
		 */
		public function wpbooklist_form_checks_js( $hook ) {
			// Loading this up on just the WPBookList admin pages that need it.
			if ( false !== stripos( $hook, 'WPBookList-Options' ) ) {
				wp_register_script( 'wpbooklist_form_checks_js', JAVASCRIPT_URL . 'formchecks.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
				wp_enqueue_script( 'wpbooklist_form_checks_js' );
			}
		}

		/** Code for adding the jquery masked input file
		 *
		 *  @param string $hook - The string that contains the admin page url info.
		 */
		public function wpbooklist_jquery_masked_input_js( $hook ) {
			if ( ! wp_script_is( 'wpbooklist_jquery_masked_input_js' ) && ! wp_script_is( 'wpgamelist_jquery_masked_input_js' ) ) {

				if ( stripos( $hook, 'WPBookList-Options' ) !== false ) {
					wp_register_script( 'wpbooklist_jquery_masked_input_js', JAVASCRIPT_URL . 'jquery-masked-input/jquery-masked-input.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
					wp_enqueue_script( 'wpbooklist_jquery_masked_input_js' );
				}
			}
		}

		/**
		 *  Code for adding the jquery readmore file for text blocks like description and notes
		 */
		public function wpbooklist_jquery_readmore_js() {
			if ( ! wp_script_is( 'wpbooklist_jquery_readmore_js' ) && ! wp_script_is( 'wpgamelist_jquery_readmore_js' ) ) {
				wp_register_script( 'wpbooklist_jquery_readmore_js', JAVASCRIPT_URL . 'jquery-readmore/readmore.min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
				wp_enqueue_script( 'wpbooklist_jquery_readmore_js' );
			}
		}

		/** Code for adding the colorbox js file
		 *
		 * @param string $hook - The string that contains the admin page url info.
		 */
		public function wpbooklist_jre_plugin_colorbox_script( $hook ) {
			// If on an admin page, loading this up on just the WPBookList admin pages that need it. Else, load it on the frontend that has a WPBookList Shortcode.
			if ( is_admin() ) {
				if ( stripos( $hook, 'WPBookList-Options' ) !== false ) {
					// If we don't already have Colorbox loaded from WPGameList...
					if ( ! wp_script_is( 'colorboxjsforwpgamelist' ) && ! wp_script_is( 'colorboxjsforwpbooklist' ) ) {
						wp_register_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						wp_enqueue_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
					}
				}
			} else {
				global $wpdb;
				$id      = get_the_ID();
				$post    = get_post( $id );
				$content = '';
				if ( $post ) {
					$content = $post->post_content;
				}

				// If we find any of these in $content, load the colorbox js.
				$shortcode_array = array(
					'showbookcover',
					'wpbooklist_shortcode',
					'wpbooklist_bookfinder',
					'wpbooklist_carousel',
					'wpbooklist_categories',
					'wpbooklist',
				);

				foreach ( $shortcode_array as $key => $value ) {
					if ( stripos( $content, $value ) !== false ) {
						// If we don't already have Colorbox loaded from WPGameList...
						if ( ! wp_script_is( 'colorboxjsforwpgamelist' ) && ! wp_script_is( 'colorboxjsforwpbooklist' ) ) {
							wp_register_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
							wp_enqueue_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						}
					}
				}

				// If we're on the homepage or the blog page, just go ahead and load.
				if ( ! wp_script_is( 'colorboxjsforwpbooklist' ) ) {
					if ( is_front_page() || is_home() ) {
						// If we don't already have Colorbox loaded from WPGameList...
						if ( ! wp_script_is( 'colorboxjsforwpgamelist' ) && ! wp_script_is( 'colorboxjsforwpbooklist' ) ) {
							wp_register_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
							wp_enqueue_script( 'colorboxjsforwpbooklist', JAVASCRIPT_URL . 'jquery-colorbox/jquery.colorbox-min.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						}
					}
				}
			}
		}

		/** Code for adding the addthis js file
		 *
		 * @param string $hook - The string that contains the admin page url info.
		 */
		public function wpbooklist_jre_plugin_addthis_script( $hook ) {
			// If on an admin page, loading this up on just the WPBookList admin pages that need it. Else, load it on the frontend that has a WPBookList Shortcode.
			if ( is_admin() ) {
				if ( stripos( $hook, 'WPBookList-Options' ) !== false ) {
					// If we don't already have addthis loaded from WPGameList...
					if ( ! wp_script_is( 'addthisjsforwpgamelist' ) && ! wp_script_is( 'addthisjsforwpbooklist' ) ) {
						wp_register_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						wp_enqueue_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
					}
				}
			} else {
				global $wpdb;
				$id      = get_the_ID();
				$post    = get_post( $id );
				$content = '';
				if ( $post ) {
					$content = $post->post_content;
				}

				// If we find any of these in $content, load the addthis js.
				$shortcode_array = array(
					'showbookcover',
					'wpbooklist_shortcode',
					'wpbooklist_bookfinder',
					'wpbooklist_carousel',
					'wpbooklist_categories',
					'wpbooklist',
				);

				foreach ( $shortcode_array as $key => $value ) {
					if ( stripos( $content, $value ) !== false ) {
						// If we don't already have Colorbox loaded from WPGameList...
						if ( ! wp_script_is( 'addthisjsforwpgamelist' ) && ! wp_script_is( 'addthisjsforwpbooklist' ) ) {
							wp_register_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
							wp_enqueue_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						}
					}
				}

				// If we're on the homepage or the blog page, just go ahead and load.
				if ( ! wp_script_is( 'addthisjsforwpbooklist' ) ) {
					if ( is_front_page() || is_home() ) {
						// If we don't already have Colorbox loaded from WPGameList...
						if ( ! wp_script_is( 'addthisjsforwpgamelist' ) && ! wp_script_is( 'addthisjsforwpbooklist' ) ) {
							wp_register_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
							wp_enqueue_script( 'addthisjsforwpbooklist', JAVASCRIPT_URL . 'jquery-addthis/addthis.js', array( 'jquery' ), WPBOOKLIST_VERSION_NUM, true );
						}
					}
				}
			}
		}


		/**
		 * Adding the front-end library ui css file or StylePak
		 */
		public function wpbooklist_jre_frontend_library_ui_default_style() {
			global $wpdb;
			$id      = get_the_ID();
			$post    = get_post( $id );
			$content = '';
			if ( $post ) {
				$content = $post->post_content;
			}
			$stylepak = '';

			$table_name2 = $wpdb->prefix . 'wpbooklist_jre_list_dynamic_db_names';
			$db_row = $wpdb->get_results( "SELECT * FROM $table_name2" );
			foreach ( $db_row as $table ) {
				$shortcode = 'wpbooklist_shortcode table="' . $table->user_table_name . '"';

				if ( stripos( $content, $shortcode ) !== false ) {
					$stylepak = $table->stylepak;
				}
			}

			if ( '' === $stylepak || null === $stylepak ) {
				if ( stripos( $content, '[wpbooklist_shortcode' ) !== false ) {
					$table_name2 = $wpdb->prefix . 'wpbooklist_jre_user_options';
					$row         = $wpdb->get_results( "SELECT * FROM $table_name2" );
					$stylepak    = $row[0]->stylepak;
				}
			}

			if ( '' === $stylepak || null === $stylepak || 'Default' === $stylepak ) {
				$stylepak = 'default';
			}

			if ( 'default' === $stylepak || 'Default StylePak' === $stylepak ) {

				$id      = get_the_ID();
				$post    = get_post( $id );
				$content = '';
				if ( $post ) {
					$content = $post->post_content;
				}

				// If we find any of these in $content, load the frontend-library-ui.css.
				$shortcode_array = array(
					'showbookcover',
					'wpbooklist_shortcode',
					'wpbooklist_bookfinder',
					'wpbooklist_carousel',
					'wpbooklist_categories',
					'wpbooklist',
				);

				// Checking for WPBookList content on page.
				foreach ( $shortcode_array as $key => $value ) {
					if ( stripos( $content, $value ) !== false ) {
						wp_register_style( 'frontendlibraryui', ROOT_CSS_URL . 'wpbooklist-main-frontend.css', null, WPBOOKLIST_VERSION_NUM );
						wp_enqueue_style( 'frontendlibraryui' );
					}
				}

				// If we're on the homepage or the blog page, just go ahead and load.
				if ( ! wp_script_is( 'frontendlibraryui' ) ) {
					if ( is_front_page() || is_home() ) {
						wp_register_style( 'frontendlibraryui', ROOT_CSS_URL . 'wpbooklist-main-frontend.css', null, WPBOOKLIST_VERSION_NUM );
						wp_enqueue_style( 'frontendlibraryui' );
					}
				}
			}

			$library_stylepaks_upload_dir = LIBRARY_STYLEPAKS_UPLOAD_URL;

			// Modify the 'LIBRARY_STYLEPAKS_UPLOAD_URL' to make sure we're using the right protocol, as it seems that wp_upload_dir() doesn't return https - introduced in 5.5.2.
			$protocol = ( ! empty( filter_var( wp_unslash( $_SERVER['HTTPS'] ), FILTER_SANITIZE_STRING ) ) && 'off' !== filter_var( wp_unslash( $_SERVER['HTTPS'] ), FILTER_SANITIZE_STRING ) ) || 443 === filter_var( wp_unslash( $_SERVER['SERVER_PORT'] ), FILTER_SANITIZE_NUMBER_INT ) ? 'https://' : 'http://';

			if ( 'https://' === $protocol || 'https' === $protocol ) {
				if ( strpos( LIBRARY_STYLEPAKS_UPLOAD_URL, 'http://' ) !== false ) {
					$library_stylepaks_upload_dir = str_replace( 'http://', 'https://', LIBRARY_STYLEPAKS_UPLOAD_URL );
				}
			}

			if ( 'StylePak1' === $stylepak ) {
				wp_register_style( 'StylePak1', $library_stylepaks_upload_dir . 'StylePak1.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak1' );
			}

			if ( 'StylePak2' === $stylepak ) {
				wp_register_style( 'StylePak2', $library_stylepaks_upload_dir . 'StylePak2.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak2' );
			}

			if ( 'StylePak3' === $stylepak ) {
				wp_register_style( 'StylePak3', $library_stylepaks_upload_dir . 'StylePak3.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak3' );
			}

			if ( 'StylePak4' === $stylepak ) {
				wp_register_style( 'StylePak4', $library_stylepaks_upload_dir . 'StylePak4.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak4' );
			}

			if ( 'StylePak5' === $stylepak ) {
				wp_register_style( 'StylePak5', $library_stylepaks_upload_dir . 'StylePak5.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak5' );
			}

			if ( 'StylePak6' === $stylepak ) {
				wp_register_style( 'StylePak6', $library_stylepaks_upload_dir . 'StylePak6.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak6' );
			}

			if ( 'StylePak7' === $stylepak ) {
				wp_register_style( 'StylePak7', $library_stylepaks_upload_dir . 'StylePak7.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak7' );
			}

			if ( 'StylePak8' === $stylepak ) {
				wp_register_style( 'StylePak8', $library_stylepaks_upload_dir . 'StylePak8.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'StylePak8' );
			}
		}

		/**
		 * Code for adding the default posts & pages CSS file
		 */
		public function wpbooklist_jre_posts_pages_default_style() {

			global $wpdb;
			$id       = get_the_ID();
			$stylepak = '';

			$table_name = $wpdb->prefix . 'wpbooklist_jre_saved_page_post_log';

			$row = $wpdb->get_row( $wpdb->prepare("SELECT * FROM $table_name WHERE post_id = %d", $id ) );

			if ( null !== $row ) {
				if ( 'post' === $row->type ) {
					$table_name_post = $wpdb->prefix . 'wpbooklist_jre_post_options';
				} else {
					$table_name_post = $wpdb->prefix . 'wpbooklist_jre_page_options';
				}

				$row = $wpdb->get_row( "SELECT * FROM $table_name_post" );
				$stylepak = $row->stylepak;
			}

			if ( '' === $stylepak || null === $stylepak || 'Default StylePak' === $stylepak ) {
				$stylepak = 'default';
			}

			if ( 'Default' === $stylepak || 'default' === $stylepak || 'Default StylePak' === $stylepak ) {
				wp_register_style( 'postspagesdefaultcssforwpbooklist', ROOT_CSS_URL . 'wpbooklist-posts-pages-default.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'postspagesdefaultcssforwpbooklist' );
			}

			if ( 'Post-StylePak1' === $stylepak ) {
				wp_register_style( 'Post-StylePak1', POST_STYLEPAKS_UPLOAD_URL . 'Post-StylePak1.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'Post-StylePak1' );
			}

			if ( 'Post-StylePak1' === $stylepak ) {
				wp_register_style( 'Post-StylePak2', POST_STYLEPAKS_UPLOAD_URL . 'Post-StylePak2.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'Post-StylePak2' );
			}

			if ( 'Post-StylePak1' === $stylepak ) {
				wp_register_style( 'Post-StylePak3', POST_STYLEPAKS_UPLOAD_URL . 'Post-StylePak3.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'Post-StylePak3' );
			}

			if ( 'Post-StylePak1' === $stylepak ) {
				wp_register_style( 'Post-StylePak4', POST_STYLEPAKS_UPLOAD_URL . 'Post-StylePak4.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'Post-StylePak4' );
			}

			if ( 'Post-StylePak1' === $stylepak ) {
				wp_register_style( 'Post-StylePak5', POST_STYLEPAKS_UPLOAD_URL . 'Post-StylePak5.css', null, WPBOOKLIST_VERSION_NUM );
				wp_enqueue_style( 'Post-StylePak5' );
			}
		}




	}
endif;
