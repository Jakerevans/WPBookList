/**
 * JavaScript Functions - wpbooklist-users-js.js
 *
 * @author   Jake Evans
 * @category JavaScript
 * @package  Includes/Assets/Js
 * @version  0.0.1
 */

jQuery( document ).ready( function( $ ) {

	'use strict';

	/* BEGINNING SECTION TO CALL ALL FUNCTIONS IN FILE... */

	// For checking for, and displaying error message, if emails don't match.
	wpbooklistJreUsersEmailMatching();

	// For checking for, and displaying error message, if passwords don't match.
	wpbooklistJreUsersPasswordMatching();

	// For revealing the password text
	wpbooklistJreUsersRevealPassword();

	// For choosing a profile image
	//wpbooklistJreUsersProfileImageUpload();

	// For dynamically suggesting username based off e-mail
	wpbooklistJreUsersGenerateUsername();

	// For saving the new user.
	wpbooklistCreateWpUser();

	// For resetting the missing data animation
	wpbooklistResetMissingDataAnim();

	/* ENDING SECTION TO CALL ALL FUNCTIONS IN FILE... */

	// For checking for, and displaying error message if, emails don't match.
	function wpbooklistJreUsersEmailMatching() {


		$( '#wpbooklist-adduser-emailname, #wpbooklist-adduser-confirmemailname' ).keyup( function() {

			// Get the two E-Mail values
			var email = $( '#wpbooklist-adduser-emailname' ).val().toLowerCase();
			var emailConfirm = $( '#wpbooklist-adduser-confirmemailname' ).val().toLowerCase();
			var message = $( '#wpbooklist-adduser-field-checks-email-div' );

			var shocked = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg">';

			setTimeout( function() {
				if ( email !== emailConfirm ) {
					message.html( wpbooklistPhpVariables.trans90 + '<br/>' + wpbooklistPhpVariables.trans479 + shocked );
					message.css({'color': '#DE235A', 'margin-left': '10px', 'margin-right': '10px'});
					message.animate({'opacity': '1'}, 300 );
				} else {
					message.html( '' );
					message.css({'margin-left': '0px', 'margin-right': '0px'});
				}
			}, 1000 );
		});
	}

	// For checking for, and displaying error message if, passwords don't match.
	function wpbooklistJreUsersPasswordMatching() {

		$( '#wpbooklist-adduser-passwordname, #wpbooklist-adduser-confirmpasswordname' ).keyup( function() {

			// Get the two E-Mail values
			var password = $( '#wpbooklist-adduser-passwordname' ).val();
			var passwordConfirm = $( '#wpbooklist-adduser-confirmpasswordname' ).val();
			var message = $( '#wpbooklist-adduser-field-checks-password-div' );

			var shocked = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg">';

			setTimeout( function() {
				if ( password !== passwordConfirm ) {
					message.html( wpbooklistPhpVariables.trans90 + '<br/>' + wpbooklistPhpVariables.trans480 + shocked );
					message.css({'color': '#DE235A', 'margin-left': '10px', 'margin-right': '10px'});
					message.animate({'opacity': '1'}, 300 );
				} else {
					message.html( '' );
					message.css({'margin-left': '0px', 'margin-right': '0px'});
				}
			}, 1000 );
		});
	}

	// For revealing the passwords.
	function wpbooklistJreUsersRevealPassword() {

		$( '#wpbooklist-user-form-show-passwords' ).click( function() {

			var passwordOne = document.getElementById( 'wpbooklist-adduser-passwordname' );
			var passwordTwo = document.getElementById( 'wpbooklist-adduser-confirmpasswordname' );

			if ( 'password' === passwordOne.type ) {
				passwordOne.type = 'text';
				$( '#wpbooklist-user-form-show-passwords' ).html( wpbooklistPhpVariables.trans482 );
			} else {
				passwordOne.type = 'password';
				$( '#wpbooklist-user-form-show-passwords' ).html( wpbooklistPhpVariables.trans481 );
			}

			if ( 'password' === passwordTwo.type ) {
				$( '#wpbooklist-user-form-show-passwords' ).html( wpbooklistPhpVariables.trans482 );
				passwordTwo.type = 'text';
			} else {
				passwordTwo.type = 'password';
				$( '#wpbooklist-user-form-show-passwords' ).html( wpbooklistPhpVariables.trans481 );
			}
		});
	}

	// For choosing a profile image.
	function wpbooklistJreUsersProfileImageUpload() {

		$( '#wpbooklist-response-form-input-text-profileimage-button' ).click( function( e ) {

			var imageFrame;
			e.preventDefault();

			if ( imageFrame ) {
				imageFrame.open();
			}

			// Define imageFrame as wp.media object
			imageFrame = wp.media({
				title: 'Select Media',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			imageFrame.on( 'close', function() {
				var selection =  imageFrame.state().get( 'selection' );
				selection.each( function( attachment ) {
					$( '#wpbooklist-response-form-input-text-profileimage-url' ).val( attachment.attributes.url );
					$( '#wpbooklist-create-users-profile-img-div' ).html( '<img id="wpbooklist-create-user-profile-img-actual" src="' + attachment.attributes.url + '" />' );
				});
			});

			imageFrame.on( 'open', function() {

			});

			imageFrame.open();
		});
	}

	// For dynamically suggesting username based off e-mail
	function wpbooklistJreUsersGenerateUsername() {

		$( '#wpbooklist-adduser-emailname, #wpbooklist-adduser-emailnameconfirm' ).keyup( function() {
			var email = $( this ).val();
			var username = $( '#wpbooklist-adduser-usernamename' );
			if ( -1 === email.indexOf( '@' ) ) {
				username.val( email );
			} else {
				email = email.split( '@' );
				username.val( email[0]);
			}
		});
	}

	// For making data checks before saving user
	function wpbooklistDataChecksForSaving() {

		var firstname = $( '#wpbooklist-adduser-firstname' ).val();
		var password = $( '#wpbooklist-adduser-passwordname' ).val();
		var passwordconfirm = $( '#wpbooklist-adduser-confirmpasswordname' ).val();
		var email = $( '#wpbooklist-adduser-emailname' ).val();
		var emailconfirm = $( '#wpbooklist-adduser-confirmemailname' ).val();
		var username = $( '#wpbooklist-adduser-usernamename' ).val();
		var shocked = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg">';

		var emailmessage = $( '#wpbooklist-adduser-field-checks-email-div' );
		var passwordmessage = $( '#wpbooklist-adduser-field-checks-password-div' );

		// Checking for missing data
		if ( '' === firstname || '' === email || '' === emailconfirm || '' === password || '' === passwordconfirm || '' === username ) {

			if ( '' === firstname ) {
				$( '#wpbooklist-adduser-firstname' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-firstname' ).offset().top - 150 }, 1000 );
				return false;
			}

			if ( '' === email ) {
				$( '#wpbooklist-adduser-emailname' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-emailname' ).offset().top - 150 }, 1000 );
				return false;
			}

			if ( '' === emailconfirm ) {
				$( '#wpbooklist-adduser-confirmemailname' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-confirmemailname' ).offset().top - 150 }, 1000 );
				return false;
			}

			if ( '' === password ) {
				$( '#wpbooklist-adduser-passwordname' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-passwordname' ).offset().top - 150 }, 1000 );
				return false;
			}

			if ( '' === passwordconfirm ) {
				$( '#wpbooklist-adduser-confirmpasswordname' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-confirmpasswordname' ).offset().top - 150 }, 1000 );
				return false;
			}

			if ( '' === username ) {
				$( '#wpbooklist-adduser-usernamename' ).prev().addClass( 'wpbooklist-missing-user-data-red' );
				alert( wpbooklistPhpVariables.trans483 );
				$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-usernamename' ).offset().top - 150 }, 1000 );
				return false;
			}
		}

		if ( email !== emailconfirm ) {
			emailmessage.html( wpbooklistPhpVariables.trans90 + '<br/>' + wpbooklistPhpVariables.trans479 + shocked );
			emailmessage.css({'color': '#DE235A', 'margin-left': '10px', 'margin-right': '10px'});
			emailmessage.animate({'opacity': '1'}, 300 );
			alert( wpbooklistPhpVariables.trans483 );
			$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-emailname' ).offset().top - 150 }, 1000 );
			return false;

		} else {

			emailmessage.html( '' );
			emailmessage.css({'margin-left': '0px', 'margin-right': '0px'});
		}

		if ( password !== passwordconfirm ) {
			passwordmessage.html( wpbooklistPhpVariables.trans90 + '<br/>' + wpbooklistPhpVariables.trans479 + shocked );
			passwordmessage.css({'color': '#DE235A', 'margin-left': '10px', 'margin-right': '10px'});
			passwordmessage.animate({'opacity': '1'}, 300 );
			alert( wpbooklistPhpVariables.trans483 );
			$( 'html, body' ).animate({ scrollTop: $( '#wpbooklist-adduser-passwordname' ).offset().top - 150 }, 1000 );
			return false;

		} else {

			passwordmessage.html( '' );
			passwordmessage.css({'margin-left': '0px', 'margin-right': '0px'});
		}

		return true;
	}

	function wpbooklistCreateWpUser() {

		$( '#wpbooklist-admin-adduser-create-button' ).click( function( e ) {

			var proceed = wpbooklistDataChecksForSaving();
			var firstname = $( '#wpbooklist-adduser-firstname' ).val();
			var lastname = $( '#wpbooklist-adduser-lastname' ).val();
			var password = $( '#wpbooklist-adduser-passwordname' ).val();
			var passwordconfirm = $( '#wpbooklist-adduser-confirmpasswordname' ).val();
			var email = $( '#wpbooklist-adduser-emailname' ).val();
			var emailconfirm = $( '#wpbooklist-adduser-confirmemailname' ).val();
			var username = $( '#wpbooklist-adduser-usernamename' ).val();
			var libraries = $( '#wpbooklist-addbook-select-library' ).val();
			var addbooks = $( '#wpbooklist-adduser-permissions-add-book' ).val();
			var editbooks = $( '#wpbooklist-adduser-permissions-edit-book' ).val();
			var deletebooks = $( '#wpbooklist-adduser-permissions-delete-book' ).val();
			var displayoptions = $( '#wpbooklist-adduser-permissions-change-display-options' ).val();
			var settings = $( '#wpbooklist-adduser-permissions-change-settings' ).val();
			var wpUserResults = '';
			var responseHtml = '';
			var responsetype = '';
			var responseDiv = $( '#wpbooklist-admin-adduser-response-actual-container' );
			var data = [];
			var libraryString = '';
			$( '#wpbooklist-admin-adduser-response-actual-container' ).html( '' );

			console.log('libraries');
			console.log(libraries);


			// Build string of libraries user has access to.
			for ( var i = libraries.length - 1; i >= 0; i-- ) {
				libraryString = libraryString + '-' + libraries[i];
			}

			// If 'alllibraries' exists in Library string, just change it to all libraries.
			if ( -1 < libraryString.indexOf( 'alllibraries' ) ) {
				libraryString = 'alllibraries';
			}



			console.log('libraryString');
			console.log(libraryString);



			$( '#wpbooklist-spinner-1' ).animate({'opacity': 1}, 500 );

			if ( proceed ) {

				data = {
					'action': 'wpbooklist_dashboard_create_wp_user_action',
					'security': wpbooklistPhpVariables.adminnonce47,
					'firstname': firstname,
					'lastname': lastname,
					'email': email,
					'emailconfirm': emailconfirm,
					'password': password,
					'passwordconfirm': passwordconfirm,
					'username': username,
					'addbooks': addbooks,
					'editbooks': editbooks,
					'deletebooks': deletebooks,
					'displayoptions': displayoptions,
					'settings': settings,
					'librarystring': libraryString
				};

				$.ajax({
					url: ajaxurl,
					type: 'POST',
					data: data,
					timeout: 0,
					success: function( response ) {

						console.log( 'Response from checking for existing emails and usernames is:' );
						console.log( response );

						if ( 'Username Exists' === response ) {

							console.log( 'in usernames exists' );
							console.log( response );

							$( '#wpbooklist-spinner-1' ).animate({'opacity': 0}, 100 );

							// Create the Error messaging here - print out the mysql error for user to report back with
							responseHtml = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg" /><p class="wpbooklist-success-title">' + wpbooklistPhpVariables.trans90 + '</p><p class="wpbooklist-success-description">' + wpbooklistPhpVariables.trans486  +  ' '  +  username  +  '!</br>' + wpbooklistPhpVariables.trans487 + '</p>';

							// Add the response HTML and animate the height...
							responseDiv.html( responseHtml );
							responseDiv.animate({'height': '150px', 'opacity': '1'}, 500 );
						}

						if ( 'E-Mail Exists' === response ) {

							console.log('in emails exists')
							console.log(response)

							$( '#wpbooklist-spinner-1' ).animate({'opacity': 0}, 100 );

							// Create the Error messaging here - print out the mysql error for user to report back with.
							responseHtml = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg" /><p class="wpbooklist-success-title">' + wpbooklistPhpVariables.trans90 + '</p><p class="wpbooklist-success-description">' + wpbooklistPhpVariables.trans484  +  ' '  +  email  +  '!</br>' + wpbooklistPhpVariables.trans485 + '</p>';

							// Add the response HTML and animate the height...
							responseDiv.html( responseHtml );
							responseDiv.animate({'height': '150px', 'opacity': '1'}, 500 );
						}

						console.log('typeof response is:')
						console.log(typeof response)

						if ( -1 < response.indexOf( '$user_id--' ) ) {
							response = response.split( '--' );
						}

						if ( '$user_id' === response[0]  ) {

							console.log('in number typeof')
							console.log(response)

							// Modify/add info to the Data object.
							data.action = 'wpbooklist_save_user_data_action';
							data.security = wpbooklistPhpVariables.adminnonce48;
							data.wpuserid = response[1];
							data.librarystring = libraryString;

							$.ajax({
								url: ajaxurl,
								type: 'POST',
								data: data,
								timeout: 0,
								success: function( response ) {

									console.log('in success of call to actually create user')
									console.log(response)

									console.log( 'This is what we received back from the Server after trying to Insert/Update some daily data. Response[0] is either how many rows were modified, or the DB error message. Response[1] is the type of $wpdb function. Response[2] is Humandate. Response[3] is WP User ID. Response[4] is the $wpdb->prepared Query. Response[5] is the list of Transients that were deleted. Response[6] is the actual array of data we tried to insert/update with.' );
									response = JSON.parse( response );
									response[6] = JSON.parse( response[6]);
									console.log( response );

									// Turn off spinner...
									$( '#wpbooklist-spinner-1' ).animate({'opacity': 0}, 100 );

									// We successfully executed our DB query - doesn't mean anything was actually changed though - we could have effected zero rows - still, no errors so we're calling it good.
									responsetype = false;
									responseHtml = '';
									if ( 1 === response[0] || 0 === response[0]) {

										// Flag to determine what height to animate reponse div to
										responsetype = true;

										// Modify the response based on type of query
										if ( 'insert' === response[1]) {
											responseHtml = '<img id="wpbooklist-smile-icon-3" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'happy.svg" /><p class="wpbooklist-success-title">' + wpbooklistPhpVariables.trans38 + '</p><p class="wpbooklist-success-description">' + wpbooklistPhpVariables.trans488 + '!</p><p class="wpbooklist-success-advert">' + wpbooklistPhpVariables.trans43 + ' <a href="http://wpbooklist.com/index.php/extensions/">' + wpbooklistPhpVariables.trans44 + '</a></p><p class="wpbooklist-success-reviews">' + wpbooklistPhpVariables.trans45 + ' <a href="https://wordpress.org/support/plugin/wpbooklist/reviews/?filter=5">' + wpbooklistPhpVariables.trans46 + '</a></p>';
										}

									} else {

										// Create the Error messaging here - print out the mysql error for user to report back with
										responseHtml = '<img class="wpbooklist-ajax-return-img" src="' + wpbooklistPhpVariables.ROOT_IMG_ICONS_URL + 'shocked.svg" /><p class="wpbooklist-success-title">' + wpbooklistPhpVariables.trans381 + '</p><p class="wpbooklist-success-description">' + wpbooklistPhpVariables.trans382 + '...</p><p class="wpbooklist-success-advert">' + wpbooklistPhpVariables.trans383 + ' <a href="mailto:techsupport@wpbooklist.com">TechSupport@WPHealthTracker.com</a>:  <textarea class="wpbooklist-ajax-error-textarea">' + response[0] + '</textarea></p><p class="wpbooklist-success-reviews">' + wpbooklistPhpVariables.trans384 + '!</p>';
									}

									// Add the response HTML and animate the height...
									responseDiv.html( responseHtml );

									// Animate to one height if db entry was successful, otherwise animate to different height.
									if ( responsetype ) {
										responseDiv.animate({'height': '175px', 'opacity': '1'}, 500 );
									} else {
										responseDiv.animate({'height': '290px', 'opacity': '1'}, 500 );
									}

								}
							});
						}
					}

				});

			} else {
				$( '#wpbooklist-spinner-1' ).animate({'opacity': 0}, 500 );
			}

		});

	}

	function wpbooklistResetMissingDataAnim() {
		$( '#wpbooklist-adduser-firstname, #wpbooklist-adduser-emailname, #wpbooklist-adduser-confirmemailname, #wpbooklist-adduser-passwordname, #wpbooklist-adduser-confirmpasswordname, #wpbooklist-adduser-usernamename' ).click( function( e ) {
			$( this ).prev().removeClass( 'wpbooklist-missing-user-data-red' );
		});
	}
});
