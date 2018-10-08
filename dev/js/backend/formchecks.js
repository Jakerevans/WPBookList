/*

jQuery( function( $ ) {
	'use strict';

	var amazonAuthYes = $( 'input[name="authorize-amazon-yes"]' );
	var amazonAuthNo = $( 'input[name="authorize-amazon-no"]' );
	var title = $( 'input[name="book-booktitle"]' );
	var finishedYes = $( 'input[name="book-finished-yes"]' );
	var finishedNo = $( 'input[name="book-finished-no"]' );
	var signedYes = $( 'input[name="book-signed-yes"]' );
	var signedNo = $( 'input[name="book-signed-no"]' );
	var firstEditionYes = $( 'input[name="book-firstedition-yes"]' );
	var firstEditionNo = $( 'input[name="book-firstedition-no"]' );
	var useAmazonYes = $( 'input[name="use-amazon-yes"]' );
	var useAmazonNo = $( 'input[name="use-amazon-no"]' );
	var isbn = $( 'input[name="book-isbn"]' );
	var amazonAuthQuestion = $( '#auth-amazon-question-label' );
	var useAmazonYesLabel = $( 'label[for="use-amazon-yes"]' );
	var useAmazonNoLabel = $( 'label[for="use-amazon-no"]' );
	var useAmazonQuestion = $( '#use-amazon-question-label' );
	var titleLabel = $( '#wpbooklist-addbook-label-booktitle' );
	var isbnLabel = $( 'label[for="isbn"]' );
	var finishedYesLabel = $( '#book-date-finished-label' );
	var finishedYesInput = $( '#wpbooklist-addbook-date-finished' );
	var pubDate = $( 'input[name="book-pubdate"]' );
	var pageYes = $( '#wpbooklist-addbook-page-yes' );
	var pageNo = $( '#wpbooklist-addbook-page-no' );
	var postYes = $( '#wpbooklist-addbook-post-yes' );
	var postNo = $( '#wpbooklist-addbook-post-no' );
/*



	// Reset Book Title color and font-weight
	title.click(function() {
		titleLabel.css({'color': 'black', 'font-weight': 'normal'});
		if ( title.val() == 'Title Required!' ) {
			title.val( '' );
		}
	})




	$( document ).on( 'click', '#wpbooklist-editbook-isbn, #wpbooklist-addbook-isbn', function( event ) {
		if ( $( '#wpbooklist-editbook-isbn' ).val() == 'ISBN Required!' ) {
			$( '#wpbooklist-editbook-isbn' ).val( '' );
		}

		if ( $( '#wpbooklist-addbook-isbn' ).val() == 'ISBN Required!' ) {
			$( '#wpbooklist-addbook-isbn' ).val( '' );
		}

		$( 'label[for="isbn"]' ).css({'color': 'black', 'font-weight': 'normal'});
	});



	// Toggle behavior for WooCommerce Product checkboxes
	$( document ).on( 'click', '#wpbooklist-woocommerce-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-no' ).prop( 'checked', false );
		}
	});
	$( document ).on( 'click', '#wpbooklist-woocommerce-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-yes' ).prop( 'checked', false );
		}
	});

	 // Toggle behavior for WooCommerce Virtual Product checkboxes
	$( document ).on( 'click', '#wpbooklist-woocommerce-vert-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-vert-no' ).prop( 'checked', false );
		}
	});
	$( document ).on( 'click', '#wpbooklist-woocommerce-vert-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-vert-yes' ).prop( 'checked', false );
		}
	});

		 // Toggle behavior for WooCommerce Download Product checkboxes
	$( document ).on( 'click', '#wpbooklist-woocommerce-download-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-download-no' ).prop( 'checked', false );
		}
	});
	$( document ).on( 'click', '#wpbooklist-woocommerce-download-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-download-yes' ).prop( 'checked', false );
		}
	});

		 // Toggle behavior for WooCommerce review checkboxes
	$( document ).on( 'click', '#wpbooklist-woocommerce-review-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-review-no' ).prop( 'checked', false );
		}
	});
	$( document ).on( 'click', '#wpbooklist-woocommerce-review-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '#wpbooklist-woocommerce-review-yes' ).prop( 'checked', false );
		}
	});


	// Toggle effects for displaying WooCommerce fields
	$( document ).on( 'click', '#wpbooklist-woocommerce-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '.wpbooklist-woo-row' ).css({'display': 'table-row'})
			$( '.wpbooklist-woo-row' ).animate({'opacity': '1'})
			var price = $( '#wpbooklist-addbook-price' ).val();
			$( '#wpbooklist-addbook-woo-regular-price' ).val(price );
		} else {
			$( '.wpbooklist-woo-row' ).animate({'opacity': '0'})
			$( '.wpbooklist-woo-row' ).css({'display': 'none'})
			$( '#wpbooklist-addbook-woo-regular-price' ).val( '' );
		}
	});
	$( document ).on( 'click', '#wpbooklist-woocommerce-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '.wpbooklist-woo-row' ).animate({'opacity': '0'})
			$( '.wpbooklist-woo-row' ).css({'display': 'none'})
			$( '#wpbooklist-addbook-woo-regular-price' ).val( '' );
		}
	});

	// Toggle effects for displaying WooCommerce fields
	$( document ).on( 'click', '#wpbooklist-woocommerce-download-yes, #wpbooklist-woocommerce-vert-yes', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '.wpbooklist-woo-row-upload' ).animate({'opacity': '1'})
			$( '.wpbooklist-woo-row-upload' ).css({'display': 'table-row'})
			$( '#wpbooklist-addbook-woo-width' ).prop( 'disabled',true );
			$( '#wpbooklist-addbook-woo-height' ).prop( 'disabled',true );
			$( '#wpbooklist-addbook-woo-weight' ).prop( 'disabled',true );
			$( '#wpbooklist-addbook-woo-length' ).prop( 'disabled',true );
			$( '.book-woocommerce-label-dim' ).css({'opacity': '0.3'});
		} else {
			$( '.wpbooklist-woo-row-upload' ).animate({'opacity': '0'})
			$( '.wpbooklist-woo-row-upload' ).css({'display': 'none'})
			$( '#wpbooklist-addbook-woo-width' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-height' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-weight' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-length' ).prop( 'disabled',false );
			$( '.book-woocommerce-label-dim' ).css({'opacity': '1'});
		}
	});

	// Toggle effects for displaying WooCommerce fields
	$( document ).on( 'click', '#wpbooklist-woocommerce-download-no, #wpbooklist-woocommerce-vert-no', function( event ) {
		if ( $( this ).prop( 'checked' ) === true) {
			$( '.wpbooklist-woo-row-upload' ).animate({'opacity': '0'})
			$( '.wpbooklist-woo-row-upload' ).css({'display': 'none'})
			$( '#wpbooklist-addbook-woo-width' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-height' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-weight' ).prop( 'disabled',false );
			$( '#wpbooklist-addbook-woo-length' ).prop( 'disabled',false );
			$( '.book-woocommerce-label-dim' ).css({'opacity': '1'});
		} else {
		
		}
	});



	// Masks for various inputs, utililizing the jQuery Masked Input plugin
	$( 'input[name="book-pubdate"]' ).mask("9999' );


});


// Checks for missing data that is required to be answered to add book
function wpbooklist_add_book_validator() {
	"use strict";
	jQuery(document).ready(function($) {
		var isbn = $( 'input[name="book-isbn"]' );
		var isbnLabel = $( 'label[for="isbn"]' );
		var useAmazonQuestion = $( '#use-amazon-question-label' );
		var titleLabel = $( '#wpbooklist-addbook-label-booktitle' );
		var amazonAuthQuestion = $( '#auth-amazon-question-label' );
		var amazonAuthYes = $( 'input[name="authorize-amazon-yes"]' );
		var amazonAuthQuestion = $( '#auth-amazon-question-label' );
		var amazonAuthNo = $( 'input[name="authorize-amazon-no"]' );
		var useAmazonYes = $( 'input[name="use-amazon-yes"]' );
		var useAmazonNo = $( 'input[name="use-amazon-no"]' );
		var title = $( 'input[name="book-booktitle"]' );
		var titleLabel = $( '#wpbooklist-addbook-label-booktitle' );
		var errorFlag = false;

		// Reset all form checks
		isbnLabel.css({'color': 'black', 'font-weight': 'normal'});
		useAmazonQuestion.css({'font-weight': 'normal', 'color': 'black'});
		titleLabel.css({'color': 'black', 'font-weight': 'normal'});
		amazonAuthQuestion.css({'color': 'black', 'font-weight': 'normal'});
		var scrollTop = 0;

		// Test ISBN for valid characters
		var isbnVal = isbn.val();
		isbnVal = isbnVal.replace( '-', '' );
		isbnVal = isbnVal.replace( ' ', '' );
		var isnum = /^\d+$/.test(isbnVal);
		if ( isbnVal == '' && useAmazonYes.prop( 'checked' ) === true) {
			isbnLabel.css({'font-weight': 'bold', 'color': 'red'});
			scrollTop = isbnLabel.offset().top-50
		} else {
			isbn.val(isbnVal);
		}

		// Check Amazon Authorization
		if ( amazonAuthYes.prop( 'checked' ) === false && amazonAuthNo.prop( 'checked' ) === false) {
			amazonAuthQuestion.css({'font-weight': 'bold', 'color': 'red'});
			if ( scrollTop > amazonAuthQuestion.offset().top-50) {
				scrollTop = amazonAuthQuestion.offset().top-50
			}
			if ( scrollTop == 0) {
				scrollTop = amazonAuthQuestion.offset().top-50
			}
			errorFlag = true;
		}

		// Check Amazon Usage
		if ( useAmazonYes.prop( 'checked' ) === false && useAmazonNo.prop( 'checked' ) === false && (amazonAuthYes.prop( 'checked' ) === true || amazonAuthNo.prop( 'checked' ) === true)) {
			useAmazonQuestion.css({'font-weight': 'bold', 'color': 'red'});
			if ( scrollTop > useAmazonQuestion.offset().top-50) {
				scrollTop = useAmazonQuestion.offset().top-50
			} 
			if ( scrollTop == 0) {
				scrollTop = useAmazonQuestion.offset().top-50
			}
			errorFlag = true;
		}
		if ( useAmazonYes.prop( 'checked' ) === true && (isbn.val() == '' || isbn.val() == undefined || isbn.val() == null)) {
			isbn.val( 'ISBN Required!' );
			isbnLabel.css({'color': 'red', 'font-weight': 'bold'});
			if ( scrollTop > isbnLabel.offset().top-50) {
				scrollTop = isbnLabel.offset().top-50
			}
			if ( scrollTop == 0) {
				scrollTop = isbnLabel.offset().top-50
			}
			errorFlag = true;
		}



		// Scroll the the highest flagged element 
		if ( scrollTop != 0) {
			$( 'html, body' ).animate({
				scrollTop: scrollTop
			}, 500);
			scrollTop = 0;
		}

		// DOM element that reports back on the form error state
		$( '#wpbooklist-add-book-error-check' ).attr( 'data-add-book-form-error', errorFlag);

	});

}

*/