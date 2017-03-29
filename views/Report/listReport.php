<section class="wrapper" ng-Init="ListReport()">
	<h3 style="display: inline-block;"><i class="fa fa-angle-right"></i> Panel de Reportes</h3>
	<form id="search_obj" method="POST" style="display: inline-block;float: right;margin-top: 20px;margin-bottom: 10px">
			<div class="form-group">
				<input type="text" id="search" class="form-control" style="width:68%;display: inline-block;vertical-align: middle;">
				<a class="search" id="search-close"><i class="fa fa-times fa-fw"></i></a>
				<button type="submit" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
			</div>
	</form>
	<div id="table-obj">
			<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel" style="padding: 2%;">
						<h4><i class="fa fa-angle-right"></i> Lista de Reportes Por Verificar</h4>
						<hr>
						<table class="table table-striped table-advance table-hover">  
								<thead>
										<tr>
											<th class="text-center centered"> N°</th>
											<th class="text-center centered" data-toggle="tooltip" title="Nacionalidad del Ciudadano" data-placement="top"> N/C</th>
											<th class="text-center centered" data-toggle="tooltip" title="Documento de Identificacion" data-placement="top"> D.I</th>
											<th class="text-center centered"> Fecha de Nacimiento</th>
											<th class="text-center centered"> Fecha de Transaccion</th>
											<th class="text-center centered"> Nombre del Fiscal</th>
											<th class="text-center centered"> Estatus</th>
											<th class="text-center centered"> Acciones</th>
										</tr>
								</thead>
								<tbody>
																													<tr class="centered">
										<td colspan="8">
											<h3>No hay ningun Reporte por Verificar registrado en el sistema</h3>
										</td>
									</tr>
														</tbody>
						</table>
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel" style="padding: 2%;">
					<h4><i class="fa fa-angle-right"></i> Lista de Reportes Verificados</h4>
					<hr>
					<table class="table table-striped table-advance table-hover">  
						<thead>
							<tr>
								<th class="text-center centered"> N°</th>
								<th class="text-center centered" data-toggle="tooltip" title="Nacionalidad del Ciudadano" data-placement="top"> N/C</th>
								<th class="text-center centered" data-toggle="tooltip" title="Documento de Identificacion" data-placement="top"> D.I</th>
								<th class="text-center centered"> Fecha de Nacimiento</th>
								<th class="text-center centered"> Fecha de Transaccion</th>
								<th class="text-center centered"> Tipo de Objecion</th>
								<th class="text-center centered"> Nombre del Fiscal</th>
								<th class="text-center centered"> Estatus</th>
								<th class="text-center centered"> Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-center centered" style="cursor:pointer">
								<td>V</td>
								<td>6290498</td>
								<td>0684-01-28</td>
								<td id="select_trans_fech6290498">
									<select class="form-control" name="select_trans_fech" id="select_trans_fech">
										<option value="">Ingresado:2017-02-18 11:19:26</option>
										<option value="">Registrado:2017-02-18 11:20:02</option>
										<option value="">Asignado:2017-02-18 11:20:31</option>
									</select>
								</td>
								<td data-toggle="tooltip" title="hola" data-placement="right">1</td>
								<td id="select_trans_fis6290498">
									<select class="form-control" name="select_trans_fech" id="select_trans_fech">
										<option value="">Ingresado:9</option>
										<option value="">Registrado:Soledad</option>
										<option value="">Asignado:Fernando</option>
												
									</select>
								</td>
								<td>
									<span class="label label-warning label-mini" data-toggle="tooltip" data-placement="button" title="Procesado">Procesado</span>

									<span data-toggle="tooltip" data-placement="button" title="Esperando Respuesta" class="label label-success label-mini">Asignado</span>
									<span class="label label-default label-mini">Esperando Respuesta</span>
								<td>
							</tr>
						</tbody>
					</table>
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel" style="padding: 2%;">
						<h4><i class="fa fa-angle-right"></i> Lista de Valijas</h4>
						<hr>
						<table class="table table-striped table-advance table-hover">
							<thead>
									<tr>
										<th class="text-center centered"> N°</th>
										<th class="text-center centered" data-toggle="tooltip" title="Nacionalidad del Ciudadano" data-placement="top"> N/C</th>
										<th class="text-center centered" data-toggle="tooltip" title="Documento de Identificacion" data-placement="top"> D.I</th>
										<th class="text-center centered"> Fecha de Envio</th>
										<th class="text-center centered"> Tipo de Objecion</th>
										<th class="text-center centered">Codigo de Valija</th>
										<th class="text-center centered"> Estatus</th>
										<th class="text-center centered"> Acciones</th>
									</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="8">
										<h3>No hay ninguna valija registrado en el sistema</h3>
									</td>
								</tr>
							</tbody>
						</table>
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->

		<div class="edit-back" id="back">
		    <div class="target-edit">
		        <span style="position: absolute;top: 2%;right: 2%;color: black" class="close fa fa-times fa-fw"></span>
		        <div class="form-panel" style="box-shadow: 0px 0px 0px #aab2bd;width: 96%;height: 96%;">
		        	<form id="form-report" action="../../module/report/obj_report/obj_report_asign.php" class="form-horizontal style-form" style="width: 100%;display: none">	
		        		<h3 class="text-center">Asignacion del Supervisor Fiscal para la Verificacion</h3>
		        		<hr>
		        		<div class="col-md-8 col-md-offset-2">
			        		<div class="form-gruop">
			        			<div id="fis_select"></div>
			        		</div>
		        		</div>
		        		<div class="col-md-12 text-center centered" style="margin: 4% 0 1% 0;">
		        			<button type="submit" class="btn btn-blue-grey waves-effect waves-light">Asignar</button>
		        		</div>        			
		        	</form>
		        	<form id="form-resp" action="../../module/report/obj_report/obj_report_resp.php" class="form-horizontal style-form" style="width: 100%;display: none">
		        		<h3 class="text-center">Respuesta de la Verificacion del Objectado</h3>
		        		<hr>
		        		<div class="col-md-8 col-md-offset-2">
		        			<div class="form-group">
		        				<label for="resp">Aprovado</label>
		        				<input type="radio" value="0" name="resp" id="resp" class="form-control" required="required" style="box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0);">
		        			</div>
		        			<div class="form-group">
		        				<label for="resp">Denegado</label>
		        				<input type="radio" value="1" name="resp" id="resp" class="form-control" required="required" style="box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0);">
		        			</div>
		        		</div>
		        		<div class="col-md-12 text-center">
		        			<button type="submit" class="btn btn-blue-grey waves-effect waves-light">Guardar</button>
		        		</div>
		        	</form>
		        	<form id="form-valija" action="../../module/report/obj_report/obj_report_valija.php" class="form-horizontal style-form" style="width: 100%;display: none">
		        		<h3 class="text-center">Datos de la Valija</h3>
		        		<hr>
		        		<div class="col-md-8 col-md-offset-2">
		        			<div class="form-group">
		        				<label for="cod_valija">Codigo de la Valija:</label>
		        				<input type="text" id="cod_valija" name="cod_valija" class="form-control" required="required" placeholder="ABCD/EFGHI/000000/0000">
		        			</div>
		        		</div>
		        		<div class="col-md-12 text-center centered">
		        			<button type="submit" class="btn btn-blue-grey waves-effect waves-light">Guardar</button>
		        		</div>
		        	</form>
		        </div>
		    </div>
		</div>
	</div> 
</section>