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

		// Handles various aestetic functions for the back end
		function wpbooklist_various_aestetic_bits_back_end(){
		wp_enqueue_media();
		?>
		<script type="text/javascript" >
		"use strict";
		jQuery(document).ready(function($) {

		  // Making the last active library the viewed library after page reload
		  if(window.location.href.includes('library=') && window.location.href.includes('tab=edit-books') && window.location.href.includes('WPBookList')){
		        $('#wpbooklist-editbook-select-library').val(window.location.href.substr( window.location.href.lastIndexOf("=")+1));
		        $('#wpbooklist-editbook-select-library').trigger("change");
		  }

		  // Highlight active tab
		  if(window.location.href.includes('&tab=')){
		    $('.nav-tab').each(function(){
		      if(window.location.href == '<?php echo admin_url();?>admin.php'+$(this).attr('href')){
		        $(this).first().css({'background-color':'#F05A1A', 'color':'white'})
		      }
		    })
		  } else {
		    $('.nav-tab').first().css({'background-color':'#F05A1A', 'color':'white'})
		  }

		  // Only allow one localization checkbox to be checked
		  $(".wpbooklist-localization-checkbox").change(function(){
		    $('[name=us-based-book-info]').attr('checked', false);
		    $('[name=uk-based-book-info]').attr('checked', false);
		    $('[name=au-based-book-info]').attr('checked', false);
		    $('[name=br-based-book-info]').attr('checked', false);
		    $('[name=ca-based-book-info]').attr('checked', false);
		    $('[name=cn-based-book-info]').attr('checked', false);
		    $('[name=fr-based-book-info]').attr('checked', false);
		    $('[name=de-based-book-info]').attr('checked', false);
		    $('[name=in-based-book-info]').attr('checked', false);
		    $('[name=it-based-book-info]').attr('checked', false);
		    $('[name=jp-based-book-info]').attr('checked', false);
		    $('[name=mx-based-book-info]').attr('checked', false);
		    $('[name=es-based-book-info]').attr('checked', false); 
		    $('[name=nl-based-book-info]').attr('checked', false);
		    $('[name=sg-based-book-info]').attr('checked', false);
		    $(this).attr('checked', true);
		  });

		  // Handles the enabling/disabling of the 'Create a Library' button and input placeholder text
		  $(".wpbooklist-dynamic-input").on('click', function() { 
		    var currentVal = $(".wpbooklist-dynamic-input").val();
		    if(currentVal == 'Create a New Library Here...'){
		      $(".wpbooklist-dynamic-input").val('');
		    }
		  });
		  $(".wpbooklist-dynamic-input").bind('input', function() { 
		    var currentVal = $(".wpbooklist-dynamic-input").val();
		    if((currentVal.length > 0) && (currentVal != 'Create a New Library Here...')){
		      $("#wpbooklist-dynamic-shortcode-button").attr('disabled', false);
		    }
		  });

		  // Handles the 'check all' and 'uncheck all' function of the display options
		  $("#wpbooklist-check-all").on('click', function() { 
		    $("#wpbooklist-uncheck-all").prop('checked', false);
		    $('#wpbooklist-jre-backend-options-table input').each(function(){
		      $(this).prop('checked', true);
		    })
		  });
		  $("#wpbooklist-uncheck-all").on('click', function() { 
		    $("#wpbooklist-check-all").prop('checked', false);
		    $('#wpbooklist-jre-backend-options-table input').each(function(){
		      $(this).prop('checked', false);
		    })
		  });

		});
		</script>
		<?php
		}


		


	
		








		// Handles the popup that appears when the user deactivates WPBookList
		function wpbooklist_exit_survey(){
		?>
		<script type="text/javascript" >
		"use strict";
		jQuery(document).ready(function($) {

		  var modalHtml = '<!-- The Modal --><div id="myModal" class="modal"><!-- Modal content --><div class="modal-content"><span class="close">&times;</span><img id="jre-domain-all-zips-loc" width="40" src="<?php echo ROOT_IMG_URL ?>icon-256x256.png" /><p id="wpbooklist-modal-title">Whoa, Wait a sec!</p><p id="wpbooklist-modal-desc"><span style="font-weight:bold;font-style:italic;">Tell me why you\'re getting rid of WPBookList</span>, and I\'ll do my best to fix the issue! </p><div id="wpbooklist-modal-reason-div"><div><input type="checkbox" id="wpbooklist-modal-reason1" /><label>I Can\'t Add Any Books!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason2" /><label>It\'s Ugly!</label>  (<a href="https://wpbooklist.com/index.php/stylepaks-2/">StylePaks</a> - <a href="https://wpbooklist.com/index.php/templates-2/">Template Paks</a> - <a href="https://wpbooklist.com/index.php/downloads/stylizer-extension/">Stylizer Extension</a>)</div><div><input type="checkbox" id="wpbooklist-modal-reason3" /><label>It Doesn\'t Have a Feature I Need!</label><div id="wpbooklist-suggested-feature-div"><label></label><textarea id="wpbooklist-modal-textarea-suggest-feature" placeholder="What kind of feature are you looking for?"></textarea><label>Also, be sure to check out <a href="https://wpbooklist.com/index.php/extensions/">all the available Extensions</a> - chances are the feature you\'re looking for already exists!</label></div></div><div><input type="checkbox" id="wpbooklist-modal-reason4" /><label>It Broke My Website!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason5" /><label>It Doesn\'t Work Right With My Theme!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason6" /><label>The <a href="https://wpbooklist.com/index.php/extensions/" target="_blank">Extensions</a> Are Too Expensive!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason7" /><label>I Prefer a Different Book Plugin!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason8" /><label>This Pop-Up Is Annoying!</label></div><div><input type="checkbox" id="wpbooklist-modal-reason9" /><label>Just Not What I Thought It Was...</label></div><textarea id="wpbooklist-modal-textarea" placeholder="Provide Another Reason & Some Details Here"></textarea></div><div id="wpbooklist-modal-email-div"><label><span style="font-weight:bold;margin-bottom: -9px;display: block;">E-Mail Address (Optional)</span></br>(If provided, I\'ll personally respond to your concern)</label><input id="wpbooklist-modal-email" style="margin-top: 7px;width:200px;" type="text" placeholder="E-Mail Address" /></div><div id="wpbooklist-modal-submit">Submit - And Thanks For Trying WPBookList!</div><div id="wpbooklist-modal-close">Nah - Just Deactivate WPBookList!</div></div></div>';

		  $('body').append(modalHtml);
		  $('#myModal').css({'display':'none'})

		  $(document).on("click",".deactivate", function(event){
		    if( $(this).find('a').attr('href').indexOf('wpbooklist.php') != -1){

		      // Get and open the modal
		      var modal = document.getElementById('myModal');
		      modal.style.display = "block";

		      // Get the button that opens the modal
		      var btn = document.getElementById("myBtn");

		      // Get the <span> element that closes the modal
		      var span = document.getElementsByClassName("close")[0];

		      // When the user clicks on <span> (x), close the modal
		      span.onclick = function() {
		          //modal.style.display = "none";
		      }

		      // When the user clicks anywhere outside of the modal, close it
		      window.onclick = function(event) {
		          if (event.target == modal) {
		              //modal.style.display = "none";
		          }
		      }

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;

		    }
		  })

		  $(document).on("click","#wpbooklist-modal-reason3", function(event){

		    if($(this).prop('checked')){
		      $('#wpbooklist-suggested-feature-div').animate({'height':'110px', 'top':'5px'})
		    } else {
		      $('#wpbooklist-suggested-feature-div').animate({'height':'0px', 'top':'0px'})
		    }
		  });
		  

		});
		</script>
		<?php
		}

		// For validating that a user has become a Patreon Patron for StoryTimee
		function wpbooklist_patreon_validate_action_javascript() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {
		    $(document).on("click",".wpbooklist-storytime-signup-div-right", function(event){

		      window.location = "https://www.patreon.com/oauth2/authorize?response_type=code&client_id=fuL1ZQLyad6UPwhiIS1s3dlZcprkkF_mxcbdxWshJ-w_5znpRaap_NulMDa__2jH&redirect_uri=https://wpbooklist.com/index.php/storytime-patreon-redirect/&state="+encodeURIComponent(window.location.href);

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}

		// For simply linking to Patreon
		function wpbooklist_patreon_link_action_javascript() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {
		    $(document).on("click",".wpbooklist-storytime-signup-div-left", function(event){

		      window.location = "https://www.patreon.com/wpbooklist";

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		    $(document).on("click","#wpbooklist-storytime-for-demo-link", function(event){

		      var scrollTop = $("#wpbooklist-storytime-demo-top-cont").offset().top-50

		      // Scrolls back to the top of the title 
		      if(scrollTop != 0){
		        $('html, body').animate({
		          scrollTop: scrollTop
		        }, 1500);
		        scrollTop = 0;
		      }

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });



		});
		</script>
		<?php
		}

		// For scrolling the StoryTime content div on arrow clicks & for playing sound effects
		function wpbooklist_storytime_scroll_action_javascript() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {


		    var contentDiv = $("#wpbooklist-storytime-reader-content-div");
		    var contentLocation = contentDiv.attr('data-location');
		    var path = "<?php echo SOUNDS_URL ?>navleftright.mp3"
		    var snd = new Audio(path);

		    if(contentLocation == 'backend'){
		      contentDiv.scroll(function() {
		          $('#wpbooklist-storytime-reader-pagination-div-2-span-1').text(Math.trunc(contentDiv.scrollTop()/337)+1)
		      });
		    } else {
		      contentDiv.scroll(function() {
		          $('#wpbooklist-storytime-reader-pagination-div-2-span-1').text(Math.trunc(contentDiv.scrollTop()/370)+1)
		      });
		    }

		    $(document).on("click","#wpbooklist-storytime-reader-pagination-div-3", function(event){

		      var contentDiv = $("#wpbooklist-storytime-reader-content-div");
		      var path = "<?php echo SOUNDS_URL ?>navleftright.mp3"
		      var snd = new Audio(path);
		      snd.play();

		      $(this).css({'pointer-events':'none'})

		      var currentPage = $('#wpbooklist-storytime-reader-pagination-div-2-span-1');
		      var currentPageNum = parseInt($('#wpbooklist-storytime-reader-pagination-div-2-span-1').text());
		      var totalPages = parseInt($('#wpbooklist-storytime-reader-pagination-div-2-span-3').text());

		      if(contentLocation == 'backend'){
		        var scrollGoal =  (currentPageNum)*337
		      } else {
		        var scrollGoal =  (currentPageNum)*370
		      }

		      contentDiv.animate({
		           scrollTop: scrollGoal+'px'
		        }, {
		           duration: 1000,
		           complete: function() { 
		              $('#wpbooklist-storytime-reader-pagination-div-3').css({'pointer-events':'all'})
		              
		           }
		       });

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		    $(document).on("click","#wpbooklist-storytime-reader-pagination-div-1", function(event){

		      var contentDiv = $("#wpbooklist-storytime-reader-content-div");
		      var path = "<?php echo SOUNDS_URL ?>navleftright.mp3"
		      var snd = new Audio(path);
		      snd.play();

		      $(this).css({'pointer-events':'none'})

		      var currentPage = $('#wpbooklist-storytime-reader-pagination-div-2-span-1');
		      var currentPageNum = parseInt($('#wpbooklist-storytime-reader-pagination-div-2-span-1').text());
		      var totalPages = parseInt($('#wpbooklist-storytime-reader-pagination-div-2-span-3').text());


		      if(contentLocation == 'backend'){
		        if(contentDiv.scrollTop()%337 == 0){
		          var scrollGoal =  (currentPageNum-2)*337
		        } else {
		          var scrollGoal =  (currentPageNum-1)*337
		        }
		      } else {
		        if(contentDiv.scrollTop()%370 == 0){
		          var scrollGoal =  (currentPageNum-2)*370
		        } else {
		          var scrollGoal =  (currentPageNum-1)*370
		        }
		      }

		      contentDiv.animate({
		           scrollTop: scrollGoal+'px'
		        }, {
		           duration: 1000,
		           complete: function() { 
		              $('#wpbooklist-storytime-reader-pagination-div-1').css({'pointer-events':'all'})
		              
		           }
		       });

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}

		



		

		

		// Handles the front-end search stuff, as well as the 'Reset Filters, Sort, and Search' button
		function wpbooklist_library_frontend_search() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {

		    // The click handler for the big ol' "Reset Filter, Sort & Search" button
		    $(document).on("click",".wpbooklist-reset-search-and-filters", function(event){

		      // Simply reload the page without any URL parameters
		      var url = window.location.href;
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        url = beforeParams;
		      }

		      // Reload the page
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		    // When the Search form is submitted/the Search button is clicked
		    $(".wpbooklist-search-form").on("submit", function() {

		      // Get info we need to build search query, specific to the particular library on the page in question, and not every Library that may exist on the same page 
		      var formid = $(this).attr('id');
		      var table = $(this).attr('data-table');
		      var title = $('#'+formid+' #wpbooklist-book-title-search').prop('checked');
		      var author = $('#'+formid+' #wpbooklist-author-search').prop('checked');
		      var category = $('#'+formid+' #wpbooklist-cat-search').prop('checked');
		      var searchterm = $('#'+formid+' #wpbooklist-search-text').val();
		      var url = window.location.href;
		      var params = '';


		      // Set the params based on they type of search
		      if(title){
		        params = params+'searchbytitle=title&';
		      }

		      if(author){
		        params = params+'searchbyauthor=author&';
		      }

		      if(category){
		        params = params+'searchbycategory=category&';
		      }

		      // If all of, or none of, the checkboxes were checked
		      if((!title && !author && !category) || (title && author && category)){
		        params = 'searchbytitle=title&searchbyauthor=author&searchbycategory=category&';
		      }

		      // Append the actual search term
		      params = params+'searchterm='+searchterm+'&querytable='+table;

		      // Build the final complete URL
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        beforeParams = beforeParams+'?';
		        url = beforeParams+params;
		      }else{
		        url += '?'+params
		      }

		      // Reload the page with the completed search parameters
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}

		// Handles the front-end pagination select and left & right buttons
		function wpbooklist_library_frontend_pagination() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {

		    // The change handler for the 'Sort By...' Select input
		    $(document).on("change",".wpbooklist-pagination-middle-div-select", function(event){

		      var table = $(this).attr('data-table');
		      var selection = $(this).val();
		      var url = window.location.href;


		      // Build the final complete URL //
		        // If params already exist...
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        var existingParams = url.split('?')[1];

		        // If there is already an offset in the URL, remove it
		        if(existingParams.indexOf('offset') > -1){
		          existingParams = existingParams.split('offset')[1];

		          //if there are residual parts of the offset param left, remove them
		          if(existingParams.startsWith("=")){
		            existingParams = existingParams.split(/&(.+)/)[1];
		          }
		        }

		        url = beforeParams+'?offset='+selection+'&'+existingParams;

		      }else{
		        url += '?offset='+selection+'&querytable='+table;
		      }

		      // Reload the page with the completed sort parameter, and any existing Search parameters 
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		    // The click handler for the 'Sort By...' Select input
		    $(document).on("click",".wpbooklist-pagination-left-div", function(event){

		      var table = $(this).attr('data-table');
		      var selection = $(this).attr('data-offset')
		      var url = window.location.href;


		      // Build the final complete URL //
		        // If params already exist...
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        var existingParams = url.split('?')[1];

		        // If there is already an offset in the URL, remove it
		        if(existingParams.indexOf('offset') > -1){
		          existingParams = existingParams.split('offset')[1];

		          //if there are residual parts of the offset param left, remove them
		          if(existingParams.startsWith("=")){
		            existingParams = existingParams.split(/&(.+)/)[1];
		          }
		        }

		        url = beforeParams+'?offset='+selection+'&'+existingParams;

		      }else{
		        url += '?offset='+selection+'&querytable='+table;
		      }

		      // Reload the page with the completed sort parameter, and any existing Search parameters 
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		    // The click handler for the 'Sort By...' Select input
		    $(document).on("click",".wpbooklist-pagination-right-div", function(event){

		      var table = $(this).attr('data-table');
		      var selection = $(this).attr('data-offset')
		      var url = window.location.href;


		      // Build the final complete URL //
		        // If params already exist...
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        var existingParams = url.split('?')[1];

		        // If there is already an offset in the URL, remove it
		        if(existingParams.indexOf('offset') > -1){
		          existingParams = existingParams.split('offset')[1];

		          //if there are residual parts of the offset param left, remove them
		          if(existingParams.startsWith("=")){
		            existingParams = existingParams.split(/&(.+)/)[1];
		          }
		        }

		        url = beforeParams+'?offset='+selection+'&'+existingParams;

		      }else{
		        url += '?offset='+selection+'&querytable='+table;
		      }

		      // Reload the page with the completed sort parameter, and any existing Search parameters 
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });

		});
		</script>
		<?php
		}

		// Handles the front-end 'Sort By...' Select input
		function wpbooklist_library_frontend_sort_select() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {

		    // The change handler for the 'Sort By...' Select input
		    $(document).on("change",".wpbooklist-sort-select-box", function(event){

		      var table = $(this).attr('data-table');
		      var selection = $(this).val();
		      var url = window.location.href;


		      // Build the final complete URL //
		        // If params already exist...
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        var existingParams = url.split('?')[1];


		        // If there is already an offset in the URL, remove it
		        if(existingParams.indexOf('offset') > -1){
		          existingParams = existingParams.split('offset')[1];

		          //if there are residual parts of the offset param left, remove them
		          if(existingParams.startsWith("=")){
		            existingParams = existingParams.split(/&(.+)/)[1];
		          }
		        }

		        if(existingParams.indexOf('sortby') > -1){
		          existingParams = existingParams.split(/&(.+)/)[1];
		        }



		        url = beforeParams+'?sortby='+selection+'&'+existingParams;

		      }else{
		        url += '?sortby='+selection+'&querytable='+table;
		      }
		      // Reload the page with the completed sort parameter, and any existing Search parameters 
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}


		// Handles the front-end 'Filter By' Select inputs
		function wpbooklist_library_frontend_filter_selects() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {

		    // The change handler for the 'Sort By...' Select input
		    $(document).on("change",".wpbooklist-frontend-filter-select", function(event){

		      var table = $(this).attr('data-table');
		      var which = $(this).attr('data-which');
		      var selection = $(this).val();

		      // Handling the pubyear filter scenario
		      if(which == 'pubyears'){
		        selection = $('#wpbooklist-year-range-1-'+table).val()+$('#wpbooklist-year-range-2-'+table).val()+'-'+$('#wpbooklist-year-range-3-'+table).val()+selection;
		      }

		      console.log(selection);

		      // Replace any '&' characters found in selection to prevent confusion in the URL between params and the actual values - applies mainly to multiple authors when sorted by last name.
		      selection = encodeURI(selection.replace(/&/g, '-'));/,/g
		      var url = window.location.href;

		      // If params already exist...
		      if (url.indexOf('?') > -1){
		        var beforeParams = url.split('?')[0];
		        var existingParams = url.split('?')[1];

		        // If there is already an offset in the URL, remove it
		        if(existingParams.indexOf('offset') > -1){
		          existingParams = existingParams.split('offset')[1];
		          //if there are residual parts of the offset param left, remove them
		          if(existingParams.startsWith("=")){
		            // If ther is an '&' in existingParams still, split by it. If not, set existingParams to ''.
		            if(existingParams.indexOf('&') > -1){
		              existingParams = existingParams.split(/&(.+)/)[1];
		            } else {
		              existingParams = '';
		            }
		          }
		        }

		        // If this filter already exists in the URL, simply replace it with the selected one
		        if(existingParams.indexOf('filter'+which) > -1){
		          var beforeFilter = existingParams.split('filter'+which)[0];
		          var afterFilter = existingParams.split('filter'+which)[1];
		          if(afterFilter.indexOf('&') > -1){
		            afterFilter = '&'+afterFilter.split('&')[1];
		          } else{
		            afterFilter = '';
		          }
		          url = beforeParams+'?'+beforeFilter+'filter'+which+'='+selection+afterFilter;
		           console.log('url1')
		          console.log(url)

		        } else {
		          if(existingParams == ''){
		            url = beforeParams+'?filter'+which+'='+selection+'&querytable='+table;
		            console.log('url2')
		            console.log(url)
		          }else{
		            url = beforeParams+'?'+existingParams+'&filter'+which+'='+selection;
		            console.log('url3')
		            console.log(url)
		          }
		        }
		      }else{
		        // Append the new stuff plus the table, as there are no parameters in the URL at all yet
		        url += '?filter'+which+'='+selection+'&querytable='+table;
		        console.log('url4')
		            console.log(url)
		      }

		      // Reload the page with the completed sort parameter, and any existing Search parameters 
		      window.location.href = url;

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}



		/*
		* Below is a boilerplate function with Javascript
		*
		/*

		// For 
		add_action( 'admin_footer', 'wphealthtracker_boilerplate_javascript' );

		function wphealthtracker_boilerplate_javascript() { 
		?>
		  <script type="text/javascript" >
		  "use strict";
		  jQuery(document).ready(function($) {
		    $(document).on("click",".wphealthtracker-trigger-actions-checkbox", function(event){

		      event.preventDefault ? event.preventDefault() : event.returnValue = false;
		    });
		});
		</script>
		<?php
		}
		*/
  }
endif;