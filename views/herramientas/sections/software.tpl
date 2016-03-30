<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/monitor-mac.png" alt="Software sugerido" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Software sugerido</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="software-contenedor">
					{$flag = 0}
					{foreach from=$programas item=programa}
					{$flag = $flag + 1}
					<div >
						<img src="{$_params.site}/imagenes/java.png" alt="Software">
						<a href="#">
							<h3>{$programa.nombre}</h3>
						</a>
					</div>
					{/foreach}
					{if ($flag > 1) and ($flag is odd)}
						<div class="flexissue"></div>
					{/if}
					
				</div>
			</article>
		</div>
</section>