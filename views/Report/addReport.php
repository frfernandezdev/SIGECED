<section class="wrapper" ng-Init="NewReport()">
	<h3><i class="fa fa-angle-right"></i> Nuevo Reporte</h3>

	<div class="row mt">
		<div class="col-lg-12">
			<div class="form-panel" style="border-radius: 10px;">
				<div id="report_form">
					<h4 class="mb">Datos del Reporte</h4>
					<hr>
					<form id="form-report" action="../../module/report/report_add.php" class="form-horizontal style-form" style="width: 100%;" method="POST">
						<div class="col-md-6" style="padding: 2% 3% 0% 3%">
							<div class="form-group" id="module_select">
								<label for="mod_select">Seleccione un Modulo de Operaciones:</label>
								<select name="mod_select" id="mod_select" class="form-control" required="required" style="width: 92%;float: right">
									<option value="">Seleccione un Modulo</option>
									<option value="6" 0=""> La Concordia </option>
									<option value="8" 0=""> Michelena </option>
									<option value="12" 0=""> Caracas </option>
									<option value="13" 0=""> Pregonero </option>
									<option value="14" 0=""> La Grita </option>
									<option value="15" 0=""> El Pabello </option>
									<option value="16" 0=""> Columbus </option>
									<option value="17" 0="">  </option>
								</select>
							</div>
							<div class="form-group">
								<div class="">
									<label style="display:block" for="id">Numero de Documento:</label>
									<div style="width: 92%;float: right">
					                	<select class="btn btn-default form-control" name="tip_id" id="tip_id" required="required" style="width: 18%;">
						                    
						                    <option value="V">V</option>
						                    <option value="E">E</option>
						                </select>
							            <input id="id" name="id" style="display:inline-block;width: 82%;float: right;" type="text" class="form-control" placeholder="Numero de Documento" required="required">
									</div>
					            </div>
							</div>
						</div>
						<div class="col-md-6" style="padding: 2% 3% 0% 3%">
							<div class="form-group" id="type_document">	
								<label for="tip_document">Tipo de Documento:</label>
								<select class="form-control" name="tip_document" id="tip_document" required="required" style="width: 92%;float: right">
									<option value="">Seleccione un Tipo de Documentacion</option>
									<option value="1">Cédula de identidad</option>
									<option value="2">Pasaporte</option>
									<option value="3">Numero de Partida de Nacimiento</option>
									<option value="4">Numero de XXXXX</option>
								</select>
							</div>
							<div class="form-group">
								<label for="fech_naci">Fecha de Nacimiento</label>
								<input type="date" class="form-control" required="required" id="fech_naci" name="fech_naci" style="width: 90%;float:right">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="form-group">
                                <label>Opciones:</label>
                                
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="option" value="0" required="required">Cedulado
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="option" value="1" required="required">Objetado
                                    </label>
                                </div>
                            </div>
															
							<button type="submit" class="btn btn-blue-grey waves-effect waves-light">Guardar</button>
						</div>
					</form>
				</div>
				<div id="ced_add" style="display: none;">
					<div>
						<h4 class="mb">Datos del Cedulado</h4>
						<hr>
						<form id="form_ced" action="../../module/report/ced_report/ced_report_add.php" class="form-horizontal style-form" style="width: 100%;display: inline-flex;" method="POST">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group" id="select_trans"></div>
								<div class="col-md-12 centered">
									<button type="submit" class="btn btn-blue-grey waves-effect waves-light">Guardar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>