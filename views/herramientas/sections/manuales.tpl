<!--DESCARGABLES Y ARCHIVOS-->
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/RSS.png" alt="Noticias" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Manuales presentación</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="contenedor-archivos">
					{foreach from=$archivos item=archivo key=key}
					<a href="{$_params.site}/{$archivo.link}" >
						<img src="{$_params.site}/imagenes/iconos/{$archivo.extencion}.svg" alt="Archivo {$archivo.extencion}" class="img-responsive">
						<h4>{$archivo.nombre}</h4>
					</a>
					{/foreach}
				</div>
			</article>
		</div>
</section>

<!--VIDEOS-->
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/Youtube.png" alt="Noticias" class="img-circle shadow-up-naranja">
			<h2 class="tx-naranja">Videos instructivos</h2>
		</header>
		<div class="bg-naranja">
			<article>
				<div class="video-contenedor">
					{$flag = 0}
					{foreach from=$videos item=video}
					{$flag = $flag + 1}
					<div>
						<iframe src="{$video.link}" allowfullscreen></iframe>
						<h3>{$video.nombre}</h3>
					</div>
					{/foreach}
					{if ($flag > 1) and ($flag is odd)}
						<div class="flexissue"></div>
					{/if}
				</div>
			</article>
		</div>
</section>

