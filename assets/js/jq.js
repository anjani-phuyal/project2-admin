$(document).ready(function(){

	//ajax login
	$("#submit-button").click(function () {
 		var user = $("#user").val();
		var pass = $("#pass").val();
		
		if(user==''){
			$("#msg").text('User Required!');
			return false;
		}
		if(pass==''){
			$("#msg").text('Password Required!');
			return false;
		}
		
		$.ajax({
			
			url:'login_entry',
			type:'POST',
			data: {
				name: user,
				pass: pass 
			},
			beforeSend: function(){
				$("#load").html('<img src="http://admin.nepalinn.com/assets/images/loading.gif" height="20px" width="20px">');
			},
			success: function(response){
				$("#load").hide('');
				$("#msg").html('');
				if(response==='successful'){
					window.location.replace("home");
				}else{
					$("#msg").text(response);
				}
			},
		});
		return false;
  	});


	//to check if the user tries to click the checkout date before checkin date
	$("#datepicker-to").change(function(){
		var from = $("#datepicker-from").val();
		var to = $("#datepicker-to").val();
		if(to==''){
	   		$("#datepicker-to").val('');
		}else if(to<from ){
			var date2 = $('#datepicker-from').datepicker('getDate');
            date2.setDate(date2.getDate()+1);
            $('#datepicker-to').datepicker('setDate', date2);
 		}else if(to==from){
  			var date2 = $('#datepicker-from').datepicker('getDate');
            date2.setDate(date2.getDate()+1);
            $('#datepicker-to').datepicker('setDate', date2);
 		}else{
 			//nothing
 		}
 		return false;
	});


	$("#datepicker-from").change(function(){
		var from = $("#datepicker-from").val();
 		var to = $("#datepicker-to").val();
 		if(to!=''){
  			if(to<from){
  				var date2 = $('#datepicker-from').datepicker('getDate');
            	date2.setDate(date2.getDate()+1);
            	$('#datepicker-to').datepicker('setDate', date2);
            	// $('#pick1').datepicker({ 
            	// 	dateFormat: "yy-mm-dd",
            	// 	minDate: date2 
            	// });
  			}
  			if(to==from){
  				var date2 = $('#datepicker-from').datepicker('getDate');
            	date2.setDate(date2.getDate()+1);
            	$('#datepicker-to').datepicker('setDate', date2);
  			}
		}
		return false
	});


	
	//to disable date pick before today
  	$('#datepicker-from').datepicker({ minDate: 0 });
  	//check out date must be atleast a day after the checkin date
  	$('#datepicker-to').datepicker({ minDate: 1 });
});


//for image preview
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$("#img_prev").show();
			$('#img_prev').attr('src', e.target.result).width(150).height(150);

		};

		reader.readAsDataURL(input.files[0]);
	}
}

function validate(){
	var newpass = $("#new").val();
	var repass = $("#renew").val();
	if(newpass.length<5){
		$("#validate-msg").html('Password must be of minimum length 5 (New Password)');
		return false;
	}

	if(repass.length<5){
		$("#validate-msg").html('Password must be of minimum length 5 (Confirm Password)');
		return false;
	}

	if(newpass!=repass){
		$("#validate-msg").html('Password Not Match');
		return false;
	}
}


//ajax add room
function add_room(i){
	var pre = $("#previous").val();
	
	//hiding the previous template error message
	if(pre==''){
		//do nothing
	}else if(pre==i){
		//do nothing
	}else{
		$("#error-msg"+pre).html('');
	}
	var template_id = $("#template"+i).val();
	var room_no = $("#room_no"+i).val();
	var floor_no = $("#floor_no").val();
	
	if(room_no==''){
		$("#error-msg"+i).html('Room No. Field Empty');
		$("#previous").val(i);
		return false;
	}

	$.ajax({
		url: 'add_room',
		type: 'post',
		dataType: 'json',
		data: {
			template_id: template_id,
			room_no: room_no,
			floor_no: floor_no
		},
		success: function(response){
			
			if(response.msg=='Room already added.'){
				$("#error-msg"+i).html(response.msg);
			}else{
				$("#display_room"+i).html('');

				var size = response.length;
				for(var x=0;x<size;x++){
					$("#display_room"+i).append('<div class="col-md-3 col-xs-3 col-sm-2 room-box">'+ 
												'<div class="room-no available">'+response[x].room_no+'</div>'+
											'</div>');
				}
				$("#room_no"+i).val('');
				$("#previous").val(i);
			}
			
		}
	});
	return false;
}


//ajax availabe rooms search
function search_room(){
	var template_id = $("#template").val();
	var from = $("#datepicker-from").val();
	var to = $("#datepicker-to").val();
	
	if(from==''){
		$("#date-error-message").html('From Date Field Empty.');
		return false;
	}
	if(to==''){
		$("#date-error-message").html('To Date Field Empty.');
		return false;
	}
	$.ajax({
		url: 'available_room',
		type: 'post',
		dataType: 'json',
		data: {
			template_id: template_id,
			from: from,
			to: to
		},
		success: function(response){
			$("#date-error-message").html('');
			var size = response.length;
			$("#available-rooms-show").html('');
			if(size==0){
				$("#available-rooms-show").html('No Rooms available.');
			}else{
				for(var i=0; i<size;i++){
					$("#available-rooms-show").append('<div class="col-md-2 col-xs-3 col-sm-2 room-box" id="change-color'+i+'" onclick="return select_room('+i+');" rel="tooltip" title="normal">'+
															'<div class="room-no available ">'+response[i].room_no+
															'<input type="hidden" id="room_id'+i+'" value="'+response[i].room_id+'">'+
															'<p id="selected'+i+'" style="display:none;">selected</p>'+
															'</div>'+
													   '</div>');
				}
			}

			$("#check_show").click();
		}
	});
	return false();
}


//change color of selected room
function select_room(i){
	
	var clr = $("#change-color"+i+" div").css("background-color");
	
	var rooms_array = new Array();
	
	var room_id = $("#room_id").val();
	
	
	var eachRoom = $("#room_id"+i).val();
	if(clr!='rgb(237, 111, 88)'){
		$("#change-color"+i+" div").css( {"background-color": "#ed6f58" , "padding": "11px"} );
		$('#selected'+i).css({"display": "none"});
				
		rooms_array.push(room_id);
				
		var rooms = new Array();
		rooms = rooms_array.toString().split(",");
		
		for(var i=0; i<rooms.length;i++){
			
			if(rooms[i]==eachRoom){
				roomIndex = Number(i);
			}
		}
				
		rooms.splice(roomIndex, 1);
		
		$("#room_id").val(rooms);

		

	}else{
		$("#change-color"+i+" div").css( {"background-color": "#1A71AC" , "padding": "3px"} );
		$('#selected'+i).css({"display": "block"});
		
		if(room_id==""){

		}else{
			
			rooms_array.push(room_id);
			
		}
		
		rooms_array.push(eachRoom);
		
		
		$("#room_id").val(rooms_array);
		
		
	}
	return false;
}
