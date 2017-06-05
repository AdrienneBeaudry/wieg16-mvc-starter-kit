
// Everything on the page, including pictures. So this is useful if we want to 
//$("body").on("load", function() {
//	console.log("Body loaded");
//});


//function myFunction(e) {
	//	e.preventDefault();
	//	$("h3").fadeOut();
	//}


//Allting annat typ
$(document).ready(function(){
	var fields = $(this).find("input:text");
		var checkField = function(field {
			var fieldValue = $.trim(field);
			return (fieldValue !== "");
		});

		fields.on("keyup", function(e) {
			if(checkField(this)) {
				$(this).removeClass("error");
				$(this).addClass("done");
			}
			else {
				$(this).addClass("error");
			}
		});

		fields.on("focus", function(e)){
			console.log("FOCUS");
		}

		fields.on("blur", function(e)) {
			console.log("BLUR");
			if(!checkField(this)) {
				$(this).addClass("error");
			}
		}


	$("#create-fabric").on("submit", function(e) {
		


		//Nollställ formuläret
		$("#error-message").hide();
		fields.removeClass("error");


		

		fields.each(function () {
			var fieldValue = $.trim($(this).val());
			if (fieldValue === "") {
				valid = false;
				$(this).addClass("error");
			}
		});
		
		if(!valid) {
			e.preventDefault();
			$("#error-message").show();
		}
	});

});