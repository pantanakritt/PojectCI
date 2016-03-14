$(document).ready(function(){
		
		var ajax_common = function(data,url,type,obj){
			$.ajax({
				url : url,
				data : data,
				type : type,
				success : function(response){
					$(obj).html(response);
				}
			});
		};

		//----------------------------------- Search class ----------------------

		$(document).on("click", ".search_by_day", function(events){
			event.preventDefault();
			var dayID = $(this).children(".DayID").val();
			function_search_class(dayID);
		});
		
		$(".search_from_room").click(function(event){
			event.preventDefault();
			var roomID = $(this).children(".roomID").val();
			function_search_class("from_room",roomID);
		});

		$(".search_from_teacher").click(function(event){
			event.preventDefault();
			var teacherID = $(this).children(".teacherID").val();
			function_search_class("from_teacher",teacherID);
		});

		$(".search_from_group").click(function(event){
			event.preventDefault();
			var groupID = $(this).children(".groupID").val();
			function_search_class("from_group",groupID);
		});

		var function_search_class = function(data_send){
			var data = {"data" : data_send};
			ajax_common(data,"./index.php/Welcome/select_day","POST",$(".updates"));
		};
		
		//--------------------------- Log Out -------------------------------
		//$(".logout").click(function(event){
		//	event.preventDefault();
		//	function_logout("check_logout");
			
		//});

		//var function_logout = function(type){
		//	var data = {"type_view" : type};
		//	ajax_common(data,"function/AjaxUpdate.php","POST",$(".updates"));
		//};

		//------------------------ Status User ------------------------------

		$(".status_user").click(function(event){
			event.preventDefault();
			function_status_user("status_users");
			
		});

		var function_status_user = function(type){
			var data = {"type_view" : type};
			ajax_common(data,"./index.php/admin/stat_user","POST",$(".updates"));
		};

		//----------------------Status ID ----------------------------------
		$(document).on("click", ".activateID", function(events){
			events.preventDefault();
			var stsid = $(this).children(".statid").val();
		    var stnid = $(this).children(".statname").val();

			function_status_ID("ActivateID",stsid,stnid);
		});
		/*
		$(".activateID").on("click",function(event){
			event.preventDefault();
			
		    var stsid = $(this).children(".statid").val();
		    var stnid = $(this).children(".statname").val();

			function_status_ID("ActivateID",stsid,stnid);
			
		});*/

		var function_status_ID = function(type,stsid,stnid){
			var data = {"type_view" : type,"userSTSid" : stnid,	"StatID" : stsid};
			ajax_common(data,"./index.php/admin/ch_statid","POST",$(".updates"));
		};

		//------------------ Login -----------------------------------------
		$(document).on("click",".loginuser", function(event){
			event.preventDefault();
			var user = $('#userlogin').val();
		    var password = $('#passwordlogin').val();
			function_login("check_login",user,password);
			
		});

		var function_login = function(type,user,password){
			var data = {"user" : user,"password" : password,"type_view" : type};
			ajax_common(data,"../CI/index.php/welcome/check_login","POST",$(".updatelogin"));
		};
		//---------------------- add user --------------------------------
		$(document).on("click",".add_user", function(event){
		
			event.preventDefault();
			function_add_user("add_user");
			
		});
		//---------------------- user button -------------------
		$(document).on("click",".add_userbtn", function(event){
			event.preventDefault();
			var form_data1 = $('.add_userID').val()+","+$('.add_userPWD').val()+","+$('.add_userFSTN').val()+","+$('.add_userLSTN').val()+","+$("input[name='optionsRadios']:checked").val();
			var form_data2 = $('.adduser_email').val()+","+$('.adduser_phone').val()+","+$("input[name='permiss1']:checked").val()+","+$("input[name='active1']:checked").val();

			var form_send = form_data1+","+form_data2;

			//alert(form_send);
			function_add_userform("form_adduser",form_send);
		});
		// ------------------ Confirm Psw ----------------------
		
		$(document).on("change",".confirmPWD ", function(event){
			var pwd1 = $('.add_userPWD').val();
			var pwd2 = $('.confirmPWD').val();

			if (pwd1==pwd2){
					$(this).parents('.control-group').addClass("error");
					$(this).parents('.control-group').addClass("success");
					$('#pwd_error').html("");

			}
			else {
					$(this).parents('.control-group').removeClass("success");
					$(this).parents('.control-group').addClass("error");
					$('#pwd_error').html("รหัสผ่านไม่ตรงกันกรุณาตรวจสอบ");
			}
		});
		// ----------------- Chk add user --------------------------
		
		$(document).on("change",".add_userID", function(event){
			var usr1 = $('.add_userID').val();
			function_chk_usr("chk_usr",usr1);
		});


		var function_add_userform = function(type,data_form){
			var data = {"add_user" : type, "data_user" : data_form};
			ajax_common(data,"./index.php/admin/adduser_btn","POST",$(".updates"));
		};

		var function_add_user = function(type){
			var data = {"add_user" : type};
			ajax_common(data,"./index.php/admin/adduser","POST",$(".updates"));
		};
		// --------------------- chk user fill --------------------------
		$(document).on("change",".add_userID", function(event){
		
			var usr1 = $('.add_userID').val();
			function_chk_usr("chk_usr",usr1);
		});

		var function_chk_usr = function(type,usr1){
			var data = {"type_view" : type,	"usrn" : usr1};
			ajax_common(data,"./index.php/odinary/chk_userfill","POST",$("#user_error"));
		};
		// --------------------- script click link -----------------------
		$(document).on("click",".search_ulink", function(event){
		
			event.preventDefault();
			function_search_ulink("search_ulink");
		});

		var function_search_ulink = function(type){

			var data = {"type_view" : type};
			ajax_common(data,"./index.php/admin/searchuser","POST",$(".updates"));
		};

		// ---------------------- click search button ---------------------
		$(document).on("click",".s_btn", function(event){
			event.preventDefault();
			
			var s_data = $('#s_user').val()+","+$('#s_name').val()+","+$('#s_lname').val()+","+$('#s_email').val()+","+$('#s_tel').val();
			function_search_user1("search_user1",s_data)
		});

		var function_search_user1 = function(type,s_data1){
			var data = {"type_view" : type,	"search_data" : s_data1};
			ajax_common(data,"./index.php/admin/searchuser","POST",$(".updates"));
		};

		//------------------------------- User Edit ---------------------------------

		$(document).on("click",".edit_userbtn" ,function(event){
			event.preventDefault();
			var edit_user = $(this).children(".statname").val();
			function_user_edit("edit_user",edit_user);
		});

		$(document).on("click",".edit_profile" ,function(event){
			event.preventDefault();
			var edit_user = $(this).children(".statname").val();
			function_user_edit("edit_user",edit_user,"edit_profile");
		});

		var function_user_edit = function(type,edit_id,hchk){
			var data = {"type_view" : type,	"edit_id" : edit_id, "header_chk" : hchk};
			ajax_common(data,"./index.php/odinary/edit_profile","POST",$(".updates"));
		};

		//----------------------- del user ---------------------------------------
		$(document).on("click",".del_userbtn" ,function(event){
			event.preventDefault();
			var user = $(this).children(".statname").val();
			if(confirm("ยืนยันการลบผู้ใช้งาน "+user)) function_deleteusr(user);
			
		});

		var function_deleteusr = function(usr){
			var data = {"usr_del" : usr };
			ajax_common(data,"./index.php/admin/del_user","POST",$(".updates"));
		};


		//------------------------------ Update User ---------------------------------
		$(document).on("click",".update_userbtn" ,function(event){
			event.preventDefault();

			var usrupdate_data = $('.add_userID').val()+","+$('.add_userPWD').val()+","+$('.add_userFSTN').val()+","+$('.add_userLSTN').val()+","+$("input[name='optionsRadios']:checked").val();
			var usrupdate_data2 = $('.adduser_email').val()+","+$('.adduser_phone').val()+","+$("input[name='permiss1']:checked").val()+","+$("input[name='active1']:checked").val();

			var usrdata_send = usrupdate_data+","+usrupdate_data2;

			//alert(form_send);
			function_update_user("update_user",usrdata_send);
		});

		var function_update_user = function(type,user_data){
			var data = {"type_view" : type,	"usr_data" : user_data};
			ajax_common(data,"./index.php/odinary/update_profile","POST",$(".updates"));
		};

		//--------------------------------LOg file ------------------------------

		$(document).on("click",".view_log" , function(event){
			event.preventDefault();
			var loglim = 1;
			function_view_log("show_log",loglim);
		});

		var function_view_log = function(type,loglim){
			var data = {"type_view" : type , "log_lim" : loglim};
			ajax_common(data,"./index.php/admin/logview","POST",$(".updates"));
		};

		
		$(document).on("click",".page_dvide" , function(event){
			event.preventDefault();
			var num_page = $(this).html();
			var max_p2 = $(".next_page").children(".max_page").val();
			if(num_page<=1){
				$(".previous").addClass("disabled");
			}
			else {
				$(".previous").removeClass("disabled");
			}
			if(parseInt(num_page)>=parseInt(max_p2)){

				$(".next").addClass("disabled");
			}
			else {
				$(".next").removeClass("disabled");
			}
			$(".prev_page").children(".prev_val").attr('value',parseInt(num_page)-1);
			$(".next_page").children(".next_val").attr('value',parseInt(num_page)+1);
			$(".this_page").html("Page "+num_page);
			function_get_pagelog("getpage",num_page);
		});

		


		
		$(document).on("click",".nextt" , function(event){
			event.preventDefault();
			var num_page = $(".next_page").children(".next_val").val();
			//alert("OK");
			function_get_pagelog("getpage",num_page);
		});

		$(document).on("click",".previouss" , function(event){
			event.preventDefault();
			var num_page = $(".prev_page").children(".prev_val").val();
			//alert("OK");
			function_get_pagelog("getpage",num_page);
		});

		var function_get_pagelog = function(type,npage){
			var data = {"type_view" : type, "log_lim" : npage };
			ajax_common(data,"./index.php/admin/logview","POST",$(".updates"));
		};

		//--------------------------------- show user baned -------------------
		$(document).on("click",".user_baned" , function(event){
			event.preventDefault();
			function_sh_userban();
		});

		var function_sh_userban = function(){
			var data = {"type_view" : "userban"}
			ajax_common(data,"./index.php/admin/userban","POST",$(".updates"));
		};

		// ---------------------------- ch stat ban -------------------------
		$(document).on("click",".ch_statban" , function(event){
			event.preventDefault();
			var stsid = $(this).children(".statid").val();
		    var stnid = $(this).children(".statname").val();
		    if(confirm("ผู้ใช้งาน "+stnid+" จะสามารถใช้งานได้อีกครั้งนึง" )) function_chbanstat(stnid);
		});
		var function_chbanstat = function(name){
			var data = {"user" : name};
			ajax_common(data, "./index.php/admin/ch_statusban","POST",$(".updates"));
		};

		//----------------------------- delete forever -----------------------
		$(document).on("click",".f_delusr" , function(event){
			event.preventDefault();
			
		    var stnid = $(this).children(".statname").val();
		    if(confirm("ข้อมูลที่เกี่ยวข้องกับผู้ใช้งาน "+stnid+" จะถูกลบออกทั้งหมด")) function_fdelusr(stnid);
		});

		var function_fdelusr = function(usr){
			var data = {"user" : usr };
			ajax_common(data, "./index.php/admin/fdel_user","POST",$(".updates"));
		}
	});


