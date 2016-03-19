<!DOCTYPE html>
<html lang="{$__lang}">
	<head>
		<title>{$__titulo}</title>
		<meta charset="{$__charset}"/>
		<meta name="author" content="{$__autor}"/>
		
		{foreach from=$_params.css item=css}
		<link rel="stylesheet" href="{$css}"/>
		{/foreach}

		{foreach from=$_params.js item=js}
		<script type="text/javascript" src="{$js}"></script>
		{/foreach}

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>

	<body>
		{include file=$_contenido}
	</body>
</html>