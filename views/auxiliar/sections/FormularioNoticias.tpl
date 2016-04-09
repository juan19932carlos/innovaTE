<div class="container">

<div id="editor-1">
	<div class="editor">
		<div id="herramientas">
			<div id="imagenes"> </div>
			<button id="negrita"> <spam class=" glyphicon glyphicon-bold " aria-hidden="true" > </spam>  </button>
			<button id="cursiva"> <spam class=" glyphicon glyphicon-italic " aria-hidden="true" > </spam>  </button>
			<button id="imagen"> <spam class=" glyphicon glyphicon-picture " aria-hidden="true" >  </spam> </button>
			<button id="citar"> <spam class=" glyphicon glyphicon-share " aria-hidden="true" ></spam> </button>
			<button id="lista"> <spam class=" glyphicon glyphicon-list " aria-hidden="true" ></spam> </button>
			<button id="link"> <spam class=" glyphicon glyphicon-link " aria-hidden="true" ></spam> </button>
			<button id="vista-previa" > <spam class="glyphicon glyphicon-search" aria-hidden="true" ></spam> </button>

		</div>
		<form id="editar-texto"	action="{$_params.site}/noticias/Publicarnoticia" method="POST">
			<input id="titulo" name="titulo" type="text" placeholder="Titulo"/>
			<textarea id="contenido" name="contenido" type="textbox" placeholder="Contenido"> </textarea>
			<input id="tags" name="tags" type="text" placeholder="tags"/>
			<input type="submit">
		</form>

	</div>
	<div id="vista_previa_container">
		<h2 id="titulo"></h2>
		<div id="contenido">
		</div>
	</div>
</div>

</div>