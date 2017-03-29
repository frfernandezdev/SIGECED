<section class="wrapper site-min-height">
	<h3><i class="fa fa-angle-right"></i> Chat - Fiscales</h3>
  	<div class="row mt">
  		<div class="col-lg-12">
        <!--COMPLETED ACTIONS DONUTS CHART-->
		<div style="margin: 5vh auto">
			<div class="col-md-4 ds list_user_chat">
				<!-- USERS ONLINE SECTION -->
	            <h3>Lista de Fiscales</h3>
            	<div class="btn-group btn-group-justified" style="table-layout: auto;">
					  <div class="btn-group">
					    <button type="button" id="all" onclick="list_user_chat('')" class="btn btn-theme">Todos</button>
					  </div>
					  <div class="btn-group">
					    <button type="button" onclick="chat_list('')" class="btn btn-theme">Recientes</button>
					  </div>
					  <div class="btn-group">
					    <button type="button" onclick="" class="btn btn-theme"><i class="fa fa-search fa-fw"></i></button>
					  </div>
					</div>
				<div id="list_user"><div class="desc" style="cursor:pointer" onclick=" chat_message(18)"><div class="thumb"><i class="icon_user_2 off"></i></div><div class="details"><p><a data-toggle="tooltips" data-placement="bottom" title="Contreras Ferreira">Soledad</a><br><muted>Administrador</muted></p></div></div><div class="desc" style="cursor:pointer" onclick=" chat_message(16)"><div class="thumb"><i class="icon_user_2 on"></i></div><div class="details"><p><a data-toggle="tooltips" data-placement="bottom" title="Fernandez Contreras">Fernando</a><br><muted>Administrador</muted></p></div></div><div class="desc" style="cursor:pointer" onclick=" chat_message(17)"><div class="thumb"><i class="icon_user_2 off"></i></div><div class="details"><p><a data-toggle="tooltips" data-placement="bottom" title="Fernandez Torres">Fernando</a><br><muted>Fiscal Objeciones</muted></p></div></div></div>
			</div>
			<div class="col-md-8 chat ds">
				<div class="chat-panel panel panel-default">
	                <div class="panel-heading">
	                    <i class="fa fa-comments fa-fw"></i>
	                    Chat
	                </div>
	                <!-- /.panel-heading -->
	                <div class="chat-scroll panel-body">
	                    <ul class="chat chat-list"><p style="padding: 36% 4%;text-align: center;color: rgb(130, 130, 130);">Seleccion un contacto</p><p></p></ul>
	                </div>
	                <!-- /.panel-body -->
	                <div class="panel-footer">
	                    <div class="input-group">
	                    	<form id="message_chat" action="../../module/notify_message/chat_message_send.php" style="display: table-footer-group;">
		                        <input type="text" name="message" id="message" class="form-control input-sm" placeholder="Escribe Tu Mensaje Aqui!">
		                        <span class="input-group-btn">
		                            <button type="submit" class="btn btn-theme btn-sm">
		                                Enviar
		                            </button>
		                        </span>
	                    	</form>
	                    </div>
	                </div>
	                <script>
            			$('#message_chat').submit(function(e) {
            				e.preventDefault();

            				var data = $(this).serialize();
            				var url = $(this).attr('action');

            				add_message(url,data);
            				$('#message').val('');

            			});
                	</script>
	                <!-- /.panel-footer -->
                </div>
			</div>
		</div>     	
  	</div>
</section>