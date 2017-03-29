<section class="wrapper" ng-Init="NewModule()">
	<h3><i class="fa-fa-angle-right"></i> Nuevo Modulo</h3>

	<div class="row mt">
		<div class="col-lg-12">
			<div class="form-panel" style="display: flex;border-radius: 10px;">
				<form id="form-add" action="../../module/module/module_add.php" method="POST">
					<div class="col-md-6" style="padding: 2% 3% 0% 3%;">
                        <div class="form-group">
                            <label for="nomb" style="display: block;">Nombre del Módulo:</label>
                            <i class="fa fa-user prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
                            <input type="text" id="nomb" name="nomb" class="form-control" style="width: 90%;float: right;" required="required" placeholder="Nombre del Modulo:">
                        </div>
					</div>
					<div class="col-md-6" style="padding: 2% 3% 0% 3%;">
                     	<div class="form-group">
                            <label for="code" style="display: block;">Código del Módulo:</label>
                            <i class="fa fa-barcode prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
                            <input type="text" id="code" name="code" class="form-control" style="width: 90%;float: right;" required="required" placeholder="Codigo del Modulo:">
                     	</div>
					</div>
					<div class="col-md-12">
                        <div class="form-group">
                            <label for="from" style="display: block;">Ubicación:</label>
                            <i class="fa fa-map-marker prefix fa-fw" style="font-size: 24px;line-height: 1.5;"></i>
                            <textarea name="from" id="from" class="form-control" required="required" style="width: 95%;float: right;margin-bottom: 2%" cols="10" rows="5" placeholder="Ubicaciones del Modulo:"></textarea>
                        </div>
					</div>
					<div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-blue-grey waves-effect waves-light">Guardar</button>
                        </div> 
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
