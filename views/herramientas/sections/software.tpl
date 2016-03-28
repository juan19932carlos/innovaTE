<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Youtube.png" alt="Noticias" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Videos instructivos</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="software-contenedor">
					{$flag = 0}
					{foreach from=$programas item=programa}
					{$flag = $flag + 1}
					<a href="{$programa.direccion}" target="_blank">
						<img src="{$_params.site}/imagenes/enlace.jpg" alt="Enlace">
						<div>
							<h3>{$programa.nombre}</h3>
						</div>
					</a>
					{/foreach}
					{if ($flag > 1) and ($flag is odd)}
						<div class="flexissue"></div>
					{/if}
					
				</div>
			</article>
		</div>
</section>