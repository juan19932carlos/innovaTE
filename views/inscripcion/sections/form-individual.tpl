<h1>individual</h1>

<form action="{$_params.site}/inscripcion/registrarUsuario" method="post">
	<label for="nombre">Nombre</label>
	<input name="nombre" id="nombre" type="text" />

	<label for="apellido">Apellido</label>
	<input name="apellido" id="apellido" type="text" />

	<label for="documento">Documento</label>
	<input name="documento" id="documento" type="text" />

	<label for="tipo">Tipo de documento</label>
	<select name="tipo" id="tipo">
		<option value="TI">TI</option>
		<option value="CC">CC</option>
		<option value="NIT">NIT</option>
		<option value="CE">CE</option>
	</select>

	<label for="contraseña">Contraseña</label>
	<input name="contraseña" id="contraseña" type="text" />

	<label for="email">Correo electronico</label>
	<input name="email" id="email" type="text" />

	<button>Enviar</button>
</form>