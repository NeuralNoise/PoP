<?php
class PoP_Core_ServerSide_Functions {

	//-------------------------------------------------
	// PUBLIC FUNCTIONS
	//-------------------------------------------------

	function expandJSKeys(&$args) {
	
		$context = &$args['context'];

		if ($context[GD_JS_FONTAWESOME]) {
			$context['fontawesome'] = $context[GD_JS_FONTAWESOME];
		}
		if ($context[GD_JS_DESCRIPTION]) {
			$context['description'] = $context[GD_JS_DESCRIPTION];
		}
	}

	function beep($args) { return "function beep(args)"; /*

		// It beeps only once in total, and not once per target
		// Function beep in utils.js
		beep();
	*/}

	function showmore($args) { return "function showmore(args)"; /*

		var targets = args.targets;

		// span with class "pop-showmore-more-full" can also be inside the <p></p>
		targets.find(".pop-showmore-more").click(function(e) {

			e.preventDefault();
			
			var link = $(this);
			var content = link.closest('.pop-content');
			content.find(".pop-showmore-more").addClass('hidden');
			content.find(".pop-showmore-less").removeClass('hidden');
			content.find(".pop-showmore-more-full").removeClass('hidden');
		});		
						
		targets.find(".pop-showmore-less").click(function(e) {

			e.preventDefault();

			var link = $(this);
			var content = link.closest('.pop-content');
			content.find(".pop-showmore-less").addClass('hidden');
			content.find(".pop-showmore-more").removeClass('hidden');
			content.find(".pop-showmore-more-full").addClass('hidden');
		});	
	*/}

	function hideEmpty($args) { return "function hideEmpty(args)"; /*


		var targets = args.targets;
		
		targets.closest('.pop-hide-empty').addClass('hidden');
	*/}

	function imageResponsive($args) { return "function imageResponsive(args)"; /*


		var targets = args.targets;
		
		// Add responsive to the images, and their captions, only inside the content-body
		// (So check to add this class wherever the imgs are needed to be resized. This way, we can exclude the images
		// that don't need so, eg: avatar in the comments)
		targets.find('div.pop-content').addBack('div.pop-content').find('img, .wp-caption').addClass('img-responsive');
	*/}

	function printWindow($args) { return "function printWindow(args)"; /*


		// Print only if parameter "action=print" is in the URL
		// This way, we can control when to print automatically and when not (eg: just to show the Print themeMode in GetPoP website)
		var action = getParam(M.URLPARAM_ACTION, window.location.href);
		if (action == M.URLPARAM_ACTION_PRINT) {
			
			jQuery(document).ready( function($) {
				window.print();
			});
		}
	*/}

	function copyHeader($args) { return "function copyHeader(args)"; /*

		var targets = args.targets, link = args.relatedTarget;

		// Whenever replicating an Addon, we might want to pick extra information from the opening link (relatedTarget), eg: Header from att data-header for the Contact Profile Addon
		if (link) {

			// Make sure the link we got is the original one, and not the intercepted one
			// header is stored under the original link, not the interceptor
			link = popManager.getOriginalLink(link);
			
			// Set the header if any on the link
			var header = link.data('header');
			if (header) {
				targets.find('.pop-header').removeClass('hidden').find('.pop-box').html(header);
			}
		}
	*/}

	function fillURLParamInput($args) { return "function fillURLParamInput(args)"; /*

		var block = args.block, targets = args.targets;

		targets.each(function() {

			var input = $(this);
			var val = t.getURLParamInputValue(block, input);			
			input.val(val);
		});
	*/}

	// fill the input when a new Addon PageSection is created (eg: Add Comment)
	function fillAddonInput($args) { return "function fillAddonInput(args)"; /*

		var targets = args.targets, link = args.relatedTarget;

		// Whenever replicating an Addon, we might want to pick extra information from the opening link (relatedTarget), eg: Header from att data-header for the Contact Profile Addon
		if (link) {
			
			targets.each(function() {

				var input = $(this);
				t.fillInput(input, link);
			});
		}
	*/}

