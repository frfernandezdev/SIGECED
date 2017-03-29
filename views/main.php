<header class="header black-bg">
	<div class="sidebar-toggle-box">
	  	<div class="fa fa-bars tooltips" style="color: #e4e4e4" data-placement="right" data-original-title="Menu"></div>
  	</div>
    <!--logo start-->
    <a ui.sref=".dashboard" class="logo"><b>SIGECED</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
    	<!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li id="header_taks_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-theme notify-count"></span>
                </a>
                <ul class="dropdown-menu extended tasks-bar" id="tasks-bar">
                </ul>
            </li>
            <!-- settings end
            inbox dropdown start -->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme notify-count-message"></span>
                </a>
                <ul class="dropdown-menu extended inbox" id="inbox"></ul>
            </li>
            <!-- inbox dropdown end -->
        </ul>
    	<!--  notification end -->
    </div>
    <div class="top-menu">
    	<ul class="nav pull-right top-menu">
            <li><a class="logout" ng-click="logout()">Logout</a></li>
    	</ul>
    </div>
</header>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse">
        <div>
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <h1 class="status-User centered" style="color: white;margin: 10% auto">
                  <div>
                    <span class="tooltips">
                        <i class="fa fa-user fa-fw fa-2x enable_User"></i>
                    </span>                    
                  </div>
                </h1>
                <!-- <p class="centered">
                    <a href=".dashboard">
                        <i class="fa fa-user fa-fw fa-2x enable_User">      
                    </i>
                </p>  -->
                <h5 class="centered">{{ DataUser[2] }}</h5>
                <h5 class="centered">{{ DataUser[3] }}</h5>      
                	  	
                <li id="dashboard" class="mt">
                      <a ui-sref=".dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Tablero</span>
                      </a>
                </li>

                <li id="user" class="sub-menu">
                      <a href="#">
                          <i class="fa fa-desktop"></i>
                          <span>Usuarios</span>
                      </a>
                      <ul class="sub">
                          <li id="user_add"><a ui-sref=".addUser">Nuevo Usuario</a></li>
                          <li id="user_list"><a ui-sref=".listUser">Lista de Usuarios</a></li>
                      </ul>
                </li>
                <li id="fis" class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Fiscales</span>
                      </a>
                      <ul class="sub">
                          <li id="fis_add"><a ui-sref=".addFis">Nuevo Fiscal</a></li>
                          <li id="fis_list"><a ui-sref=".listFis">Lista de Fiscales</a></li>
                      </ul>
                </li>
                <li id="module" class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Modulos</span>
                      </a>
                      <ul class="sub">
                          <li id="module_add"><a ui-sref=".addModule">Nuevo Modulo</a></li>
                          <li id="module_list"><a ui-sref=".listModule">Lista de Modulos</a></li>
                      </ul>
                </li>
                <li id="chat" class="sub-menu">
                      <a ui-sref=".chat">
                          <i class="fa fa-book"></i>
                          <span>Chats</span>
                      </a>
                </li>
                
                <li id="report" class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Reportes</span>
                      </a>
                      <ul class="sub">
                          <li id="report_add"><a ui-sref=".addReport">Nuevo Reportes</a></li>
                          <li id="report_list"><a ui-sref=".listReport">Lista de Reportes</a></li>
                      </ul>
                </li>
                <li id="grafic" class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Graficas</span>
                      </a>
                      <ul class="sub">
                          <li id="grafic_general"><a ui-sref=".graficGeneral">Generales</a></li>
                      </ul>
                </li>
            </ul>
        </div>
      
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
	<div id="main-content">
		<div ui-view=""></div>
	</div>
</div>


<script src="javascripts/common-scripts.js"></script>