<?php
/**
 * Class WPBookList_Utilities_Date - class-wpbooklist-utilities-accesscheck.php
 *
 * @author   Jake Evans
 * @category Admin
 * @package  Includes/Classes/Utilities
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Utilities_Accesscheck', false ) ) :
	/**
	 * WPBookList_Utilities_Date class. Here we'll house everything to do with getting the current accesscheck.
	 */
	class WPBookList_Utilities_Accesscheck {

		/** Common member variable
		 *
		 *  @var array $user
		 */
		public $user = array();

		/**
		 * The users ID we're checking access on.
		 *
		 * @param int $wpuserid - The users ID we're checking access on.
		 */
		public function wpbooklist_accesscheck( $wpuserid ) {

			global $wpdb;

			// Get all saved Users from the WPBookList Users table.
			$users_table_name = $wpdb->prefix . 'wpbooklist_users';

			// Make call to Transients class to see if Transient currently exists. If so, retrieve it, if not, make call to create_transient() with all required Parameters.
			require_once CLASS_TRANSIENTS_DIR . 'class-wpbooklist-transients.php';
			$transients       = new WPBookList_Transients();
			$transient_name   = 'wpht_' . md5( 'SELECT * FROM ' . $users_table_name . ' WHERE wpuserid == ' . $wpuserid );
			$transient_exists = $transients->existing_transient_check( $transient_name );
			if ( $transient_exists ) {
				$this->user = $transient_exists;
			} else {
				$query      = 'SELECT * FROM ' . $users_table_name . '  WHERE wpuserid = ' . $wpuserid;
				$this->user = $transients->create_transient( $transient_name, 'wpdb->get_row', $query, MONTH_IN_SECONDS );
			}

			// If we've retreived a user, continue on to permission check, otherwise return false.
			if ( null !== $this->user ) {

				// Get user's specific permissions.
				$perms = $this->user->permissions;
				$perms = explode( ',', $perms );

				// Now check permissions - if user is just a regular user or a reviewer, and they haven't been granted specific access to this page, then they have no access to this page.
				if ( ( 'admin' !== $this->user->role && 'godmode' !== $this->user->role ) && '1' !== $perms[0] ) {
					return false;
				} else {
					return $this->user;
				}
			} else {

				// No registered WPBookList user was found - return false.
				return false;
			}
		}

		/**
		 * Create the 'No Access' message.
		 */
		public function wpbooklist_accesscheck_no_permission_message() {

			// Grab Superadmin from the settings table to the user knows who to contact.
			global $wpdb;

			// Make call to Transients class to see if Transient currently exists. If so, retrieve it, if not, make call to create_transient() with all required Parameters.
			require_once CLASS_TRANSIENTS_DIR . 'class-wpbooklist-transients.php';
			$transients          = new WPBookList_Transients();
			$settings_table_name = $wpdb->prefix . 'wpbooklist_general_settings';
			$transient_name      = 'wpht_' . md5( 'SELECT * FROM ' . $settings_table_name );
			$transient_exists    = $transients->existing_transient_check( $transient_name );
			if ( $transient_exists ) {
				$this->general_settings = $transient_exists;
			} else {
				$query                  = 'SELECT * FROM ' . $settings_table_name;
				$this->general_settings = $transients->create_transient( $transient_name, 'wpdb->get_row', $query, MONTH_IN_SECONDS );
			}

			$gmuser = $this->general_settings->gmuser;
			$gmuser = explode( ',', $gmuser );

			// First we'll get all the translations for this tab.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->trans = new WPBookList_Translations();
			$this->trans->common_trans_strings();
			$this->trans->dashboard_trans_strings();
			$this->trans->trans_strings();

			return '<div class="wpbooklist-no-saved-data-stats-div">
				<p>
					<img class="wpbooklist-shocked-image" src="' . ROOT_IMG_ICONS_URL . 'shocked.svg">
					<span class="wpbooklist-no-saved-span-stats-1">' . $this->trans->dashboard_trans_21 . '</span>
					<br>
					' . $this->trans->common_trans_75 . '
					<br>
					' . $this->trans->common_trans_76 . ' ' . $gmuser[0] . ' ' . $gmuser[1] . ' ' . $this->trans->common_trans_78 . ' ' . $gmuser[2] . ' ' . $this->trans->common_trans_77 . '
					<br><br>
				</p>
			</div>';
		}

		/**
		 * Creates custom WPBookList WordPress roles
		 *
		 * @param string $role_name - The name of the role we're wanting to create.
		 */
		public function wpbooklist_accesscheck_create_role( $role_name ) {

			// Require the translations file.
			require_once CLASS_TRANSLATIONS_DIR . 'class-wpbooklist-translations.php';
			$this->translations = new WPBookList_Translations();
			$this->translations->trans_strings();

			$role_caps    = array();
			$display_name = '';

			switch ( $role_name ) {
				case $this->translations->trans_489:
					// Basic WPBookList User.
					$role_caps = array(
						'read'                   => true,
						'edit_posts'             => true,
						'delete_posts'           => true,
						'edit_others_posts'      => true,
						'edit_published_posts'   => true,
						'publish_posts'          => true,
						'delete_others_posts'    => true,
						'delete_published_posts' => true,
						'delete_private_posts'   => true,
						'edit_private_posts'     => true,
						'read_private_posts'     => true,
						'edit_pages'             => true,
						'delete_pages'           => true,
						'edit_others_pages'      => true,
						'edit_published_pages'   => true,
						'publish_pages'          => true,
						'delete_others_pages'    => true,
						'delete_published_pages' => true,
						'delete_private_pages'   => true,
						'edit_private_pages'     => true,
						'read_private_pages'     => true,
						'moderate_comments'      => true,

					);

					$role_name    = 'wpbooklist_basic_user';
					$display_name = $this->translations->trans_489;

					break;
				default:
					break;
			}

			// Create the wpbooklist_basic_user role.
			$result = add_role( $role_name, $display_name, $role_caps );

			// Now get each role we have in WordPress and add our custom 'wpbooklist_dashboard_access' capability to ensure that each user has access to the WPBookList menu pages.
			global $wp_roles;
			$roles = $wp_roles->get_names();
			foreach ( $roles as $key => $role ) {
				$role       = strtolower( $role );
				$role       = str_replace( ' ', '_', $role );
				$indiv_role = get_role( $role );
				if ( null !== $indiv_role ) {
					$indiv_role->add_cap( 'wpbooklist_dashboard_access' );
				}
			}
		}
	}

endif;
