$(document).ready(function(){
	console.log("paginacargada");
if (window.location.href=="http://localhost/PegasusComputers/Pagina.html#detalles"&&$(this).attr('data-precio')==undefined) {
console.log("regargamos");
window.history.back("-1");
	}	
	$("#consultar").click(function(event) {
		pedirProductos();
	})
});
	function imprimeProducto(item){
		 var data ="<li><a href='#detalles' id='detalles' class='ui-btn ui-btn-icon-right ui-icon-carat-r' data-nombre='"+item.nombre +"' data-imagen='"+item.imagen+"' data-descripcion='"+item.descripcion +"' data-precio='"+item.precio+ "' data-cantidad='"+item.cantidad +"' data-id='"+item.id+"' >"+
					"<img src='http://localhost/PegasusComputers/Images/ImgProductos/"+item.imagen+"' width='200' class='ui-li-thumb'>"+
					"<h2>"+item.nombre+"</h2><p>"+item.descripcion+"</p>"+
					"<p class='ui-li-aside' style='font-size:19px;'> $"+item.precio+"</p></a><br><br></li>";
					$("#listado").append(data);
	}
	function imprimeDireccion(item){
		 var data ="<li><a href='' class='ui-btn ui-icon-carat-r' data-numerodecasa='"+item.numerodecasa +"' data-colonia='"+item.colonia+"' data-estado='"+item.estado +"' data-ciudad='"+item.ciudad+ "' data-codigopostal='"+item.codigopostal +"' data-numerocel='"+item.numerocel+"' >"
					+
					"<h2>"+item.numerodecasa+" "+item.colonia+"</h2>"+
					"<h4> Estado: "+item.estado+"</h4>"+
					"<h4> Ciudad: "+item.ciudad+"</h4>"+
					"<h4> Codigopostal: "+item.codigopostal+"</h4>"+
					"<h4> Número de celular: "+item.numerocel+"</h4></a></li><br><br>";
					$("#direccionesul").append(data);
	}
	function imprimeTarjetas(item){
		var data ="<li><a href='' class='ui-btn ui-icon-carat-r' data-nombre='"+item.nombre +"' data-numero='"+item.numero+"'  data-fecha='"+item.fecha+ "' >"
				   +
				   "<h2>"+item.nombre+"</h2>"+
				   "<h4> Número: "+item.numero+"</h4>"+
				   "<h4> Fecha de vencimiento: "+item.fecha+"</h4></a></li><br><br>";
				   $("#tarjetasul").append(data);
   }


	function pedirProductos(){
			$.get('http://localhost/PegasusComputers/backend/consultarProductos.php',function(data) {
			var info = JSON.parse(data);
			var productos = info.productos;
			console.log(productos);
			$("#listado").html("");
			if(productos!=undefined){
			if(productos.length>0){
				productos.forEach(imprimeProducto);
			}}
		});
	}	
		function pedirDirecciones(){
			$.get('http://localhost/PegasusComputers/backend/consultarDirecciones.php',function(data) {
			var info = JSON.parse(data);
			var direcciones = info.direcciones;
			console.log(direcciones);
			$("#direccionesul").html("");
			if(direcciones!=undefined){
			if(direcciones.length>0){
				direcciones.forEach(imprimeDireccion);
			}}
		});
	}	
		function pedirTarjetas(){
			$.get('http://localhost/PegasusComputers/backend/consultarTarjetas.php',function(data) {
			var info = JSON.parse(data);
			var tarjetas = info.tarjetas;
			console.log(tarjetas);
			$("#tarjetasul").html("");
			if(tarjetas!=undefined){
			if(tarjetas.length>0){
				tarjetas.forEach(imprimeTarjetas);
			}}
		});
	}


$(document).on('click','#detalles', function(){
		console.log("estamos en la pagina detalles");
  var rimagen="http://localhost/PegasusComputers/Images/ImgProductos/"+$(this).attr('data-imagen');
  var srcimg="<img src='"+rimagen+"' width='300px'>";
	if($(this).attr('data-precio')!=undefined){
    $("#disponibles").text();
    $("#precio").text();
    $("#disponibles").text();
    $("#caracteristicas").text();
    $("#imagen").text();
    $("#nombre").text();
    $("#imagen").text("");

	$("#nombre").text($(this).attr('data-nombre'));
	$("#precio").text("Precio: $"+$(this).attr('data-precio'));
	$("#disponibles").text("Disponibles: "+$(this).attr('data-cantidad'));
	$("#caracteristicas").text("Descripcion: "+$(this).attr('data-descripcion'));

	$("#imagen").append(srcimg);
	console.log(rimagen);
}
if ('data-precio'===undefined) {

console.log("no definido");


}
});

function echo(){

$("#holamundo").append("gfasdfasd");

pedirDirecciones();



}
function echo2(){

	$("#holamundo").append("gfasdfasd");
	
	pedirTarjetas();
	
	
	
	}

