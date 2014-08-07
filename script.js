$(function() {
  var cmd;
  $( "#tabs" ).tabs();  
  $("input:radio[name='command']").click(function(){
  	if($("#resetPassword").is(":checked")){
      $("#enter_password").css("display","block");
      $("#password").val("");
    }else{
      $("#enter_password").css("display","none");
    }
    cmd = $(this).val();
  });


  $("#executeCommand").on('click tap',function() {          
    var target = 'mqtt/352944058787923';         		
    var selectedIndex = $("#tabs div[aria-hidden='false']").index();
    var message = {};
    console.log($("input:radio[name='command']").val());
    if(selectedIndex === 1){
      message.command = cmd;
      if(cmd === 'reset_password' ){
         message.password = $("#password").val();
      }
    }else{

    }

    console.log(message);
    $('.sent').hide();
    $('.loading').slideToggle('fast');

    $.ajax({
	    url: 'send_mqtt.php',
			type: 'POST',
			data: {'target': target, 'message': JSON.stringify(message)},
			timeout: 20000,
			error: function(){				      
        $('.loading').slideToggle('fast');
	      alert('Failed to communicate to the server. Try again!')                                     
			},
			success: function(text){
        console.log(text);
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