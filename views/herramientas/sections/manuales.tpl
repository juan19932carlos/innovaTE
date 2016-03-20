<!--DESCARGABLES Y ARCHIVOS-->
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/RSS.png" alt="Noticias" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Noticias</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="row">
					<div class="col-xs-12" >
						{foreach from=$archivos item=archivo}
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
							<div class="archivo">
								<a href="{$_params.site}/{$archivo.link}" >
									<img src="{$_params.site}/imagenes/iconos/{$archivo.extencion}.svg" alt="Archivo {$archivo.extencion}" class="img-responsive">
									<h4>{$archivo.nombre}</h4>
								</a>
							</div>
						</div>
						{/foreach}
					</div>
				</div>
			</article>
		</div>
</section>

<!--VIDEOS-->
