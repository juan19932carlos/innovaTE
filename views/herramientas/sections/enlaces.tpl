<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Youtube.png" alt="Noticias" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Videos instructivos</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="enlaces-contenedor">
					{$flag = 0}
					{foreach from=$enlaces item=enlace}
					{$flag = $flag + 1}
					<a href="{$enlace.direccion}" target="_blank">
						<img src="{$_params.site}/imagenes/enlace.jpg" alt="Enlace">
						<div>
							<h3> {$enlace.nombre}</h3>

							<buttom class="btn" data-placement="top" data-trigger="click" data-content="{$enlace.descripcion}"> 
								<spam class="glyphicon glyphicon-info-sign tx-negro"> </spam> 
							</buttom> 

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

