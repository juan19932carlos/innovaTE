/**
 * Pasár el id donde esta ubicado el editor
 */
function insertarTxt (obj,txt_ini , txt_fin ) {

  if (txt_fin === undefined) txt_fin = "";

  obj = obj[0];
  var scrollPos = obj.scrollTop;
  strPosIni = obj.selectionStart;
  strPosFin = obj.selectionEnd;
  
  var txtSelecionado = (obj.value).substring(strPosIni,strPosFin);
  var txtAtras = (obj.value).substring(0,strPosIni);
  var txtAdelante = (obj.value).substring( strPosFin, obj.value.length );
  
  obj.value = txtAtras + txt_ini + txtSelecionado + txt_fin + txtAdelante;
  //strPos = strPos + txt.length;
  
  obj.selectionStart = strPosFin;
  obj.selectionEnd = strPosIni;
  obj.focus();
}

var Editor = function (id) {
  var contexto = $('#' + id);
  var herramientas = $( "#herramientas" , contexto);
  var contenido = $('#contenido',contexto);
  var vistaPrevia = $('#vista_previa_container',contexto);
  
  //Habilita la vista previa si existe el div "#vista_previa_container".
  if ( vistaPrevia.length <= 0 ){
    $("#vista-previa",contexto).attr("disabled","true");
    $("#vista-previa",contexto).addClass("deshabilitado");
  }

  //Agregar aventos a los botones.
  $('#negrita',herramientas).click(function(){
  	insertarTxt(contenido,'[b]','[/b]');
  });
  $('#cursiva',herramientas).click(function(){
  	insertarTxt(contenido,'[i]','[/i]');
  });
  $('#imagen',herramientas).click(function(){
  	var img_url = "Url_img";
  	insertarTxt(contenido,'[img = ' + img_url + '/]');
  });
  $('#citar',herramientas).click(function(){
  	insertarTxt(contenido,'[cita]','[/cita]');
  });
  $('#lista',herramientas).click(function(){
  	insertarTxt(contenido,'[lista]\n [item] ',' [/item]\n[/lista]');
  });
  $('#link',herramientas).click(function(){
  	insertarTxt(contenido,'[link = "www.example.com" ]','[/link]');
  });
  $('#vista-previa',herramientas).click(function(){
    //envía los datos 
  	$.ajax({
  		url: _params.site + "/noticias/obtenerHTML",
  		data:  $("form",contexto).serialize(),
      type:  'post',
      dataType: "json",
      beforeSend: function () {
        console.log("Procesando, espere por favor...");
      },
      success:  function (response) {
   		  $('#titulo',vistaPrevia).html( response.titulo );
        $('#contenido',vistaPrevia).html( response.contenido );
        console.log(response);
      }
  	});

  	
  });

};

$(document).ready(function () {
  var editor = Editor("editor-1");
});