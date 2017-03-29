<div id="login-page">
  	<div class="container">
      	<form ng-submit="send()" class="form-login" method="POST">
	        <h2 class="form-login-heading">Iniciar Sesión</h2>
	        <div class="login-wrap">
	            <input type="text" class="form-control" placeholder="Correo Electronico" autofocus autocomplete="off" required="" ng-model="form.email" name="email"/>
	            <br>
	            <input type="password" class="form-control" placeholder="Password" autocomplete="off" required="" ng-model="form.password" name="password">
	            <hr>
	            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>Iniciar Sesión</button>
	        </div>
      	</form>	  	
  	</div>
</div>