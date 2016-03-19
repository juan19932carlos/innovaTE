<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Money-Increase.png" alt="Noticias" class="img-circle shadow-up-amarillo">
			<h2 class="tx-naranja">Inversionistas</h2>
		</header>
		<div class="bg-amarillo">
			<article>
				<div class="row">
					<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
					{foreach from=$inversionistas item=$inversionista }
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
							<div class="inversionista bg-blanco shadow-down-negro" >
								<img src="{$_params.site}/imagenes/inversionistas/{$inversionista.imagen}" alt="{$inversionista.nombre}" class="img-responsive">
								<h3>{$inversionista.nombre}</h3>
							</div>
						</div>
					{/foreach}
					</div>
				</div>
			</article>
		</div>
</section>