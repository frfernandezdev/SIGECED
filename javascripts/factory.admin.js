app.factory('Page', function() {
   var title = 'app';
   return {
     title: function() { return title; },
     setTitle: function(newTitle) { title = newTitle }
   };
});

app.factory('DataUser', function() {
	var dataUser = [];

	var interfaz = {
		getDataUser: function(){
			return dataUser;
		},
		pushDataUser: function(id_User,name_User,level_User,id_fis_User,last_time_User,email_User,ape_User){
			dataUser.push(
				id        = id_User,
				email     = email_User,
				name      = name_User,
				level     = level_User,
				id_fis    = id_fis_User,
				last_time = last_time_User,
				ape       = ape_User
 			);
		},
		deleteDataUser: function() {
			dataUser.push('');
		}
	}
	return interfaz;
});



/*.factory("descargasFactory", function(){
	var descargasRealizadas = ["Manual de Javascript", "Manual de jQuery", "Manual de AngularJS"];
	var interfaz = {
		nombre: "Manolo",
		getDescargas: function(){
			return descargasRealizadas;
		},
		nuevaDescarga: function(descarga){
			descargasRealizadas.push(descarga);
		}
	}
	return interfaz;
});


.controller("appCtrl", function(descargasFactory){
	
	var vm = this;
	vm.nombre = descargasFactory.nombre;
	vm.descargas = descargasFactory.getDescargas();
	vm.funciones = {
		guardarNombre: function(){
			descargasFactory.nombre = vm.nombre;
		},
		agregarDescarga: function(){
			descargasFactory.nuevaDescarga(vm.nombreNuevaDescarga);
			vm.mensaje = "Descarga agregada";
		},
		borrarMensaje: function(){
			vm.mensaje = "";
		}
	}
});*/