	// fill the input when a the modal is shown (eg: Share by email)
	function fillModalInput($args) { return "function fillModalInput(args)"; /*

		var targets = args.targets;
		targets.each(function() {

			var input = $(this);
			var modal = input.closest('.modal');
			modal.on('show.bs.modal', function(e) {

				var link = $(e.relatedTarget);
				t.fillInput(input, link);
			});
		});
	*/}

	function fillAddonURLInput($args) { return "function fillAddonURLInput(args)"; /*

		var targets = args.targets, link = args.relatedTarget;

		// Whenever replicating an Addon, we might want to pick extra information from the opening link (relatedTarget), eg: Header from att data-header for the Contact Profile Addon
		if (link) {
			
			targets.each(function() {

				var input = $(this);
				t.fillURLInput(input, link);
			});
		}
	*/}

	// fill the input when a the modal is shown (eg: Share by email)
	function fillModalURLInput($args) { return "function fillModalURLInput(args)"; /*


		var targets = args.targets;
		targets.each(function() {

			var input = $(this);
			var modal = input.closest('.modal');
			modal.on('show.bs.modal', function(e) {

				var link = $(e.relatedTarget);
				t.fillURLInput(input, link);
			});
		});
	*/}

	function switchTargetClass($args) { return "function switchTargetClass(args)"; /*

		var targets = args.targets;
		targets.click(function(e) {
	
			var button = $(this);
			// If it is an anchor with href="#" then stop default (eg: toggle top search xs button)
			// Otherwise do not (eg: Notification mark as read/unread)
			if (button.is('a[href="#"]')) {
				e.preventDefault();
			}

			// If no target provided, use the body
			var target = $(button.data('target')) || $(document.body);

			// By default, add class
			var mode = button.data('mode') || 'add';
			
			var classs = button.data('class');

			if (mode == 'add') {
				target.addClass(classs);
			}
			else if (mode == 'remove') {
				target.removeClass(classs);
			}
			else if (mode == 'toggle') {
				target.toggleClass(classs);
			}
		});
	*/}

	function doNothing($args) { return "function doNothing(args)"; /*

		var targets = args.targets;

		targets.click(function(e) {
	
			// Just do nothing. Needed for <a href="#"> like the popover
			e.preventDefault();
		});
	*/}

	// Fetch more button
	function fetchMore($args) { return "function fetchMore(args)"; /*

		var pageSection = args.pageSection, block = args.block, targets = args.targets;

		block.on('beforeFetch', function(e, options) {

			// If doing a prepend, then the user can still call on fetchMore and append content
			// Prepend is needed by the loadLatest, which loads more at the top
			if (!options['skip-status']) {
				targets.button('loading');
			}
		});
		block.on('fetchCompleted', function(e) {

			var blockParams = popManager.getBlockParams(pageSection, block);
			if (blockParams[M.URLPARAM_STOPFETCHING]) {

				targets.addClass('hidden');
			}
			else {
				
				targets.removeClass('hidden');
				targets.button('reset');
			}	
		});

		targets.click(function(e) {
	
			e.preventDefault();
			popManager.fetchBlock(pageSection, block, {operation: M.URLPARAM_OPERATION_APPEND});
		});
	*/}

	function fetchMoreDisable($args) { return "function fetchMoreDisable(args)"; /*

		var block = args.block, targets = args.targets;

		block.on('beforeFetch', function(e, options) {

			// Disable buttons
			// If doing a prepend, then the user can still call on fetchMore and append content
			// Prepend is needed by the loadLatest, which loads more at the top
			if (!options['skip-status']) {
				targets.addClass('disabled').attr('disabled', 'disabled');
			}
		});

		block.on('fetchCompleted', function(e) {

			// Re-enable buttons
			targets.removeClass('disabled').attr('disabled', false);
		});
	*/}

