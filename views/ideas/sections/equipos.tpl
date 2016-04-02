<!--GRUPO DE TRABAJO 1-->
{foreach from=$grupos item=grupo}
<section class="contenedor">
		<header>
			<img src="{$_params.site}/imagenes/vector_grupos.png" alt="Grupo de trabajo" class="img-circle shadow-up-azul">
		</header>
		<div class="bg-azul">
			<article>
				<div class="row">
					<div class="col-lg-offset-2 col-lg-8
								col-md-offset-1 col-md-10
								col-sm-12
								col-xs-12">
						{foreach from=$grupo.integrantes item=integrante}
						<div class="col-lg-3
									col-md-3
									col-sm-3
									col-xs-6" >
							<div class="integrantes">
								<img src="{$_params.site}/imagenes/usuarios/{$integrante.img}" alt="{$integrante.nombre}" class="img-responsive img-rounded">
								<div class="text-center tx-blanco">
									<h3>{$integrante.nombre}</h3>
								</div>
							</div>
						</div>
						{/foreach}
					</div>
				</div>
				<div class="row">
					<div class="col-lg-offset-2 col-lg-8
								col-md-offset-1 col-md-10
								col-sm-12
								col-xs-12">
						<div class="descripcion-grupos">
							<img src="{$_params.site}/imagenes/icon-61.png" alt="Descripción">
							<div class="bg-blanco shadow-down-negro text-justify">
								<h4><strong>Descripción:</strong></h4> 
								{$grupo.descripcion}
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
</section>
{/foreach}
<!--BTN CONOCE MÁS-->
<div class="container">
	<div class="row">
		<div class="col-md-3
					col-sm-4
					col-xs-8 pull-right">
			<a class="btn btn-innovate1 bg-azul">
				<img src="{$_params.site}/imagenes/vector_grupos.png" alt="Conoce más.">
				<h4 class="bg-blanco tx-azul">Conoce más.</h4>
			</a>
		</div>
	</div>
</div>

