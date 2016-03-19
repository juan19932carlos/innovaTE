<!DOCTYPE html>
<html lang="{$__lang}">
	<head>
		<title>{$__titulo}</title>
		<meta charset="{$__charset}"/>
		<meta name="author" content="{$__autor}"/>
		
		{foreach from=$_params.css item=css}
		<link rel="stylesheet" href="{$css}"/>
		{/foreach}

		{foreach from=$_params.js item=js}
		<script type="text/javascript" src="{$js}"></script>
		{/foreach}

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	</head>

	<body>
		<!--HEADER-->
		<header>
			<div style="height: 1.5em;" class="bg-azul"></div>
			<div style="height: 0.25em;" class="bg-blanco"></div>
			<div style="height: 1em;" class="bg-azul"></div>
			<div style="height: 0.3em;" class="bg-blanco"></div>
			<div style="height: 1.5em;" class="bg-azul"></div>
			<div style="height: 3em;" class="bg-blanco"></div>
			
			<div class="container">
				<nav class="row">
					<ul class="nav nav-tabs" id="barra-navegacion">
						<li role="presentation" id="inovate-logo"><a href="{$_params.site}/"class="col-sm-12"> 
							<img src="{$_params.site}/imagenes/InnovaTE_Logo.svg" alt="InnovaTE logo"/> 
							</a></li>
						<li role="presentation">
								<div class="dropdown">
									<a class="btn btn-link dropdown-toggle" type="button" id="menu-ideas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									IDEAS
									<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="menu-ideas">
										<li><a href="{$_params.site}/ideas/destacados/">Proyectos destacados</a></li>
										<li><a href="{$_params.site}/ideas/equipos/">Equipos de trabajo</a></li>
										<li><a href="{$_params.site}/ideas/graduados/">Graduados</a></li>
									</ul>
								</div>
							</li>
						<li role="presentation">
								<div class="dropdown">
									<a class="btn btn-link dropdown-toggle" type="button" id="menu-herramientas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									HERRAMIENTAS
									<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="menu-herramientas">
										<li><a href="{$_params.site}/herramientas/manuales/">Manuales de ayuda</a></li>
										<li><a href="{$_params.site}/herramientas/enlaces/">Enlaces de interés</a></li>
										<li><a href="{$_params.site}/herramientas/software/">Software sugerido</a></li>
									</ul>
								</div>
							</li>
						<li role="presentation">
								<div class="dropdown">
									<a class="btn btn-link dropdown-toggle" type="button" id="menu-enredate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									ENRÉDATE
									<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="menu-enredate">
										<li><a href="{$_params.site}/enredate/mentores/">Mentores</a></li>
										<li><a href="{$_params.site}/enredate/aliados/">Aliados</a></li>
										<li><a href="{$_params.site}/enredate/inversionistas/">Inversionistas</a></li>
									</ul>
								</div>
							</li>
						<li role="presentation">
								<div class="dropdown">
									<a class="btn btn-link dropdown-toggle" type="button" id="menu-noticias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									NOTICIAS
									<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="menu-noticias">
										<li><a href="{$_params.site}/noticias/index/">NotInnovate</a></li>
										<li><a href="{$_params.site}/noticias/eventos/">Eventos</a></li>
									</ul>
								</div>
							</li>
						<li role="presentation">
								<div class="dropdown">
									<a class="btn btn-link dropdown-toggle" type="button" id="menu-innovate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									¿InnovaTE?
									<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="menu-innovate">
										<li><a href="{$_params.site}/innovate/quienesomos/">¿Quiénes somos?</a></li>
										<li><a href="{$_params.site}/innovate/contacto/">Contactanos</a></li>
									</ul>
								</div>
							</li>
						<li  role="presentation">
								<div class="dropdown">
									<a href="{$_params.site}/index/login/" class="btn btn-link">
										{if !$_sesion} login
										{else} 
											Usuario: {$_sesion}
										{/if}
									</a>
								</div>
							</li>
					</ul>
				</nav>
			</div>
			
			
		</header>
		<!--CONTENIDO-->

		{include file=$_contenido}

		<!--FOOTER-->
		<footer class="bg-azul" id="footer">
			<div class="container">
				<section >
					<a class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tx-blanco" href="{$_params.site}/"> 
						<div>
							<img src="{$_params.site}/imagenes/cloud-network-sign.png" alt="Enrédate" title="Enrédate" class="img-responsive">
						</div>
						<h3>Enrédate</h3>
					</a>
					<a class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tx-blanco" href="{$_params.site}/"> 
						<div>
							<img src="{$_params.site}/imagenes/cloud-tools.png" alt="Herramientas" title="Herramientas" class="img-responsive">
						</div>
						<h3>Herramientas</h3>
					</a>
					<a class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tx-blanco" href="{$_params.site}/"> 
						<div>
							<img src="{$_params.site}/imagenes/cloud-users.png" alt="Conocenos" title="Conocenos" class="img-responsive">
						</div>
						<h3>Conocenos</h3>
					</a>
				</section>
			</div>
			<hr>*2

		</footer>
	</body>
</html>