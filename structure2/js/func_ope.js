/* JavaScript */

	// Update
		// Phone Line
			function updatePhoneLines(){
				// Animación
					$("table.phoneLine").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				//Llamada AJAX
					$.post("../php/phoneLines.php", {}, function(r){
						$("table.phoneLine").html(r);
						//Borrar
							$("table.phoneLine i.buttonDelete").on("click", function(){
								deletePhoneLine(this);
							});
						//Editar
							$("table.phoneLine i.buttonEdit").on("click", function(){
								editPhoneLine(this);
							});
					});
			}
		// Clients
			function updateClients(){
				// Animación
					$("table.clients").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				//Llamada AJAX
					$.post("../php/clients.php", {}, function(r){
						$("table.clients").html(r);
						//Borrar
							$("table.clients i.buttonDelete").on("click", function(){
								deleteClient(this);
							});
						//Editar
							$("table.clients i.buttonEdit").on("click", function(){
								editClient(this);
							});
						// Ver notas
							$("table.clients .buttonSeeNotes").on("click", function(){
								var tag = $(this).attr("tag");
								var title = $(this).attr("title");
								updateNotes(tag, title);
							});
						// Ver cliente detallado
							$("table.clients .buttonSeeClientDetailed").on("click", function(){
								var tag = $(this).attr("tag");
								updateClientDetailed(tag);
							});
					});
			}
		// Client detailed
			function updateClientDetailed(affID){
				// Mostramos el modal
					$("div#modClientDetailed").css("display", "block");
				// Animación
					$("table.clientDetailed").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				//Llamada AJAX
					$.post("../php/clientDetailed.php", {affID:affID}, function(r){
						$("table.clientDetailed").html(r);
					});
			}
		// Notes
			function updateNotes(tag, title){
				// Mostramos el modal
					$("div#modClientNotes").css("display", "block");
				// Animación
					$("table.notes").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				// Mensaje
					$(".result").html("Por favor, espere");
				//Recolección de datos
					var noteClientID = tag;
					var affClient = title;
				//Llamada AJAX
					$.post("../php/notes.php", {noteClientID:noteClientID},function(r){
						// Mostramos el resultado
							$("div#modClientNotes table.notes").html(r);
							$("div#modClientNotes .buttonAddNote").attr("tag", noteClientID);
							$("div#modClientNotes .buttonAddNote").attr("title", affClient);
						//Borrar
							$("table.notes i.buttonDelete").on("click", function(){
								//deleteNote(objeto);
							});
						//Editar
							$("table.notes i.buttonEdit").on("click", function(){
								//editNote(objeto);
							});
					});
			}
		// Requests
			function updateRequests(){
				// Animación
					$("table.requests").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				//Llamada AJAX
					$.post("../php/requests.php", {}, function(r){
						$("table.requests").html(r);
						//Borrar
							$("table.requests i.buttonDelete").on("click", function(){
								deleteRequest(this);
							});
						//Editar
							$("table.requests i.buttonEdit").on("click", function(){
								editRequest(this);
							});
					});
			}
		// Reports
			function updateReports(){
				// Variables
					var type = "withouConnection";
				// Animación
					$("ol.listWithoutConnection").html("<img class='w3-center w3-padding' src='../img/loader.gif'>");
				//Llamada AJAX
					$.post("../php/reports.php", {}, function(r){
						$("ol.listWithoutConnection").html(r);
					});
			}
		// Update Events handler
			function update(who){
				switch(who){
					case "phoneLine":
						updatePhoneLines();
						break;
					case "clients":
						updateClients();
						break;
					case "notes":
						updateNotes();
						break;
					case "requests":
						updateRequests();
						break;
					case "all":
						updatePhoneLines();
						updateClients();
						updateRequests();
						updateReports();
						break;
				}
			}
		// Updated functions
			// Edit
				// Phone Line
					function editPhoneLine(objeto){
						// Mostramos el modal
							$("div#modEditPhoneLine").css("display", "block");
						// Precargamos los datos
							var pa = objeto.parentNode;
							var sup = pa.parentNode;
							var c = "";
							if (sup.hasChildNodes()) {
								var children = sup.children;
								for (var i = 0; i < children.length; i++) {
									c = $(children[i]).html();
									switch(i){
										case 0:
											$('input[name=plNumberE]').val(c);
											break;
										case 1:
											$('input[name=plPlaceE]').val(c);
											break;
										case 2:
											$('input[name=plPortE]').val(c);
											break;
									}
								}
							}
							var attr = $(objeto).attr("tag");
							$("div#modEditPhoneLine .buttonSave").attr("tag", attr);
					}
				// Client
					function editClient(objeto){
						// Mostramos el modal
							$("div#modEditClient").css("display", "block");
						// Precargamos los datos
							var pa = objeto.parentNode;
							var sup = pa.parentNode;
							var c = "";
							if (sup.hasChildNodes()) {
								var children = sup.children;
								for (var i = 0; i < children.length; i++) {
									c = $(children[i]).html();
									switch(i){
										case 0:
											$('input[name=affClientE]').val(c);
											break;
										case 1:
											$('select[name=affAccountTypeE]').val(c);
											break;
										case 4:
											$('select[name=affPlanE]').val(c);
											break;
										case 5:
											$('input[name=affPlanPriceE]').val(c);
											break;
										case 6:
											$('input[name=affCoinE]').val(c);
											break;
										case 7:
											$('select[name=affInternetTypeE]').val(c);
											break;
										case 8:
											$('input[name=affPaymentMadeE]').val(c);
											break;
										case 9:
											$('select[name=affInstallationE]').val(c);
											break;
										case 10:
											$('input[name=affIdentityE]').val(c);
											break;
										case 11:
											$('select[name=affIdentityTypeE]').val(c);
											break;
									}
								}
							}
							var attr = $(objeto).attr("tag");
							$("div#modEditClient .buttonSave").attr("tag", attr);
					}
				// Request
					function editRequest(objeto){
						// Mostramos el modal
							$("div#modEditRequest").css("display", "block");
						// Precargamos los datos
							var pa = objeto.parentNode;
							var sup = pa.parentNode;
							var c = "";
							if (sup.hasChildNodes()) {
								var children = sup.children;
								for (var i = 0; i < children.length; i++) {
									c = $(children[i]).html();
									switch(i){
										case 1:
											$('input[name=reSubjectE]').val(c);
											break;
										case 2:
											$('select[name=reStatusE]').val(c);
											break;
										case 3:
											$('select[name=reTypeE]').val(c);
											break;
										case 4:
											$('textarea[name=reDescriptionE]').val(c);
											break;
									}
								}
							}
							var attr = $(objeto).attr("tag");
							$("div#modEditRequest .buttonSave").attr("tag", attr);
					}
					
			// Delete
				// Phone line
					function deletePhoneLine(objeto){
						// Mostramos el modal
							$("div#modConfirmation").css("display", "block");
						// Borrado
							var pregunta = $(objeto).attr("title");
							var id = $(objeto).attr("tag");
							var type = "phoneLine";
							$("#modConfirmation").css("display", "block");
							$("#modConfirmation .content").html(pregunta);
							$("#modConfirmation .content2").html(id);
							
							$("#modConfirmation .buttonYes").click(function(e){
								//Llamada AJAX
									$.post("../php/delete.php", {plID:id, type:type},function(r){
										// Mostramos el resultado
											$(".result").html(r);
										// Recargamos la tabla 
											update("phoneLine");
										// Cerramos el modal
											if(r == "Eliminado correctamente.")
												$("div#modConfirmation").css("display", "none");
									});
							});	
					}
				// Client
					function deleteClient(objeto){
						// Mostramos el modal
							$("div#modConfirmation").css("display", "block");
						// Borrado
							var pregunta = $(objeto).attr("title");
							var id = $(objeto).attr("tag");
							var type = "client";
							$("#modConfirmation").css("display", "block");
							$("#modConfirmation .content").html(pregunta);
							$("#modConfirmation .content2").html(id);
							
							$("#modConfirmation .buttonYes").click(function(e){
								//Llamada AJAX
									$.post("../php/delete.php", {id:id, type:type},function(r){
										// Mostramos el resultado
											$("div.result").html(r);
										// Recargamos la tabla 
											update("clients");
										// Cerramos el modal
											if(r == "Eliminado correctamente.")
												$("div#modConfirmation").css("display", "none");
									});
							});	
					}
				// Note
					function deleteNote(objeto){
						// Mostramos el modal
							$("div#modConfirmation").css("display", "block");
						// Borrado
							var pregunta = $(objeto).attr("title");
							var id = $(objeto).attr("tag");
							var type = "note";
							$("#modConfirmation").css("display", "block");
							$("#modConfirmation .content").html(pregunta);
							$("#modConfirmation .content2").html(id);
							
							$("#modConfirmation .buttonYes").click(function(e){
								//Llamada AJAX
									$.post("../php/delete.php", {id:id, type:type},function(r){
										// Mostramos el resultado
											$("div.result").html(r);
										// Recargamos la tabla 
											update("clients");
										// Cerramos el modal
											if(r == "Eliminado correctamente.")
												$("div#modConfirmation").css("display", "none");
									});
							});	
					}
				// Request
					function deleteRequest(objeto){
						// Mostramos el modal
							$("div#modConfirmation").css("display", "block");
						// Borrado
							var pregunta = $(objeto).attr("title");
							var id = $(objeto).attr("tag");
							var type = "request";
							$("#modConfirmation").css("display", "block");
							$("#modConfirmation .content").html(pregunta);
							$("#modConfirmation .content2").html(id);
							
							$("#modConfirmation .buttonYes").click(function(e){
								//Llamada AJAX
									$.post("../php/delete.php", {id:id, type:type},function(r){
										// Mostramos el resultado
											$("div.result").html(r);
										// Recargamos la tabla 
											update("requests");
										// Cerramos el modal
											if(r == "Eliminado correctamente.")
												$("div#modConfirmation").css("display", "none");
									});
							});	
					}
					
