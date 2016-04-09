function insc_equipos(){

	usuariosContainer = '.usuarios-container';
	ideasContainer = '.ideas-container';

	formUsuario = $('.usuarios-container #usuario-1').html();
	formIdeas = $('.ideas-container>form').html();

	//agregar eventos del botón agregar.
	usuariosCount = 1;
	ideasCount = 1;

	$('#agregar', usuariosContainer).on('click', function() {
		$('form' , usuariosContainer).addClass("inactive");
		$('#usuario-'+usuariosCount, usuariosContainer).after( '<form id="usuario-' + (++usuariosCount) + '">' + formUsuario + '</form>');
		$('ul li' , usuariosContainer).removeClass("active");
		$('ul #'+ (usuariosCount-1), usuariosContainer).after('<li class="active" id="' + usuariosCount + '">'+ usuariosCount +'</li>');
	});
	$('#agregar', ideasContainer).on('click', function() {
		$('form' , ideasContainer).addClass("inactive");
		$('#idea-'+ideasCount, ideasContainer).after('<form id="idea-' + (++ideasCount) + '">' + formIdeas + '</form>');
		$('ul li' , ideasContainer).removeClass("active");
		$('ul #'+ (ideasCount-1) , ideasContainer).after('<li class="active" id="' + ideasCount + '">'+ ideasCount +'</li>');
	});

	//agregar eventos del botón quitar.
	$('#quitar', usuariosContainer).on('click', function() {
		if( $("ul li", usuariosContainer).length <= 1 )
			return;

		aux = parseInt( $("ul .active", usuariosContainer).attr("id") );

		nav_handler = $("ul .active", usuariosContainer).next("li");
		form_handler = $( "#usuario-"+aux, usuariosContainer).next("form");

		$("#usuario-" + aux, usuariosContainer).remove();
		$("ul .active", usuariosContainer).remove();

		if (aux > 1){
			$("#usuario-" + (aux-1), usuariosContainer).removeClass("inactive");
			$("ul #"+ (aux-1), usuariosContainer).addClass("active");
		}else{
			$("#usuario-" + (aux+1), usuariosContainer).removeClass("inactive");
			$("ul #"+ (aux+1), usuariosContainer).addClass("active");
		}

		while( nav_handler.length >= 1){
			nav_handler.html(aux);
			nav_handler.attr("id",aux);
			form_handler.attr("id","usuario-"+aux);
			nav_handler = nav_handler.next("li");
			form_handler = form_handler.next("form");
			aux+=1;
		}
		
		usuariosCount-=1;
	});
	$('#quitar', ideasContainer).on('click', function() {
		if( $("ul li", ideasContainer).length <= 1 )
			return;

		aux = parseInt( $("ul .active", ideasContainer).attr("id") );

		nav_handler = $("ul .active", ideasContainer).next("li");
		form_handler = $( "#idea-"+aux, ideasContainer).next("form");

		$("#idea-" + aux, ideasContainer).remove();
		$("ul .active", ideasContainer).remove();

		if (aux > 1) {
			$("#idea-" + (aux-1), ideasContainer).removeClass("inactive");
			$("ul #"+ (aux-1), ideasContainer).addClass("active");
		} else {
			$("#idea-" + (aux+1), ideasContainer).removeClass("inactive");
			$("ul #"+ (aux+1), ideasContainer).addClass("active");
		}

		while( nav_handler.length >= 1){
			nav_handler.html(aux);
			nav_handler.attr("id",aux);
			form_handler.attr("id","idea-"+aux);
			nav_handler = nav_handler.next("li");
			form_handler = form_handler.next("form");
			aux+=1;
		}
		
		ideasCount-=1;
	});

	//Agregar eventos a los botones de selección de usuarios e ideas.
	$("ul", ideasContainer).on('click','li', function(){
		aux = $(this).attr("id");
		$('form' , ideasContainer).addClass("inactive");
		$('ul li' , ideasContainer).removeClass("active");
		$(this).addClass("active");
		$('#idea-'+aux, ideasContainer).removeClass("inactive");
	});
	$("ul", usuariosContainer).on('click','li', function(){
		aux = $(this).attr("id");
		$('form' , usuariosContainer).addClass("inactive");
		$('ul li' , usuariosContainer).removeClass("active");
		$(this).addClass("active");
		$('#usuario-'+aux, usuariosContainer).removeClass("inactive");
	});

	//TODO: Falta elaborar funciones de verificación de datos y envío de datos para la correcta inscripción.
}