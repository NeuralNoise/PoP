(function($){
popUserRole = {
	
	//-------------------------------------------------
	// PUBLIC functions
	//-------------------------------------------------

	filterByCommunity : function(args) {

		var t = this;
		var domain = args.domain, pageSection = args.pageSection, block = args.block, targets = args.targets;

		targets.change(function (e) {

			var checkbox = $(this);
			var user_id = checkbox.val();
			var communityTypeahead = $(checkbox.data('target'));

			if (checkbox.is(':checked')) {
				var user = checkbox.data('user-datum');
				popTypeahead.triggerSelect(domain, pageSection, block, communityTypeahead, user);
			}
			else {
				popTypeahead.removeSelected(communityTypeahead, user_id);
			}
		});
	},
};
})(jQuery);

//-------------------------------------------------
// Initialize
//-------------------------------------------------
popJSLibraryManager.register(popUserRole, ['filterByCommunity']);