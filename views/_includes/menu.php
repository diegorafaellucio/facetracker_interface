<?php if (!defined('ABSPATH')) exit; ?>

<?php if ($this->login_required && !$this->logged_in) return; ?>

<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo HOME_URI ?>" class="site_title"><i class="fa fa-user"></i> <span>Reconhecimento Facial!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bem vindo,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">

                            <li><a href="<?php echo HOME_URI ?>"><i class="fa fa-home"></i>Home</a></li>

                            <li><a><i class="fa fa-user-plus"></i> Cadastrar <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo HOME_URI . "pessoa" ?>">Pessoa</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-files-o"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo HOME_URI . "relatorio" ?>">Frequência</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-files-o"></i> Videos <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo HOME_URI . "video/list" ?>">Listar</a></li>
                                    <li><a href="<?php echo HOME_URI . "video" ?>">Upload</a></li>
                                </ul>
                            </li>


                            <li><a href="<?php echo HOME_URI . "face" ?>"><i class="fa fa-users"></i>Vínculos</a></li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt="...">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo  HOME_URI?>"> Perfil</a></li>
                                <li><a href="<?php echo  HOME_URI?>">Ajuda</a></li>
                                <li><a href="<?php echo  HOME_URI?>"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
