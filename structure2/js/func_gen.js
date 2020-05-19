/* JavaScript */
	// Log in function
		function logIn(type){
			if(type == 0){
				//Llamada AJAX
				$.post("../php/login.php", {type:type},function(r){
					if(r == "noLogIn." && $("div#id").attr("tag") != "login")
						window.location.assign("../login");
				});
			}else if(type == 1){
				//Recolección de datos
					var auUser = $('.contLogin input[name="auUser"]').val();
					var auPassword = $('.contLogin input[name="auPassword"]').val();
				//Llamada AJAX
					$.post("../php/login.php", {auUser:auUser, auPassword:auPassword, type:type},function(r){
						$(".result").html(r);
						if(r == "Iniciando.")
							window.location.assign("../main/");
					});
			}
		}
	// Cierre de modales
		function closeModal(boton){
			var header = boton.parentNode;
			var div = header.parentNode;
			var divP = div.parentNode;
			divP.style.display = "none";
		}
		
/* jQuery */

		// Log in verification
			logIn(0);
			
	$(function(){
		// Log in
			// Log in verification
				logIn(0);
			// Click
				$('#fams .auButton').click(function(e){
					logIn(1);
				});
			// Through the keyboard
				$('.contLogin input[name="auUser"]').keydown(function(tecla){
					if (tecla.keyCode == 10 || tecla.keyCode == 13) {
						logIn(1);
					}
				});
				$('.contLogin input[name="auPassword"]').keydown(function(tecla){
					if (tecla.keyCode == 10 || tecla.keyCode == 13) {
						logIn(1);
					}
				});
				
		// Log out
			$(".buttonLogout").click(function(e){
				var tag = $(this).attr("tag");
				var title = $(this).attr("title");
				$("#modConfirmation").css("display", "block");
				$("#modConfirmation .content").html(tag);
				$("#modConfirmation .content2").html(title);
				
				$("#modConfirmation .buttonYes").click(function(e){
					//Llamada AJAX
						$.post("../php/logout.php", {},function(r){
							window.location.assign("../login");
						});
				});	
			});
				
		// Pages
			$("nav.contNav ul.ulPages li").click(function(e){
				// Cambiamos el color de fondo de todas las tabs
					$("nav.contNav ul.ulPages li").each(function(i){
						$(this).css("background", "none");
					});
					$(this).css("background", "#FFF");
				// Obtenemos el tag 
					var tag = $(this).attr("tag");
				// Obtenemos el title
					var title = $(this).attr("title");
				// Hacemos invisibles todos los elementos y luego visible uno
					$("main.contMain div.divPage").each(function(i){
						$(this).css("display", "none");
					});
					$("main.contMain div#" + tag).css("display", "block");
				//Cambiamos el nombre de la página
					$("main.contMain h2.h2Title").html(title);
			});
			
		// Tabs
			$("main.contMain section.sectionReports div.divTabs button").click(function(e){
				// Cambiamos el color de fondo de todas las tabs
					$("div.divTabs button").each(function(i){
						$(this).css("background", "none");
					});
					$(this).css("background", "#ADADAD");
				// Obtenemos el tag y hacemos invisibles todos los elementos y luego visible uno
					var tab = $(this).attr("tag");
					$("main.contMain section.sectionReports div.divTab").each(function(i){
						$(this).css("display", "none");
					});
					$("main.contMain section.sectionReports div.divTab[tag=" + tab + "]").css("display", "block");
			});
			
		// Begin
			$("main.contMain section.sectionReports div.divTabs button[tag=vencidos]").click();
			$("nav.contNav ul.ulPages li[tag=divPage1]").click();
		
	});
