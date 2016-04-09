<h1>Equipo</h1>

<section class="container">
	<div class="contenedor-inscripcion-grupos">
	
		<div class="usuarios-container">
			<h2>Usuarios</h2>
			<ul id="selector-usuarios">
				<li id="1" class="active">1</li>
			</ul>
			<form id="usuario-1">
				<label>Nombre
				<input name="nombre" id="nombre" type="text"/>
				</label>

				<label>Apellido
				<input name="apellido" id="apellido" type="text"/>
				</label>

				<label>Documento
				<input name="documento" id="documento" type="text"/>
				</label>

				<label>Tipo de documento
				<select name="tipo" id="tipo">
					<option value="TI">TI</option>
					<option value="CC">CC</option>
					<option value="NIT">NIT</option>
					<option value="CE">CE</option>
				</select>
				</label>

				<label>Contraseña
				<input name="contraseña" id="contraseña" type="text" />
				</label>

				<label>Correo electronico
				<input name="email" id="email" type="text" />
				</label>
			</form>
			<button id="agregar">+</button>
			<button id="quitar">-</button>
		</div>
		
		<div class="ideas-container">
			<h2>Ideas</h2>
			<ul id="selector-ideas">
				<li id="1" class="active">1</li>
			</ul>
			<form id="idea-1">
				<label>Nombre del proyecto
				<input name="nombre" id="nombre" type="text"/>
				</label>

				<label>Mentor
				<input name="mentor" id="mentor" type="text"/>
				</label>

				<label>Tipo de proyecto
				<input name="tipo" id="tipo" type="text"/>
				</label>
			</form>

			<button id="agregar">+</button>
			<button id="quitar">-</button>
		</div>

		<button id="enviar">Finalizar inscripción</button>
	</div>
</section>