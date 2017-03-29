<section class="wrapper site-min-height" ng-Init="ListUser()">
	<h3><i class="fa fa-angle-right"></i> Panel de Usuarios</h3>
  	<div class="row mt">
  		<div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Usuarios Habilitados</h4>
                <hr>
			    <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-3 mb" ng-repeat="ColeUser in formdata">
                        <div class="darkblue-panel pn" ng-class="{paneldisableUser: ColeUser.status > 0}">
                            <div class="darkblue-header" style="min-height: 8%;">
                                <a style="" class="times fa fa-times fa-2x fa-fw btn-Inh tooltips" title="Inhabilitar" data-toggle="tooltip" data-placement="top"></a>
                                <h5>{{ ColeUser.level }}</h5>
                            </div>
                            <h1 class="status-User">
                                <span class="tooltips" title="Ultima Conexion: {{ ColeUser.last_online }}" data-toggle="tooltip li_clock" data-placement="bottom">
                                    <i ng-class="{enable_User: ColeUser.statusConex == 0 && ColeUser.status == 0,disable_User: ColeUser.statusConex > 0 && ColeUser.status == 0,disableUserIcon: ColeUser.status > 0}" class="fa fa-user fa-fw fa-2x"></i>
                                </span>
                            </h1>
                            <p>{{ ColeUser.email }}</p>
                            <footer>
                                <div class="centered">
                                    <h5>{{ ColeUser.name }}</h5>
                                    <h5>{{ ColeUser.ape }}</h5>
                                </div>
                                <br>
                                <span class="cont badge bg-theme">{{ $index +1 }}</span>
                                <a class="li_pen btn-edit tooltips" title="Editar Usuario" data-toggle="tooltip" data-placement="bottom" data="16" ?=""></a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>		
  		</div>
  	</div>
</section>