/* jQuery */

	$(function(){
		// Edit
			// Request
				$("div#modEditRequest .buttonSave").click(function(e){
					// Mensaje
						$(".result").html("Por favor, espere");
					//Recolección de datos
						var reID = $(this).attr("tag");
						var reSubject = $('input[name=reSubjectE]').val();
						var reType = $('select[name=reTypeE').val();
						var reStatus = $('select[name=reStatusE').val();
						var reDescription = $('textarea[name=reDescriptionE').val();
						var type = "request";
					//Llamada AJAX
						$.post("../php/edit.php", {reID:reID, reSubject:reSubject, reType:reType, reStatus:reStatus, reDescription:reDescription, type:type},function(r){
							// Mostramos el resultado
								$(".result").html(r);
							// Recargamos la tabla 
								update("requests");
							// Vaciamos los inputs y cerramos el modal
								if(r == "La informaci&oacute;n se ha actualizado correctamente"){
									$('input[name=reSubjectE]').val("");
									$('select[name=reTypeE').val("");
									$('select[name=reStatusE').val("");
									$('textarea[name=reDescriptionE').val("");
									$("div#modEditRequest").css("display", "none");
								}
						});
					});
			// Phone line
				$("div#modEditPhoneLine .buttonSave").click(function(e){
					// Mensaje
						$(".result").html("Por favor, espere");
					//Recolección de datos
						var id = $(this).attr("tag");
						var plNumberE = $('input[name=plNumberE]').val();
						var plPlaceE = $('input[name=plPlaceE]').val();
						var plPortE = $('input[name=plPortE]').val();
						var type = "phoneLine"
					//Llamada AJAX
						$.post("../php/edit.php", {plID:id, plNumber:plNumberE, plPlace:plPlaceE, plPort:plPortE, type:type},function(r){
							// Mostramos el resultado
								$("div.result").html(r);
							// Recargamos la tabla 
								update("phoneLine");
							// Vaciamos los inputs y cerramos el modal
								if(r == "La informaci&oacute;n se ha actualizado correctamente"){
									$('input[name=plNumberE]').val("");
									$('input[name=plPlaceE]').val("");
									$('input[name=plPortE]').val("");
									$("div#modEditPhoneLine").css("display", "none");
								}
						});
				});
			// Client
				$("div#modEditClient .buttonSave").click(function(e){
					// Mensaje
						$(".result").html("Por favor, espere");
					//Recolección de datos
						var affID = $(this).attr("tag");
						var affClient = $('input[name=affClientE]').val();
						var affIdentity = $('input[name=affIdentityE]').val();
						var affIdentityType = $('select[name=affIdentityTypeE]').val();
						var affPaymentMade = $('input[name=affPaymentMadeE]').val();
						var affAccountType = $('select[name=affAccountType]').val();
						var affPlan = $('select[name=affPlanE]').val();
						var affPlanPrice = $('input[name=affPlanPriceE]').val();
						var affCoin = $('input[name=affCoinE]').val();
						var affInternetType = $('select[name=affInternetTypeE]').val();
						var affInstallation = $('select[name=affInstallationE]').val();
						var type = "client"
				//Llamada AJAX
					$.post("../php/edit.php", {affID:affID, affClient:affClient, affIdentity:affIdentity, affIdentityType:affIdentityType, affPaymentMade:affPaymentMade, affAccountType:affAccountType, affPlan:affPlan, affPlanPrice:affPlanPrice, affCoin:affCoin, affInternetType:affInternetType, affInstallation:affInstallation, type:type},function(r){
							// Mostramos el resultado
								$(".result").html(r);
							// Recargamos la tabla 
								update("clients");
							// Vaciamos los inputs y cerramos el modal
								if(r == "La informaci&oacute;n se ha actualizado correctamente"){
								$('input[name=affClientE]').val("");
								$('input[name=affIdentityE]').val("");
								$('select[name=affIdentityTypeE]').val("");
								$('input[name=affPaymentMadeE]').val("");
								$('input[name=affAccountTypeE]').val("");
								$('input[name=afflanE]').val("");
								$('input[name=affPlanPriceE]').val("");
								$('input[name=affInternetTypeE]').val("");
								$('input[name=affInstallationE]').val("");
									$("div#modEditClient").css("display", "none");
								}
						});
				});
				
		// Addition
			// Client
				$(".buttonAddClient").click(function(e){
					// Mostramos el modal
						$("div#modAddClient").css("display", "block");
				});
				// Guardado
					$("div#modAddClient .buttonSave").click(function(e){
						// Mensaje
							$(".result").html("Por favor, espere");
						//Recolección de datos
							var affClient = $('input[name=affClient]').val();
							var affIdentity = $('input[name=affIdentity]').val();
							var affIdentityType = $('select[name=affIdentityType]').val();
							var affPaymentMade = $('input[name=affPaymentMade]').val();
							var affAccountType = $('select[name=affAccountType]').val();
							var affPlan = $('select[name=affPlan]').val();
							var affPlanPrice = $('input[name=affPlanPrice]').val();
							var affInternetType = $('select[name=affInternetType]').val();
							var affInstallation = $('select[name=affInstallation]').val();
							var type = "client"
						//Llamada AJAX
							$.post("../php/save.php", {affClient:affClient, affIdentity:affIdentity, affIdentityType:affIdentityType, affPaymentMade:affPaymentMade, affAccountType:affAccountType, affPlan:affPlan, affPlanPrice:affPlanPrice, affInternetType:affInternetType, affInstallation:affInstallation, type:type},function(r){
								// Mostramos el resultado
									$("div.result").html(r);
								// Recargamos la tabla 
									update("clients");
								// Vaciamos los inputs y cerramos el modal
									if(r == "La informaci&oacute;n se ha guardado correctamente"){
										$('input[name=affClient]').val("");
										$('input[name=affIdentity]').val("");
										$('select[name=affIdentityType]').val("");
										$('input[name=affPaymentMade]').val("");
										$('input[name=affAccountType]').val("");
										$('input[name=afflan]').val("");
										$('input[name=affPlanPrice]').val("");
										$('input[name=affInternetType]').val("");
										$('input[name=affInstallation]').val("");
										$("div#modAddClient").css("display", "none");
									}
							});
					});
			// Note
				$(".buttonAddNote").click(function(e){
					// Mostramos el modal
						$("div#modAddNote").css("display", "block");
					// Variables
						var affClient = $(this).attr("title");
						var noteClientID = $(this).attr("tag");
						$("div#modAddNote .buttonSave").attr("title", affClient);
						$("div#modAddNote .buttonSave").attr("tag", noteClientID);
					// Precargamos información
						$("div#modAddNote h3.affClient").html(affClient);
				});
				// Guardado
					$("div#modAddNote .buttonSave").click(function(e){
						// Mensaje
							$(".result").html("Por favor, espere");
						//Recolección de datos
							var affClient = $(this).attr("title");
							var noteClientID = $(this).attr("tag");
							var noteStatus = $('select[name=noteStatus]').val();
							var noteState = $('select[name=noteState]').val();
							var noteDescription = $('textarea[name=noteDescription]').val();
							var type = "note";
						//Llamada AJAX
							$.post("../php/save.php", {noteClientID:noteClientID, noteStatus:noteStatus, noteState:noteState, noteDescription:noteDescription,type:type},function(r){
								// Mostramos el resultado
									$(".result").html(r);
								// Recargamos la tabla 
									updateNotes(noteClientID, affClient);
								// Vaciamos los inputs y cerramos el modal
									if(r == "La informaci&oacute;n se ha guardado correctamente"){
										$('input[name=noteClientID]').val("");
										$('input[name=noteStatus]').val("");
										$('input[name=noteState]').val("");
										$('input[name=noteDescription]').val("");
										$("div#modAddNote").css("display", "none");
									}
							});
					});
			// Phone lines
				$(".buttonAddPhoneLine").click(function(e){
					// Mostramos el modal
						$("div#modAddPhoneLine").css("display", "block");
				});
				// Guardado
					$("div#modAddPhoneLine .buttonSave").click(function(e){
						// Mensaje
							$(".result").html("Por favor, espere");
						//Recolección de datos
							var plNumber = $('input[name=plNumber]').val();
							var plPlace = $('input[name=plPlace]').val();
							var plPort = $('input[name=plPort]').val();
							var type = "phoneLine"
						//Llamada AJAX
							$.post("../php/save.php", {plNumber:plNumber, plPlace:plPlace, plPort:plPort, type:type},function(r){
								// Mostramos el resultado
									$(".result").html(r);
								// Recargamos la tabla 
									update("phoneLine");
								// Vaciamos los inputs y cerramos el modal
									if(r == "La informaci&oacute;n se ha guardado correctamente"){
										$('input[name=plNumber]').val("");
										$('input[name=plPlace]').val("");
										$('input[name=plPort]').val("");
										$("div#modAddPhoneLine").css("display", "none");
									}
							});
					});
			// Request
				$(".buttonAddRequest").click(function(e){
					// Mostramos el modal
						$("div#modAddRequest").css("display", "block");
				});
				// Guardado
					$("div#modAddRequest .buttonSave").click(function(e){
						// Mensaje
							$(".result").html("Por favor, espere");
						//Recolección de datos
							var reSubject = $('input[name=reSubject]').val();
							var reType = $('select[name=reType]').val();
							var reStatus = $('select[name=reStatus]').val();
							var reDescription = $('textarea[name=reDescription]').val();
							var type = "request"
						//Llamada AJAX
							$.post("../php/save.php", {reSubject:reSubject, reType:reType, reStatus:reStatus, reDescription:reDescription, type:type},function(r){
								// Mostramos el resultado
									$(".result").html(r);
								// Recargamos la tabla 
									update("requests");
								// Vaciamos los inputs y cerramos el modal
									if(r == "La informaci&oacute;n se ha guardado correctamente"){
										$('input[name=reSubject]').val("");
										$('select[name=reType]').val("");
										$('select[name=reStatus]').val("");
										$('textarea[name=reDescription]').val("");
										$("div#modAddRequest").css("display", "none");
									}
							});
					});
		
		// Search
			// User
				// Abrir y cerrar ventana
					$("input[name='search']").focus(function(e){
						var x = document.querySelector("section.sectionSearch ul.ulResult");
						x.className = x.className.replace(" w3-hide", "");
					});
					$("input[name='search']").focusout(function(e){
						var x = document.querySelector("section.sectionSearch ul.ulResult");
						x.className += " w3-hide";
					});
		// General
			update("all");
	});
