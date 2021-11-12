jQuery( document ).ready( function( $ ) {
	'use strict';
	
	learnpressArchiveFiltering();

	$( '.manual-tabpanel' ).each( function( index, element ) {
		var $el = $( this );
		var $navTabs = $( this ).children( '.manual-nav-tabs' );
		var $contentTabs = $( this ).children( '.manual-tab-content' );
		var currentTab = 0;
		var maxTab = $navTabs.children().length;

		$navTabs.children().eq( currentTab ).addClass( 'active' );
		$contentTabs.children().eq( currentTab ).addClass( 'active' );

		$el.children( '.manual-nav-tabs' ).on( 'click', 'a', function( e ) {
			e.preventDefault();

			var parent = $( this ).parent( 'li' );
			if ( parent.hasClass( 'active' ) ) {
				return;
			}

			parent.siblings().removeClass( 'active' );
			parent.addClass( 'active' );

			currentTab = parent.index();

			$contentTabs.children().removeClass( 'active' );
			$contentTabs.children().eq( currentTab ).addClass( 'active' );
		} );

		$el.on( 'click', '.tab-mobile-heading', function( e ) {
			e.preventDefault();

			var parent = $( this ).parent( '.tab-panel' );
			if ( parent.hasClass( 'active' ) ) {
				return;
			}

			parent.siblings().removeClass( 'active' );
			parent.addClass( 'active' );

			currentTab = parent.index();

			$navTabs.children().removeClass( 'active' ).eq( currentTab ).addClass( 'active' );
		} );

		$el.on( 'click', '.tab-button', function( e ) {
			e.preventDefault();
			var role = $( this ).attr( 'aria-controls' );

			if ( 'next' === role ) {
				if ( currentTab < maxTab - 1 ) {
					currentTab ++;

					$navTabs.children().removeClass( 'active' ).eq( currentTab ).addClass( 'active' );
					$contentTabs.children().removeClass( 'active' ).eq( currentTab ).addClass( 'active' );
				}
			} else {
				if ( currentTab > 0 ) {
					currentTab --;

					$navTabs.children().removeClass( 'active' ).eq( currentTab ).addClass( 'active' );
					$contentTabs.children().removeClass( 'active' ).eq( currentTab ).addClass( 'active' );
				}
			}
		} );
	} );
	
	function learnpressArchiveFiltering() {  
		var $form = $( '#course-archive-filtering' );
		if ( $form.length > 0 ) {
			var $select = $form.find( 'select' );
			$select.on( 'change', function() {
				$( this ).closest( 'form' ).submit();
			} );
		}
	}
	
	
} );
