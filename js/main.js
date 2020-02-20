$(document).ready(function () {
	//default values and globalvariables
	var room_id, login, password, submit_mode, reservationID;

	check_session(0);
	fill_reservations();
	$('#walkin-module-container').show().siblings().hide();

	$('.navbar-nav>li>a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});

	$('#navbarNav>a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});

	$("#form_send").click(function() { //When clicking "Sign in" in the login form.
		user_login($("#login_username").val(), $("#login_password").val(), 6, 0);
	});

	$('#navbar-sign-out').on('click', function(){
		check_logout_ui();
		clear_all(1);
		$.post("src/logout.php");
	});

	$('#navbar-dashboard-btn').on('click', function(event) {
		$('#dashboard-header').text("Edit reservations");
		$('#walkin-module-container').show().siblings().hide();
		check_session(0);
	});

	$('#reservation-list-content').on('click', '.del-reservation', function(){
		reservationID = $(this).parent().siblings(":first").text();
		reservation_delete(reservationID);
	});

	$('#reservation-list-content').on('click', '.edit-reservation', function(){
		reservationID = $(this).parent().siblings(":first").text();
		find_room_by_id(reservationID,1);
	});

	$('#nav-walk-in').on('click', function(event) {
		check_session(0);
		fill_reservations();
		$('#dashboard-header').text("Walk-in Management");
		$('#walkin-module-container').show().siblings().hide();
	});

	$('#nav-edit-room').on('click', function(event) {
		check_session(0);
		$('#dashboard-header').text("Edit rooms.");
		$('#edit-module-container').show().siblings().hide();
		$("#edit-roomlist-container").show().siblings().hide();
		fill_room_list();
	});

	$('#dashboard-billing').on('click', function(event) {
		check_session(0);
		fill_billing_list();
		$("#billing-container").show().siblings().hide();
	});

	$('#select-room-btn').on('click', function(event) {
		check_session(0);
		$("#edit-roomlist-container").show().siblings().hide();
	});

	$('#edit-roomlist-content').on('click', '.btn', function(event) {
		check_session(0);
		var roomID = $(this).parent().siblings(":first").text();
		$("#edit-room-form-container").show().siblings().hide();
		find_room_by_id(roomID,1);
	});

	$('#room-update-btn').on('click', function(event) {
		check_session(0);
		update_room($("#dashboard-room-type").val(), $("#dashboard-num-people").val(), $("#dashboard-room-price").val(), $("#dashboard-room-desc").val(), $("#dashboard-room-num").val(), $("#dashboard-room-status").val(), $("#dashboard-room-id").val());
		$("#nav-edit-room").click();
	});

	function reservation_delete(resID){
		var del = confirm("Are you sure you want to cancel this reservation?");
		if (del==true) {
			$.post("src/reservation_delete.php",{
				res_id: resID
			},
			function(data){
				if (data!=0) {
					alert("The reservation was canceled");
					$('#navbar-dashboard-btn').click();
				}
				else {
					alert("There was an issue with your request, please try again");
					check_session(0);
				}
			});
		}
	}

	//fill reservation tables
	function fill_reservations(){
		$.post("src/reservation_list.php",
		function(data){
			if (data!=0) {
				$('#reservation-list-content').empty();
				var obj = jQuery.parseJSON(data);
				$.each(obj, function(key, value) {
					var status;
					if (value.status==1) status="Approved";
					else status = "Waiting";
					$('#reservation-list-content').append(`
					<tr>
						<td id="">`+ value.ID + `</td>
						<td id="reservation-room-name-`+key+`"></td>
						<td id="reservation-guest-name-`+key+`"></td>
						<td id="reservation-num-people-`+key+`"></td>
						<td id="reservation-price-`+key+`"></td>
						<td>`+ value.date_in + `</td>
						<td>`+ value.date_out + `</td>
						<td>`+ status + `</td>
						<td><button class="edit-reservation btn btn-lg btn-primary btn-block" type="button">Edit</button></td>
						<td><button class="del-reservation btn btn-lg btn-danger btn-block" type="button">Cancel</button></td>
					</tr>`);
					find_room_by_id(value.room_id, 2, key);
					find_user_by_id(value.guest_id, 1, key);
				});
			}
		});
	}//fill reservation tables end

	function fill_billing_list(){
		$.post("src/billing_list.php",
		function(data){
			if (data!=0) {
				$('#billing-table-container').empty();
				var obj = jQuery.parseJSON(data);
				$.each(obj, function(key, value) {
					$('#billing-table-container').append(`
					<tr>
						<td id="">`+ value.ID + `</td>
						<td id="">`+ value.name_last + ` ` + value.name_first + `</td>
						<td id="">`+ value.date_in + `</td>
						<td id="">`+ value.date_out + `</td>
						<td id="">`+ value.Total + `</td>
					</tr>`);
				});
			}
		});
	}//fill reservation tables end

	function fill_room_list(){
		$.post("src/room_list.php",
		function(data){
			if (data!=0) {
				$('#edit-roomlist-content').empty();
				var obj = jQuery.parseJSON(data);
				$.each(obj, function(key, value) {
					var status
					if (value.status==0) status="Available"
					else status = "Unavailable"
					$('#edit-roomlist-content').append(`
					<tr>
						<td id="">`+ value.ID + `</td>
						<td id="">`+ value.room_name + ` ` + value.room_accommodation_num + `</td>
						<td id="">`+ value.room_num + `</td>
						<td id="">`+ value.price + `</td>
						<td id="">`+ value.room_desc + `</td>
						<td id="">`+ status + `</td>
						<td><button class="edit-roomlist btn btn-lg btn-primary" type="button">Edit</button></td>
					</tr>`);
				});
			}
		});
	}

	function find_room_by_id(roomid, action, key){
		$.post("src/find_room_by_id.php", //create a POST request
		{
			room_id: roomid
		},
		function(data){
			try {
				var obj = jQuery.parseJSON(data);
				switch (action) {
					case 1: //filling confirmation page

						if (obj.status==0) $("#dashboard-room-status").val("0");
						else  $("#dashboard-room-status").val("1");
 						$('#dashboard-room-id').val(obj.ID);
						$('#dashboard-room-type').val(obj.room_name);
						$('#dashboard-num-people').val(obj.room_accommodation_num);
						$('#dashboard-room-price').val(obj.price);
						$('#dashboard-room-desc').val(obj.room_desc);
						$("#dashboard-room-num").val(obj.room_num);
						break;
					case 2://Filling dashboard reservations
						$('#reservation-room-name-'+key).text(obj.room_name + " #" + obj.room_accommodation_num);
						$('#reservation-num-people-'+key).text(obj.room_num);
						$('#reservation-price-'+key).text(obj.price);
						break;
				}
			}
			catch (err) {
				alert("There was an issue with your request, please check if the information is valid");
			}
		});
	};

	function update_room(name, accomodations, price, desc, roomnum, status, id){
		$.post("src/update_room.php",{
			name: name,
			accomodations: accomodations,
			price: price,
			desc: desc,
			roomnum: roomnum,
			status: status,
			id: id
		}, function(data){
			if (data==1) {
				alert("Room was updated successfuly");
			}
			else {
				alert("We couldn't update the room, please try again");
			}
		});
	}

	function update_info(userID, name, lastname, landline, mobile){
		$.post("src/update_user_info.php",{
			user_id: userID,
			first_name: name,
			last_name: lastname,
			landline: landline,
			mobile: mobile
		}, function(data){
			if (data!=0) {
				alert("Your info has been updated successfuly");

			}
			else {
				alert("There was an issue with your request, please try again");
			}
		});
	}

	function update_credentials(id, user, email, password){
		$.post("src/update_user_credentials.php",{
			user_id: id,
			email: email,
			username: user,
			password: password
			}, function(data){
				switch (data) {
					case 1:
						alert("Your info has been updated successfuly");
						user_login(email, password, -1, 0);
						break;
					case "old_missmatch":
						alert ("The password you typed doesn't match");
						break;
					default:
						alert("There was an issue with your request, please try again");
				}
			});
	}

	function update_password(id, currpass, newpass, repass){
		$.post("src/update_user_password.php",{
			user_id: id,
			currentpass: currpass,
			newpass: newpass,
			repassword: repass
			}, function(data){
				switch (data) {
					case 1:
						alert("Your password has been updated successfuly");
						check_session(0);
						break;
					case "old_missmatch":
						alert ("Your current password didn't match");
					case "new_missmatch":
						alert ("Failed to confirm the new password, type it again");
						break;
					default:
						alert("There was an issue with your request, please try again");
				}
			});
	}

	//user login
	function user_login(user, pass, action){
		$.post("src/login.php", //create a POST request
		{
			login_username: user, //sending the variable with the username through POST
			login_password: pass //sending the variable with the password through POST
		},
		function(data){ //If the POST request was successful, this function is executed.
			if (data == "username") { //checking the data, 0= failed login
				alert("ID not found");
				return;
			}
			else if (data=="password"){
				alert("The password didn't match");
				return;
				}
			else {
				var obj = jQuery.parseJSON(data);
				switch (action) {
					case 1: //Creating account and login
						check_session(action);
						break;
					default: //normal login
						check_session(0);
						login = obj.ID;
						password = obj.staff_pass;
						fill_confirm_view(obj);
						fill_dashboard_view(obj);
				}
			}
		});
	}//user login end

	function find_user_by_id(userID, action, key){
		$.post("src/find_user_by_id.php",{
				user_id: userID
			}, function(data){
				if (data!=0) {
					var obj=jQuery.parseJSON(data);
					switch (action) {
						case 1:
							$("#reservation-guest-name-"+key).text(obj.name_first + " " + obj.name_last);
							break;
						case 2:
							update_info(obj.ID, $("#dashboard-firstname").val(), $("#dashboard-lastname").val(), $("#dashboard-phone").val(), $("#dashboard-mobile").val());
							break;
						case 3:
							update_credentials(obj.ID, $("#dashboard-credentials-username").val(), $("#dashboard-credentials-email").val(), $("#dashboard-credentials-password").val());
						case 4:
							update_password(obj.ID, $("#dashboard-password-current").val(), $("#dashboard-password-new").val(), $("#dashboard-password-renew").val());
					}
				}
				else {
					alert("There was an issue trying to retrieve your data");
				}
			});
		}
	//check session
	function check_session(action){
		$.post("src/check_session.php", function(data){
			if(data!=0){
				var obj = jQuery.parseJSON(data);
				check_login_ui(obj);
			}
			else {
				check_logout_ui();
			}
		});
	}//check session end

	//login ui check
	function check_login_ui(myCallback){
		$('#navbar-sign-out').show();
		$('#navbar-dashboard-btn').show();
		$('#member-area').show();
		$('#login-form').hide();
		$('#navbar-sign-in').hide();
		$("#navbar-sign-in-label").text("Welcome, " + myCallback.staff_name + " " + myCallback.staff_lastname);
	}//login ui check end

	//logout ui check
	function check_logout_ui(){
		$('#navbar-sign-out').hide();
		$('#navbar-dashboard-btn').hide();
		$('#member-area').hide();
		$('#login-form').show();
		$('#navbar-sign-in').show();
		$('#signup-container').show();
		$('#signup-or').show();
		$('#navbar-sign-in-label').text('This section is staff only, please login first');
	}//logout ui check end

//////////////////////

	//fill confirmation data
	function fill_confirm_view(myCallback){
		$("#confirm-firstname").val(myCallback.name_first);
		$("#confirm-lastname").val(myCallback.name_last);
		$("#confirm-email").val(myCallback.email);
		$("#confirm-NoMobile").val(myCallback.no_mobile);
		$("#confirm-NoLandline").val(myCallback.no_landline);
		$("#confirm-username").val(myCallback.username);
	}//fill confirmation data end

	function fill_dashboard_view(myCallback){
		$("#dashboard-firstname").val(myCallback.name_first);
		$("#dashboard-lastname").val(myCallback.name_last);
		$("#dashboard-phone").val(myCallback.no_landline);
		$("#dashboard-mobile").val(myCallback.no_mobile);
		$("#dashboard-credentials-username").val(myCallback.username);
		$("#dashboard-credentials-email").val(myCallback.email);
	}

	//signup confirm
	function signup_confirm(action){
		//creating new account
		$.post("src/signup.php",{
			signup_firstname: $("#signup-firstname").val(),
			signup_lastname:  $("#signup-lastname").val(),
			signup_email: login,
			signup_username: $("#signup-username").val(),
			signup_password: password,
			signup_mobile: $("#signup-NoMobile").val(),
			signup_landline: $("#signup-NoLandline").val()
		},
		function(){
			switch (action) {
				case 1:
					user_login(login, password, -1, action);
					break;
			}
		});
	}//sign up confirm end

	//creating reservation
	function reservation_confirm(guestid, roomid, action, reservationID){
		switch (action) {
			case 1:
				$.post("src/reservation_confirm.php",
				{
					guest_id: guestid,
					room_id: roomid,
					date_in: $("#room_checkindate").val(),
					date_out: $("#room_checkoutdate").val()
				},
				function(bookdata){
					if (bookdata==1) {
						alert("Reservation succeed");
						clear_all();
						$('#main-content').carousel(6);
						$("#main-content").carousel({interval: 0});
						$('#main-content').carousel('pause');
					}
					else {
						alert("We couldn't process your reservation request, please try again.");
						$('#main-content').carousel(0);
						$("#main-content").carousel({interval: 0});
						$('#main-content').carousel('pause');
					}
				});
				break;
			case 2:
				$.post("src/reservation_update.php",
				{
					reservation_id: reservationID,
					room_id: roomid,
					date_in: $("#room_checkindate").val(),
					date_out: $("#room_checkoutdate").val()
				},
				function(bookdata){
					if (bookdata==1) {
						alert("Reservation update succeed");
						clear_all();
						$('#main-content').carousel(6);
						$("#main-content").carousel({interval: 0});
						$('#main-content').carousel('pause');
					}
					else {
						alert("We couldn't process your update request, please try again.");
						$('#main-content').carousel(0);
						$("#main-content").carousel({interval: 0});
						$('#main-content').carousel('pause');
					}
				});
				break;
		}
		submit_mode = 0;
		check_session(submit_mode);
	}//creating reservation end

	function clear_all(num){
		$('#rooms-container').empty();
		$("#confirm-firstname").empty();
		$("#confirm-lastname").empty();
		$("#confirm-email").empty();
		$("#confirm-NoMobile").empty();
		$("#confirm-NoLandline").empty();
		$("#confirm-username").empty();

		$('#confirm-card-title').empty();
		$('#confirm-card-description').empty();
		$('#confirm-card-price').empty();
		$('#confirm-card-numpeople').empty();

		$("#signup-firstname").empty(),
		$("#signup-lastname").empty(),
		$("#signup-email").empty(),
		$("#signup-username").empty(),
		$("#signup-password").empty(),
		$("#signup-repassword").empty(),
		$("#signup-NoMobile").empty(),
		$("#signup-NoLandline").empty()
		if (num==1) {
			$("#reservation-list-content").empty()
			$("#dashboard-firstname").empty()
			$("#dashboard-lastname").empty()
			$("#dashboard-phone").empty()
			$("#dashboard-mobile").empty()
			$("#dashboard-credentials-username").empty()
			$("#dashboard-credentials-email").empty()
		}
	}
});//Document.ready end

//var d = new Date();
//var month = d.getMonth()+1;
//var day = d.getDate();

//var output = d.getFullYear() + '/' +
	//((''+month).length<2 ? '0' : '') + month + '/' +
	//((''+day).length<2 ? '0' : '') + day;


//$('#room_checkindate').val("02-01-2020");
