{foreach from=$mentores item=mentor}
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/doc.png" alt="Mentores" class="img-circle shadow-up-amarillo">
			<h2 class="tx-naranja">&nbsp</h2>
		</header>
		<div class="bg-amarillo">
			<article>
				<div class="row">
					<div class="mentor">
						<div id="foto">
							<img alt="{$mentor.nombre}" src="{$_params.site}/imagenes/usuarios/{$mentor.img}">
						</div>
						<div id="datos">
							<h4 class="bg-blanco">{$mentor.nombre}</h4>
							<h4 class="bg-blanco">{$mentor.empresa}</h4>
						</div>
						<div id="experiencia">
							<img src="{$_params.site}/imagenes/x-office-spreadsheet-template.png" alt="Experiencia">
							<div class="bg-blanco shadow-down-negro">
								{$mentor.experiencia}
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
</section>
{/foreach}