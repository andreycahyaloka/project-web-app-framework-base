// document ready
	$(document).ready(function ($) {
		console.log('javascript ready.');

		// window scroll
			$(window).scroll(function () {
				// scroll indicator
				myScroll_indicatorFunction();

				// go to top
				myButtonGo_to_topFunction();
			});

		// dropdown
			$('button.dropdown-button').click(function () {
				// get this dropdown-content
				var dropdownContent = $(this).siblings('div.dropdown-content, div.dropup-content');

				// get all dropdown-content
				var dropdownContents = $('div.dropdown-content, div.dropup-content');

				var dropdownOutput = new myDropdownOutputFunction(dropdownContent, dropdownContents);
				return dropdownOutput;
			});

			// dropdown click outside hide
			$(document).click(function (event) {
				// get all dropdown-container
				var dropdownContainers = $('div.main-dropdown-container');

				// get all dropdown-content
				var dropdownContents = $('div.dropdown-content, div.dropup-content');

				var dropdownClickOutsideOutput = new myDropdownClickOutsideOutputFunction(event, dropdownContainers, dropdownContents);
				return dropdownClickOutsideOutput;
			});

		// tabs
			$('div.tabs-button button').click(function () {
				// get this tabs-button
				var tabsButton = $(this);

				// get this tabs-button id
				var tabsButtonId = $(this).attr('id');

				// get all tabs-button from this tabs-container
				var tabsButtons = $(this).parents('div.main-tabs-container').find('div.tabs-button button');

				// get tabs-content with id = tabs-button id from this tabs-container
				var tabsContent = $(this).parents('div.main-tabs-container').find('div.tabs-content div#'+tabsButtonId);

				// get all tabs-content from this tabs-container
				var tabsContents = $(this).parents('div.main-tabs-container').find('div.tabs-content div').siblings().attr('style', 'color: red !important');;

				console.log(tabsContents);

				var tabsOutput = new myTabsOutputFunction(tabsButton, tabsButtons, tabsContent, tabsContents);
				return tabsOutput;
			});

		// fuck
			var fuck = $('div.fuck-container').find('div.fuck-parent').children('div').children('div').addClass('fuck');

			console.log(fuck);
	});

/**
 * function
 */
// scroll indicator
	function myScroll_indicatorFunction() {
		var divWindowScroll = $(window).scrollTop();

		var divWindowHeight = $(window).height();
		var divDocumentHeight = $(document).height();

		var contentHeight = divDocumentHeight - divWindowHeight;
		var scrollValue = divWindowScroll / contentHeight;
		var scrollPercent = scrollValue * 100;

		$('#myScroll_indicatorContent').each(function () {
			// this.style.setProperty('width', scrollPercent + '%', 'important');
			$(this).css({
				'cssText': 'width: ' + scrollPercent + '% !important;' +
					'background-color: rgba(var(--color-primary-light), 1) !important;'
			});
		});
	};

// go to top
	function myGo_to_topFunction() {
		// $(window).scrollTop(0);
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	}

	// go to top button
	function myButtonGo_to_topFunction() {
		if($(window).scrollTop() >= 500) {
			$('button#myButtonGo_to_top').each(function () {
				this.style.setProperty('display', 'block', 'important');
			});
		}
		else {
			$('button#myButtonGo_to_top').each(function () {
				this.style.setProperty('display', 'none', 'important');
			});
		}
	}

// dropdown
	function myDropdownOutputFunction(dropdownContent, dropdownContents) {
		dropdownContent.toggleClass('active');
		dropdownContents.not(dropdownContent).removeClass('active');
	}

	// dropdown click outside hide
	function myDropdownClickOutsideOutputFunction(event, dropdownContainers, dropdownContents) {
		event.stopPropagation();

		if (dropdownContainers.has(event.target).length == 0) {
			dropdownContents.removeClass('active');
		}
	}

// tabs
	function myTabsOutputFunction(tabsButton, tabsButtons, tabsContent, tabsContents) {
		tabsButton.addClass('active');
		tabsContent.addClass('active');
		tabsButtons.not(tabsButton).removeClass('active');
		tabsContents.not(tabsContent).removeClass('active');
		
	}

/**
 * direct click
 */
// aside
	// aside open
	// set the width of the side navigation to 270px
	function myAsideOpenFunction() {
		$('#myAside').each(function () {
			this.style.setProperty('width', '270px', 'important');
			this.style.setProperty('opacity', '1', 'important');
		});
	}

	// aside background open
	function myAside_bgOpenFunction() {
		$('#myAside_bg').each(function () {
			this.style.setProperty('width', '100%', 'important');
			this.style.setProperty('opacity', '0.75', 'important');
		});
	}

	// aside close
	// set the width of the side navigation to 0
	function myAsideCloseFunction() {
		$('#myAside').each(function () {
			this.style.setProperty('width', '0px', 'important');
			this.style.setProperty('opacity', '0', 'important');
		});
	}

	// aside background close
	function myAside_bgCloseFunction() {
		$('#myAside_bg').each(function () {
			this.style.setProperty('width', '0%', 'important');
			this.style.setProperty('opacity', '0', 'important');
		});
	}