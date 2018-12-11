/**
 * JavaScript Admin Functions - wpbooklist-frontend.min.js
 *
 * @author   Jake Evans
 * @category JavaScript
 * @package  Includes/Assets/Js
 * @version  6.0.0
 */

console.log( 'This is the JavaScript Object that holds all PHP Variables for use in JavaScript' );
console.log( wpbooklistPhpVariables );


// All functions wrapped in jQuery(document).ready()...
jQuery( document ).ready( function( $ ) {
	'use strict';

	/* BEGINNING SECTION TO CALL ALL FUNCTIONS IN FILE... */

	// Handles setting up the Readmore stuff
	wpbooklistSetupReadmore();

	// Clears the frontend search box on click if it has it's default value.
	wpbooklistClearSearchBox();

	/* ENDING SECTION TO CALL ALL FUNCTIONS IN FILE... */

	// Handles setting up the Readmore stuff
	function wpbooklistSetupReadmore() {

		// Enables the 'Read More' link for the description block in a post utilizing the readmore.js file
		$( '#wpbl-posttd-book-description-contents' ).readmore({
			speed: 175,
			heightMargin: 16,
			collapsedHeight: 100,
			moreLink: '<a href="#">Read more</a>',
			lessLink: '<a href="#">Read less</a>'
		});

		// Enables the 'Read More' link for the notes block in a post utilizing the readmore.js file
		$( '#wpbl-posttd-book-notes-contents' ).readmore({
			speed: 75,
			heightMargin: 16,
			collapsedHeight: 100,
			moreLink: '<a href="#">Read more</a>',
			lessLink: '<a href="#">Read less</a>'
		});

		// Enables the 'Read More' link for the description block in a post utilizing the readmore.js file
		$( '#wpbl-pagetd-book-description-contents' ).readmore({
			speed: 175,
			heightMargin: 16,
			collapsedHeight: 100,
			moreLink: '<a href="#">Read more</a>',
			lessLink: '<a href="#">Read less</a>'
		});

		// Enables the 'Read More' link for the notes block in a post utilizing the readmore.js file
		$( '#wpbl-pagetd-book-notes-contents' ).readmore({
			speed: 75,
			heightMargin: 16,
			collapsedHeight: 100,
			moreLink: '<a href="#">Read more</a>',
			lessLink: '<a href="#">Read less</a>'
		});
	}

	// Clears the frontend search box on click if it has it's default value.
	function wpbooklistClearSearchBox() {

		// Clears the frontend search box on click if it has it's default value.
		$( document ).on( 'click', '.wpbooklist-search-text-class', function( event ) {
			if ( wpbooklistPhpVariables.commontrans1 + '...' == $( this ).val() ) {
				$( this ).val( '' );
			}
		});

	}


});
