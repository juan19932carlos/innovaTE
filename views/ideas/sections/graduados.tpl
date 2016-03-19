	<!--GRADUADOS-->
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Student-3.png" alt="Noticias" class="img-circle shadow-up-amarillo">
			<h2 class="tx-naranja">Graduados</h2>
		</header>
		<div class="bg-amarillo">
			<article>
				<div class="row">
					<div class="col-lg-offset-1 col-lg-10" >
						{foreach from=$proyectos item=graduado}
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" >
							<div class="graduado bg-blanco">
								<img src="{$_params.site}/imagenes/proyectos/{$graduado.img}" alt="{$graduado.nombre}" class="img-responsive">
							</div>
							<a href="" class="text-right bnt btn-link"><h3>{$graduado.nombre}</h3></a>
						</div>
						{/foreach}
						<div style="height: 2em;"></div>
					</div>
				</div>
			</article>
		</div>
</section>