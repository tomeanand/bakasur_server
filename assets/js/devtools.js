$( document ).ready(function() {
	$("#callButton").bind("click", function(event)	{

		var selectedMethod =  $("#fname option:selected").val();
		// array of values, send this to server and format it as per the function requirement
		var parameters = {
			param1: $("#param1").val(),
			param2: $("#param2").val(),
			param3: $("#param3").val(),
			param4: $("#param5").val(),
			param5: $("#param5").val(),
			param6: $("#param6").val()
		}

		var serverURI = "http://localhost/restaurant/index.php/home/"+selectedMethod;
		console.log(parameters)
		// CHECK THE URL, I HAVE'NT RUN A UNIT TEST


		$.ajax({
			url: serverURI,
			type: "POST",
			data: parameters,
			success:function(responseText){
				$("#serverResponseBox").val(responseText)
			}
		
		});
	});

});

	