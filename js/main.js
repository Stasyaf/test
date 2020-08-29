$(function(){
 	$('.show-order-form').on('click', function() {
 		$('.form-layout').css('display', 'flex');
 	});

 	$('.close-button').on('click', function(){
 		$('.form-layout').css('display', 'none');
 	});


 	$('.order-form button').on('click', function(){
 		let formData = $('.order-form').serializeArray();//чтоб не перезагружалась стр
 		let request = {}
 		for(i in formData){
			request[formData[i].name] = formData[i].value;
 		}

 		$.post('/api/api.php', request, function(response){
 			if(response == "1") {
 				$('.form-layout').css('display', 'none');
 			}
 		});

 		//return false;
 	});
 });

