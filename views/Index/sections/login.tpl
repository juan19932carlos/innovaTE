<div class="container">
	<div class="row">
		<div class="col-lg-offset-4 col-lg-4
					col-md-offset-4 col-md-4
					col-sm-offset-2 col-sm-8
					col-xs-offset-1 col-xs-10  bg-azul login">
			<form action="{$_params.site}/index/login" id="login" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="usuario" class="control-label col-xs-3">Usuario</label>
					<div class="col-xs-9">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="abc@unal.edu.co"/>
					</div>
				</div>

				<div class="form-group">
					<label for="contraseña" class="control-label col-xs-3">Contraseña</label>
					<div class="col-xs-9">
						<input type="password" name="contraseña" id="contraseña" class="form-control" placeholder="****"/>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3">
						<div class="checkbox">
							<label for="contraseña" >
								<input type="checkbox" name="mantener_sesion"> Recordarme.
							</label>
						</div>
					</div>
				</div>
				<div class="col-xs-offset-3 col-xs-3">
					<button class="btn btn-primary" id="submit">Iniciar</button>
				</div>
				<div class="col-xs-6">
					<div class="alert alert-danger {$error_log.hidden}" role="danger" id="alerta">
						<h6>{$error_log.msg}</h6>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
