


$.ajax({
	  // La URl del PHP
		'url': 'destination.php',
		// El Json para mandarlo al archivo, ya sea en el Post o Get
		'data': $('#IDFormulario').serialize(),
		//De Normal es POST lo ideal, pero se puede poner cualquier http
		'type': 'post',
		//Aqui ponemos la respuesta que esperamos del PHP. Json o HTML
		'dataType': 'html',
		'beforeSend': function () {
			//Esta funcion es de las cosas que habria que hacer antes de mandar la peticion
		}
	})
	.done( function (response) {
		//La funcion que hace lo que nosotros queramos hacer con la respuesta
	})
	.fail( function (code, status) {
		//Funciones en caso de fallo
	})
	.always( function (xhr, status) {
		//Esto es para hacer cosas tras terminar la peticion, si queremos poner eventos o algo asi.
});