	function saveLastClicked($args) { return "function saveLastClicked(args)"; /*

		var pageSection = args.pageSection, block = args.block, targets = args.targets;

		targets.click(function(e) {

			var clicked = $(this);
	
			// Comment Leo 02/10/2015: Look for all retries under the block and not only the ones under the block's own '.blocksection-status',
			// so that it also works when the filter is not in the block but in un upper level BlockGroup
			// Tell the "status" template that I'm the last clicked button, so in case of error it can retry
			// block.children('.blocksection-status').find('[data-action="retry"]').data('lastclicked', '#'+clicked.attr('id'));
			block.find('[data-action="retry"]').data('lastclicked', '#'+clicked.attr('id')).removeClass('hidden');
		});
	*/}

	function retrySendRequest($args) { return "function retrySendRequest(args)"; /*


		var pageSection = args.pageSection, block = args.block, targets = args.targets;
		targets.click(function(e) {

			e.preventDefault();
			var retryBtn = $(this);
			if (retryBtn.data('lastclicked')) {
	
				$(retryBtn.data('lastclicked')).trigger('click');
			}
		})
	*/}

	function highlight($args) { return "function highlight(args)"; /*

		var targets = args.targets;
		
		targets.each(function() {
	
			// Must obtain the pageSection again and not use the one passed in the args, since the pageSection might be a different one
			// (eg: adding a comment from frame-addons and content added in main)
			var target = $(this);
			var pageSection = popManager.getPageSection(target);
			popManager.scrollToElem(pageSection, target, true);
		});
	*/}

	function modalReloadEmbedPreview($args) { return "function modalReloadEmbedPreview(args)"; /*

		var pageSection = args.pageSection, targets = args.targets;
		targets.each(function() {

			var iframe = $(this);
			var block = popManager.getBlock(iframe);

			// Embed is the default urlType, but API also enabled
			var jsSettings = popManager.getJsSettings(pageSection, block, iframe);
			var urlType = jsSettings['url-type'] || 'embed';
			var modal = block.closest('.modal');
			modal.on('show.bs.modal', function(e) {

				// Important: once the modal opens, we need to find the iframe again, because the iframe
				// object will change all the time, being regenerated in function embedPreview return "// object will change all the time, being regenerated in function embedPrevi"; /*
				// So the original iframe will be used only once, on the first execution, and never again
				if (block.data('embed-iframe')) {
					iframe = $(block.data('embed-iframe'));
				}

				var link = $(e.relatedTarget);
				var url = t.getUrl(link, true);
				if (urlType == 'embed') {
					url = popManager.getEmbedUrl(url);
				}
				else if (urlType == 'api') {
					url = popManager.getAPIUrl(url);
				}
				t.embedPreview(pageSection, block, iframe, url);
			});
		});
	*/}

	function reloadEmbedPreview($args) { return "function reloadEmbedPreview(args)"; /*

		var pageSection = args.pageSection, block = args.block, targets = args.targets;
		targets.each(function() {

			var connector = $(this);
			var input = $(connector.data('input-target'));
			input.change(function() {
				
				var input = $(this);
				t.embedPreviewFromInput(pageSection, block, connector);
			});

			// If the input already has a value, then already do the embed (eg: Edit Link)
			t.embedPreviewFromInput(pageSection, block, connector);
		});
	*/}

	function replaceCode($args) { return "function replaceCode(args)"; /*

		var pageSection = args.pageSection, targets = args.targets;
		targets.each(function() {

			var input = $(this);
			var block = popManager.getBlock(input);
			
			// Default: Copy Search URL (ie: do nothing else to the url)
			var jsSettings = popManager.getJsSettings(pageSection, block, input);
			var urlType = jsSettings['url-type'] || '';
			var modal = input.closest('.modal');
			modal.on('show.bs.modal', function(e) {

				var link = $(e.relatedTarget);
				var url = t.getUrl(link);

				// Maybe the URL type is none, then leave the URL as it is (eg: Copy Search URL),
				// or it may need to add extra params, like embed or api
				if (urlType == 'embed') {
					url = popManager.getEmbedUrl(url);
				}
				else if (urlType == 'api') {
					url = popManager.getAPIUrl(url);
				}
				t.execReplaceCode(input, url);
			});
		});
	*/}

