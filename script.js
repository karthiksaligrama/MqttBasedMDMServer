$(function() {
  $( "#tabs" ).tabs();  
  $("input[name='command']").click(function(){
  	if($("#resetPassword").is(":checked")){
      $("#enter_password").css("display","block");
      $("#password").val("");
    }else{
      $("#enter_password").css("display","none");
    }
  });
  $("#button").click(function() {          
    var target = 'mqtt/' + $('#deviceId').val();         		
    var message = $('#messageBody').val();         		
    $('.sent').hide();
    $('.loading').slideToggle('fast');
    $.ajax({
	    url: 'send_mqtt.php',
			type: 'POST',
			data: {'target': target, 'message': message},
			dataType: 'text',
			timeout: 20000,
			error: function(){				      
        $('.loading').slideToggle('fast');
	      alert('Failed to communicate to the server. Try again!')                                     
			},
			success: function(text){
        $('.loading').slideToggle('fast');
			  if (text == '') {
			    alert('Failed to send the message. Try again!')                                     
			  } else {
          $('.sent').slideToggle('fast');
        }
			}
    });          
	});  
})