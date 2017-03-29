function MyNotis($rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$document,$window){
	$scope.notis = [];
	
	$scope.clicknotis = function(){
		/*$http.get('/api/notifications',{
			ignoreLoadingBar: true,
			params:{
				token:$cookies.get('tokena'),
				tokensecret:$cookies.get('tokenSecreta'),
				start:0,
				max:5
			}}).then(function(response){
				if(response.data.e===0){
					$scope.notis = response.data.notifications;
				}
			},function(){});
	*/
	};
}

function MainController($rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window,DataUser) {
	if($cookies.get('tokena') && $cookies.get('tokenSecreta')){
			$rootScope.title = $state.current.title;

			$http.get(
				'api/Controller/controllers.php?'
				+'&TypeOp=usuario'
				+'&filter=t'
				+'&item='+$cookies.get('tokena')
				).success(function(r) {
					if (r.e===0) {
						for (var i = 0; i < r.usuarios.length; i++) {
							DataUser.pushDataUser(
								r.usuarios[i].id,
								r.usuarios[i].name,
								r.usuarios[i].level,
								r.usuarios[i].id_fis,
								r.usuarios[i].last_online,
								r.usuarios[i].email,
								r.usuarios[i].ape
							);
						}
					}else {
						console.log('error');
					}
				});

			$scope.DataUser = DataUser.getDataUser();
			
		
			$scope.logout = function(){

				DataUser.deleteDataUser();

				$http.get('api/Controller/controllers.php?tokena='+$cookies.get('tokena')+'&tokenSecreta='+$cookies.get('tokenSecreta')+'&TypeOp=logout')
				.then(function(){
					$cookies.remove("tokena");
					$cookies.remove("tokenSecreta");
					$window.location.href='/SIGECED/';
				},function(){
					$cookies.remove("tokena");
					$cookies.remove("tokenSecreta");
					$window.location.href='/SIGECED/';
				});
			};
		
	}else{
		$location.path('/admin');
	}
}

function LoginController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	if($cookies.get('tokena') && $cookies.get('tokenSecreta')){
		$location.path('/main');
	}else {
		$timeout(function(){
			$scope.form.email = null;
			$scope.form.password = null;
		}, 250);

		$rootScope.title = $state.current.title;

		$scope.send = function(){
			
			$scope.showSpinner=true;

			var formdata = new FormData();

			formdata.append("email",$scope.form.email);
			formdata.append("password",$scope.form.password);

			var data = {
				email:$scope.form.email,
				password:$scope.form.password,
				TypeOp: 'login'
			};
			var request = {
				method: 'POST',
				url: 'api/Controller/controllers.php',
				data: data
			};

			$http(request)
				.success(function (r) {
					$scope.showSpinner=false;
					if(r.e===0){
						$cookies.put('tokena',r.tokena);
						$cookies.put('tokenSecreta',r.tokenSecret);
						toastr.success(r.m,'', {progressBar:true});
						$location.path('/main');
					}else{
						toastr.error(r.m,'', {progressBar:false});
					}
				})
			   .error(function () {});
		};
	}
}

function DashController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$rootScope.title = $state.current.title;
}

function UserController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$scope.NewUser = function() {

		$rootScope.title = $state.current.title;

		$scope.showSpinner=true;

		var formdata = new FormData();
	}

	$scope.ListUser = function() {

		$rootScope.title = $state.current.title;

		$scope.showSpinner=true;

		$http.get('api/Controller/controllers.php?TypeOp=usuario')
			.success(function(r){

				$scope.showSpinner=false;

				if (r.e===0) {

					$scope.formdata = r.usuarios;                               

				}else {
					toastr.error(r.m,'',{progressBar:false})
				}
			})
			.error(function(){});
	}

	$scope.EditUser = function(Active,Disable) {

		$scope.showSpinner=true;
	}

}

function FisController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$scope.NewFis = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.ListFis = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.EditFis = function(Active,Disable) {
	}

}

function ModuleController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$scope.NewModule = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.ListModule = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.EditModule = function(Active,Disable) {
	}

}

function ChatController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$rootScope.title = $state.current.title;

	$scope.NewMsj = function() {}

	$scope.ListMsj = function() {}

	$scope.ListUsers = function() {}

}

function ReportController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$scope.NewReport = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.ListReport = function() {

		$rootScope.title = $state.current.title;
	}

	$scope.EditReport = function() {}

}

function GraficController($timeout, $rootScope, $state, $scope, $http, $location, $stateParams,$cookies,$cookieStore,$window) {

	$scope.GetGrafic = function() {
		
		$rootScope.title = $state.current.title;
	}

}