	function socialmedia($args) { return "function socialmedia(args)"; /*


		// Execute it only on hover, not directly because it takes so much time to load!
		var targets = args.targets;
		targets.one('mouseenter', function() {

			var socialmedia = $(this);
			socialmedia.children('a.socialmedia-item').each(function() {
				var item = $(this);
				var provider = item.data('provider');
				
				// If there's no provider, then do nothing (eg: GPlus)
				if (provider) {
					
					var settings = M.SOCIALMEDIA[provider];
					if (settings) {

						// Copied from http://www.codechewing.com/library/facebook-share-button-with-share-count/		
						$.ajax({
							type: 'GET',
							dataType: settings.dataType,
							url: settings['counter-url'].replace('%s', item.data('url')),
							success: function(json) {

								// console.log(json);
								
								// Check if the response contains a 'shares'/'count' property.
								if( !json.hasOwnProperty(settings.property) )
								return;

								var count = json[settings.property];
								if (count == 0) return;

								// A shares property and value must exist, update the span element with the share count
								item.children('.pop-counter').html(count);
							}
						});
					}
				}
			});
		});	
	*/}

	function mediaplayer($args) { return "function mediaplayer(args)"; /*


		var targets = args.targets;
		targets.mediaelementplayer();
	*/}

	function reset($args) { return "function reset(args)"; /*

		var pageSection = args.pageSection, targets = args.targets;

		// When clicking on this button, reset the block (eg: for Create new Project, allows to re-draw the form)
		targets.click(function(e) {
	
			e.preventDefault();
			var button = $(this);
			var block = popManager.getBlock(button);
			
			popManager.reset(pageSection, block);

			// Also close the message feedback
			popManager.closeMessageFeedback(block);
		});
	*/}

	function browserUrl($args) { return "function browserUrl(args)"; /*

		var targets = args.targets;

		// All the targets are inputs inside a form. Before the form submits, fill itself with the browser url value
		targets.closest('form').on('beforeSubmit', function() {

			var url = window.location.href;
			targets.val(url);
		})
	*/}

	function smallScreenHideCollapse($args) { return "function smallScreenHideCollapse(args)"; /*

		var targets = args.targets;

		// Collapse for small screen (768px)
		if ($(window).width() < 768) {
			var targets = args.targets;
			targets.collapse('hide');
		}
	*/}

	function cookies($args) { return "function cookies(args)"; /*

		var targets = args.targets;
		targets.each(function() {

			var cookie = $(this);

			if (!($.cookie(cookie.data('cookieid')))) {
			
				cookie.removeClass('hidden');
			}			
			cookie.children("button.close").click(function(e){

				e.preventDefault();
			
				// After click on dismiss, Set the cookie
				var cookie = $(this).parent('.cookie');
				$.cookie(cookie.data('cookieid'), "set", { expires: 90, path: "/" });
			});	
		});	
	*/}

