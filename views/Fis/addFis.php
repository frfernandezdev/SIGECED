<section class="wrapper" ng-Init="NewFis()">
	<h3><i class="fa fa-angle-right"></i> Nuevo fiscal</h3>
	<div class="row mt">
		<div class="col-lg-12">
			<div class="form-panel" style="display:flex;border-radius: 10px">
				<form id="form-add" class="form-horizontal style-form" style="width: 100%;" action="../../module/fis/fis_add.php" method="POST">
					<div class="md">
						<div class="col-md-6" style="padding: 2% 3% 0% 3%;">

				            <div class="form-group">
				                <label for="email" style="display: block;">Correo Electrónico:</label>
				                <i class="fa fa-envelope prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
				                <input type="email" id="email" name="email" class="form-control" style="width: 90%;float: right;" required="required" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="El Formato de Email es incorrecto" placeholder="Correo Electrónico:">
				            </div>

				            <div class="form-group">
				                <label for="nombre" style="display: block;">Nombres:</label>
				                <i class="fa fa-user prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
				                <input type="text" id="nombre" name="nombre" class="form-control" style="width: 90%;float: right;" required="required" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" placeholder="Nombre:">
				            </div>

							<div class="form-group">
				                <label for="apellido" style="display: block;">Apellido:</label>
				                <i class="fa fa-user prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
				                <input type="text" id="apellido" name="apellido" class="form-control" style="width: 90%;float: right;" required="required" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" placeholder="Apellido:">
				            </div>
						</div>
						<div class="col-md-6" style="padding: 2% 3% 0% 3%;">
				            <div class="form-group">
				                <label for="phone" style="display: block;">N° de Teléfono:</label>
				                <i class="fa fa-phone prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
				                <input type="text" id="phone" name="phone" class="form-control" style="width: 90%;float: right;" required="required" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" placeholder="N° de Teléfono:">
				            </div>
				            <div class="form-group">
				                <label for="ci" style="display: block;">C.I:</label>
				                <i class="fa fa-credit-card prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
				                <input type="text" id="ci" name="ci" class="form-control" style="width: 90%;float: right;" required="required" pattern="[0-9]+" placeholder="Cedula de identidad">
				            </div>
						</div>
						<div class="col-md-12">
				            <div class="text-center">
				                <button type="submit" class="btn btn-lg btn-blue-grey waves-effect waves-light">Guardar</button>
				            </div> 
						</div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</section>