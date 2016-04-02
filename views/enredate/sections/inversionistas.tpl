<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Money-Increase.png" alt="Noticias" class="img-circle shadow-up-amarillo">
			<h2 class="tx-naranja">Inversionistas</h2>
		</header>
		<div class="bg-amarillo">
			<article>
				<div class="aliados-inversionistas">
				{foreach from=$inversionistas item=$inversionista }
					<div class="inversionista bg-blanco shadow-down-negro" >
						<img src="{$_params.site}/imagenes/inversionistas/{$inversionista.imagen}" alt="{$inversionista.nombre}" class="img-responsive">
						<h3>{$inversionista.nombre}</h3>
					</div>
				{/foreach}
				</div>
			</article>
		</div>
</section>