	function cookieToggleClass($args) { return "function cookieToggleClass(args)"; /*
	
		var pageSection = args.pageSection, targets = args.targets;		
		targets.each(function() {

			var container = $(this);
			var cookieid = container.data('cookieid');

			// Only pay attention to the value of the cookie when first loading the website
			// Eg: toggle sideinfo will execute "cookieToggleClass" many times, but only at the beginning we must open/keep closed the sideinfo
			// if (popManager.isFirstLoad(pageSection)) {
			
			t.cookieToggleClassInitial(pageSection, container);
			// if (container.data('cookieonready')) {
				
			// 	// Do document ready so that the collapse works for Google Maps (eg: Homepage's Project widget)
			// 	jQuery(document).ready(function($) {

			// 		t.cookieToggleClassInitial(pageSection, container);
			// 	});
			// }
			// else {
			// 	t.cookieToggleClassInitial(pageSection, container);
			// }

			// }

			// Delete cookie when clicking on the corresponding btn
			if (container.data('deletecookiebtn')) {
				var selector = container.data('deletecookiebtn');
				var btn = (selector == 'self' ? container : $(selector));
				btn.click(function(e){
					$.cookie(cookieid, null, { expires: -1, path: "/" });
				});	
			}			
			// Set cookie when clicking on the corresponding btn
			if (container.data('setcookiebtn')) {
				var selector = container.data('setcookiebtn');
				var btn = (selector == 'self' ? container : $(selector));
				btn.click(function(e){
					$.cookie(cookieid, "set", { expires: 180, path: "/" });
				});	
			}			
			// Toggle cookie when clicking on the corresponding btn
			if (container.data('togglecookiebtn')) {
				var selector = container.data('togglecookiebtn');
				var btn = (selector == 'self' ? container : $(selector));
				btn.click(function(e){
					if ($.cookie(cookieid)) {
						$.cookie(cookieid, null, { expires: -1, path: "/" });
					}
					else {
						$.cookie(cookieid, "set", { expires: 180, path: "/" });
					}
				});	
			}		
		});	
	*/}

	function sortable($args) { return "function sortable(args)"; /*

		var pageSection = args.pageSection, block = args.block, targets = args.targets;

		targets.sortable({ cursor: "move" });
	*/}

	function onActionThenClick($args) { return "function onActionThenClick(args)"; /*

		var targets = args.targets;
		targets.each(function() {

			var clickable = $(this);
			var trigger = $(clickable.data('triggertarget'));
			var action = clickable.data('trigger-action') || 'click';

			// Allow to further define the trigger, selecting internal elements (needed for the Categories DelegatorFilter)
			if (clickable.data('triggertarget-internal')) {

				trigger = trigger.find(clickable.data('triggertarget-internal'));
			}
			trigger.on(action, function(e) {

				clickable.trigger('click');
			});
		});
	*/}

	//-------------------------------------------------
	// 'PRIVATE' FUNCTIONS
	//-------------------------------------------------

	function cookieToggleClassInitial($pageSection, $container) { return "function cookieToggleClassInitial(pageSection, container)"; /*

		var cookieid = container.data('cookieid');

		// Values for initial: 'set' or 'notset'. Default 'notset' => It will add the class to the target if the cookie does not exist
		var initial = container.data('initial') || 'notset';
		if ((initial == 'set' && $.cookie(cookieid)) || (initial == 'notset' && !$.cookie(cookieid))) {

			var target = $(container.data('cookietarget'));

			// Support for Bootstrap Collapse: execute JS instead of just adding the class, or it doesn't work
			var collapse = container.data('cookiecollapse');
			if (collapse) {

				jQuery(document).ready(function($) {
					target.collapse(collapse);
				});				
			}
			var classs = container.data('cookieclass');
			if (classs) {

				// If there is no cookie => add class to the target
				target.addClass(classs);
			}
		}
	*/}

	function embedPreviewFromInput($pageSection, $block, $connector) { return "function embedPreviewFromInput(pageSection, block, connector)"; /*


		var input = $(connector.data('input-target'));
		var url = input.val();
		if (url && isUrlValid(url)) {
			
			// Comment Leo 16/08/2016: not using iframe-target anymore, instead using iframe-template, and calculating the last id for that template
			// Comment Leo 16/08/2016: discarded this code, not needed, but kept for the time being
			// var template = connector.data('iframe-template');
			// var iframeid = popJSRuntimeManager.getLastGeneratedId(popManager.getSettingsId(pageSection), popManager.getSettingsId(block), template);
			// var iframe = $('#'+iframeid);

			// // Because the iframe will be regenerated, the id to the iframe will become obsolete,
			// // so update it. Since doing REPLACE_INLINE, the new iframe will be the targetContainer
			var iframe = $(connector.data('iframe-target'));
			var merged = t.embedPreview(pageSection, block, iframe, url);
			connector.data('iframe-target', '#'+merged.targetContainer.attr('id'));
		}
	*/}

