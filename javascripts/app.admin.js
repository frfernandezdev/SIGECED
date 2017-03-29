var app = angular.module('app', ['angularUtils.directives.dirPagination','ngFileUpload','angularSpinner','angular-loading-bar','timer', 'ngAnimate', 'ui.router', 'ngCookies', 'duScroll']);



app.config(function($locationProvider) {
	$locationProvider.html5Mode({
	  enabled: true
	});
});

app.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/');
    
    $stateProvider.
		state('index', {
			url: '/',
			title: 'SIGECED | Iniciar Sesión',
			templateUrl: 'views/index.php',
			controller: LoginController
	  	})
		.state('main', {
			abstract: true, 
			templateUrl: 'views/main.php',
			controller: MainController
	  	})
		  	.state('main.dashboard', {
				url : '/main',
				title: 'SIGECED | Panel Administrativo',
				templateUrl: 'views/dashboard.php',
				controller: DashController
		  	})
		  	.state('main.addUser', {
		  		url: '/main/addUser',
		  		title: 'SIGECED | Nuevo Usuario',
		  		templateUrl: 'views/User/addUser.php',
		  		controller: UserController
		  	})
		  	.state('main.listUser', {
		  		url: '/main/listUser',
		  		title: 'SIGECED | Lista de Usuarios',
		  		templateUrl: 'views/User/listUser.php',
		  		controller: UserController
		  	})
		  	.state('main.addFis', {
		  		url: '/main/addFis',
		  		title: 'SIGECED | Nuevo Fiscal',
		  		templateUrl: 'views/Fis/addFis.php',
		  		controller: FisController
		  	})
		  	.state('main.listFis', {
		  		url: '/main/listFis',
		  		title: 'SIGECED | Lista de Fiscales',
		  		templateUrl: 'views/Fis/listFis.php',
		  		controller: FisController
		  	})
		  	.state('main.addModule', {
		  		url: '/main/addModule',
		  		title: 'SIGECED | Nuevo Modulo',
		  		templateUrl: 'views/Module/addModule.php',
		  		controller: ModuleController
		  	})
		  	.state('main.listModule', {
		  		url: '/main/listModule',
		  		title: 'SIGECED | Lista de Modulos',
		  		templateUrl: 'views/Module/listModule.php',
		  		controller: ModuleController
		  	})
		  	.state('main.chat', {
		  		url: '/main/chat',
		  		title: 'SIGECED | Chat',
		  		templateUrl: 'views/Chat/chat.php',
		  		controller: ChatController
		  	})
		  	.state('main.addReport', {
		  		url: '/main/addReport',
		  		title: 'SIGECED | Nuevo Reporte',
		  		templateUrl: 'views/Report/addReport.php',
		  		controller: ReportController
		  	})
		  	.state('main.listReport', {
		  		url: '/main/listReport',
		  		title: 'SIGECED | Lista de Repotes',
		  		templateUrl: 'views/Report/listReport.php',
		  		controller: ReportController
		  	})
		  	.state('main.graficGeneral', {
		  		url: '/main/graficGeneral',
		  		title: 'SIGECED | Graficas Generales',
		  		templateUrl: 'views/Grafic/graficGeneral.php',
		  		controller: GraficController
		  	})
});

app.value('duScrollDuration', 2000).value('duScrollOffset', 125);
app.config(['usSpinnerConfigProvider', function (usSpinnerConfigProvider) {
    usSpinnerConfigProvider.setDefaults({color: '#ff9800',position:'fixed',top:'50%'});
}]);
app.controller('MyNotis', MyNotis);