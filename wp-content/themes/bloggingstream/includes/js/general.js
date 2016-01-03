jQuery(document).ready(function() {

jQuery("#popular ul li:last").css("border-bottom","0").css("margin-bottom","0");
jQuery("#recent_comments ul li:last").css("border-bottom","0").css("margin-bottom","0");
jQuery("#comments ol li:last").css("border-bottom","0");
jQuery("#related ul li:last a").css("border-bottom","0");

var searchbox = jQuery("#search input[name='s']");
	
if(searchbox.val() == ""){
	searchbox.val("Enter your keywords...");
};

	searchbox.focus(function() {
		if(jQuery(this).val() == "Enter your keywords..."){
			jQuery(this).val("");
		}
		});

	searchbox.blur(function() {
		if(jQuery(this).val() == ""){
			jQuery(this).val("Enter your keywords...");
		}
		});
		
});