	function getURLParamInputValue($block, $input) { return "function getURLParamInputValue(block, input)"; /*

		var val, urlparam = input.data('urlparam');
		if (urlparam) {

			var url = block.data('paramsscope-url');
			val = getParam(urlparam, url);
		}
		return val || '';
	*/}

	function embedPreview($pageSection, $block, $iframe, $url) { return "function embedPreview(pageSection, block, iframe, url)"; /*

		// Set the URL into the preview settings configuration, and re-draw the structure-inner
		var options = {
			operation: M.URLPARAM_OPERATION_REPLACEINLINE,
			extendContext: {
				src: url
			},
			'merge-target': '#'+iframe.attr('id') 
		}

		// Run again the Handlebars template to re-print the image with the new data
		var template = iframe.data('templateid');
		popJSRuntimeManager.setBlockURL(block.data('toplevel-url'));
		var merged = popManager.mergeTargetTemplate(pageSection, block, template, options);
		popManager.runJSMethods(pageSection, block, template, 'full');

		// Set the Block URL to indicate from where the session-ids must be retrieved
		var iframeid = popJSRuntimeManager.getLastGeneratedId(popManager.getSettingsId(pageSection), popManager.getSettingsId(block), template);
		block.data('embed-iframe', '#'+iframeid);

		return merged;
	*/}

	function fillInput($input, $link) { return "function fillInput(input, link)"; /*


		// Make sure the link we got is the original one, and not the intercepted one
		// All properties are stored under the original link, not the interceptor
		link = popManager.getOriginalLink(link);

		var val, attr = input.data('attr');
		if (attr) {

			val = link.data(attr);
		}
		val = val || '';
		
		input.val(val);
	*/}

	function fillURLInput($input, $link) { return "function fillURLInput(input, link)"; /*


		// Make sure the link we got is the original one, and not the intercepted one
		// All properties are stored under the original link, not the interceptor
		link = popManager.getOriginalLink(link);
		
		var url = t.getUrl(link);
		input.val(url);
	*/}

	function getUrl($link, $use_pageurl) { return "function getUrl(link, use_pageurl)"; /*


		// Make sure the link we got is the original one, and not the intercepted one
		// target-url is stored under the original link, not the interceptor
		link = popManager.getOriginalLink(link);

		// If the link already has the 'data-target-url' then use it. Eg: in the SideInfo Sidebar Embed code
		var url = link.data('target-url');
		if (!url) {
			
			// If not, take the url from the block queryUrl. Eg: Discussions share Embed code
			var blockTarget = $(link.data('blocktarget'));
			var pageSection = popManager.getPageSection(blockTarget);
			url = popManager.getBlockFilteringUrl(pageSection, blockTarget, use_pageurl);
		}

		return url;
	*/}

	function execReplaceCode($input, $url) { return "function execReplaceCode(input, url)"; /*

		var placeholder = input.data('code-placeholder');
		var code = placeholder.format(url);

		// Insert the code into the textarea
		input.val(code);
	*/}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
if (PoP_Frontend_ServerUtils::use_serverside_rendering()) {
	$pop_core_serverside_functions = new PoP_Core_ServerSide_Functions();
	$popJSLibraryManager = PoP_ServerSide_Libraries_Factory::get_jslibrary_instance();
	$popJSLibraryManager->register($pop_core_serverside_functions, array('expandJSKeys', 'showmore', 'hideEmpty', 'imageResponsive', 'printWindow', 'copyHeader', 'fillURLParamInput', 'fillAddonInput', 'fillModalInput', 'fillAddonURLInput', 'fillModalURLInput', 'switchTargetClass', 'doNothing', 'fetchMore', 'fetchMoreDisable', 'saveLastClicked', 'retrySendRequest', 'highlight', 'replaceCode', 'modalReloadEmbedPreview', 'reloadEmbedPreview'/*, 'embedCode'*/, 'socialmedia', 'mediaplayer', 'reset', 'browserUrl', 'smallScreenHideCollapse', 'cookies', 'cookieToggleClass', 'sortable', 'onActionThenClick', 'beep'));
}